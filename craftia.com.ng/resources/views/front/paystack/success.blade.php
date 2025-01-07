{{-- This page is rendered by the success() method inside Front/PaystackController.php (if the order payment via Paystack is successful) --}}
@extends('front.layout.useraccountLayout')

@section('content')
    <!-- Page Introduction Wrapper -->
    <div class="page-style-a">
        <div class="container">
            <div class="page-intro">
                <h2>Payment</h2>
            </div>
        </div>
    </div>
    <!-- Page Introduction Wrapper /- -->

    <!-- Cart-Page -->
    <div class="page-cart u-s-p-t-80">
        <div class="container">
            <div class="row">
                <div class="col-lg-12" align="center">
                    <h3>YOUR PAYMENT HAS BEEN CONFIRMED</h3>
                    <p>Thanks for the Payment. We will process your order very soon.</p>
                    <p>Your order number is {{ Session::get('order_id') }} and total amount paid is NGN {{ Session::get('grand_total') }}</p>
                </div>
            </div>
        </div>
    </div>
    <!-- Cart-Page /- -->
@endsection

{{-- Clear session data after successful payment --}}
@php
    use Illuminate\Support\Facades\Session;

    Session::forget('grand_total');  // Clear grand total
    Session::forget('order_id');     // Clear order ID
    Session::forget('couponCode');   // Clear coupon code
    Session::forget('couponAmount'); // Clear coupon amount
@endphp
