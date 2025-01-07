<?php

namespace App\Http\Controllers\Front;

use App\Models\Order;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use App\Models\ProductsAttribute;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session; // For making HTTP requests

class PaystackController extends Controller
{
    // Paystack Payment Gateway Integration

    private $paystackUrl;

    public function __construct() {
        $this->paystackUrl = 'https://api.paystack.co'; // Base URL for Paystack API
    }

    // Pay using Paystack
    public function make_payment(Request $request) {
        $paystack_secret_key="sk_live_290f4bc3a01fa407053077c0020f4576ceaa283d";
        
        try {
            $paystack_amount = round(Session::get('grand_total') * 100); // Convert to kobo (Paystack expects amounts in kobo)
            
            // Prepare payment data
            $data = [
                'email' => Auth::user()->email, // User's email
                'amount' => $paystack_amount, // Amount in kobo
                'callback_url' => url('paystack/success'), 
            ];

            $client = new Client();
            $response = $client->post("{$this->paystackUrl}/transaction/initialize", [
                'headers' => [
                    'Authorization' => 'Bearer ' . $paystack_secret_key, // Paystack secret key from .env
                    'Content-Type' => 'application/json',
                ],
                'json' => $data,
            ]);

            $result = json_decode($response->getBody()->getContents(), true);

            if ($result['status']) {
                return redirect($result['data']['authorization_url']); // Redirect to Paystack payment page
            } else {
                return $result['message']; // Display error message
            }

        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }
    // public function make_payment(){
    //     $paystack_amount = round(Session::get('grand_total') * 100);
        
    //     $data = [
    //                 'email' => Auth::user()->email, // User's email
    //                 'amount' => $paystack_amount, // Amount in kobo
    //              // 'callback_url' => url('paystack/succe), // URL to redirect after paymentss'
    //             ];
    //             $pay=json_decode( $this->initiate_payment($data));
    //             if($pay){
    //                 dd($pay);
    //                 // return redirect()->route('paystack.success');
    //             }else{
    //               return  redirect()->route('paystack.error');
    //             }
                
    // }
    // public function initiate_payment($data){
    //     $url= "https://api.paystack.co/transaction/initialize";
    //     $paystack_secret_key="sk_test_96283d7c067832d9204c245072af28978ac02b74";
        

    //         $field_string=http_build_query($data);
    //         $ch=curl_init();
    //         curl_setopt($ch,CURLOPT_URL,$url);
    //         curl_setopt($ch,CURLOPT_POST,true);
    //         curl_setopt($ch,CURLOPT_POSTFIELDS,$field_string);
    //         curl_setopt($ch,CURLOPT_HTTPHEADER,array(
    //             "Authorization: Bearer ". $paystack_secret_key,
    //             "cache-control: no-cache",
    //             'Content-Type' => 'application/json',
                
    //         ));
    //         curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
    //         $result=curl_exec($ch);
    //         curl_close($ch);
    //         return $result;
    // }

    public function success(Request $request) {
        $paystack_secret_key="sk_live_290f4bc3a01fa407053077c0020f4576ceaa283d";
        if (!Session::has('order_id')) {
            return view('cart'); // Redirect to cart if no order ID
        }
       
        // Verify payment
        $transaction_id = $request->input('reference'); // Retrieve transaction ID from Paystack response
        $client = new Client();
        $response = $client->get("{$this->paystackUrl}/transaction/verify/{$transaction_id}", [
            'headers' => [
                'Authorization' => 'Bearer ' . $paystack_secret_key , // Paystack secret key from .env
            ],
        ]);

        $result = json_decode($response->getBody()->getContents(), true);
        //  dd($result); 

        if ($result['status'] && $result['data']['status'] == 'success') {
            // Payment was successful
            $arr = $result['data'];

            // Insert payment details into the payments table
            $payment = new \App\Models\Payment;
            $payment->order_id = Session::get('order_id'); 
            $payment->user_id = Auth::user()->id; 
            $payment->payment_id = $arr['id']; 
            $payment->payer_id = $arr['authorization']['authorization_code'] ?? 'default_payer_id'; // Update with the correct field

            $payment->payer_email = $arr['customer']['email']; 
            $payment->amount = $arr['amount'] / 100; // Amount is in kobo
            $payment->currency = 'NGN'; // Assuming you're using Nigerian Naira
            $payment->payment_status = $arr['status']; 
            $payment->save();

            // Update the order status to Paid
            $order_id = Session::get('order_id'); 
            Order::where('id', $order_id)->update(['order_status' => 'Paid']);

            // Send order confirmation email
            $orderDetails = Order::with('orders_products')->where('id', $order_id)->first()->toArray(); 
            $email = Auth::user()->email; 
            $messageData = [
                'email' => $email,
                'name' => Auth::user()->name,
                'order_id' => $order_id,
                'orderDetails' => $orderDetails
            ];
            \Illuminate\Support\Facades\Mail::send('emails.order', $messageData, function ($message) use ($email) {
                $message->to($email)->subject('Order Paid through Paystack - craftia.com.ng');
            });

            // Inventory Management
            foreach ($orderDetails['orders_products'] as $key => $order) {
                $getProductStock = ProductsAttribute::getProductStock($order['product_id'], $order['product_size']);
                $newStock = $getProductStock - $order['product_qty']; 
                ProductsAttribute::where([
                    'product_id' => $order['product_id'],
                    'size' => $order['product_size']
                ])->update(['stock' => $newStock]);
            }

            // Empty the cart after payment
            \App\Models\Cart::where('user_id', Auth::user()->id)->delete();

            return view('front.paystack.success'); // Redirect to success view
        } else {
            return 'Payment failed or transaction not found!';
        }
    }

    public function error() {
        return view('front.paystack.fail'); // Render fail view
    }

    public function paystack() {
        if (Session::has('order_id')) {
            return view('front.paystack.paystack'); // Render Paystack payment page
        } else {
            return redirect('cart'); // Redirect to cart if no order has been placed
        }
    }
}
