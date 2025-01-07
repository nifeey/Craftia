{{-- This page is rendered by the error() method inside Front/PaystackController.php (if the order payment via Paystack fails) --}}
@extends('front.layout.layout')

@section('content')
    <!-- Page Introduction Wrapper -->
    <div class="page-style-a">
        <div class="container">
            <div class="page-intro">
                <h2>Cart</h2>
            </div>
        </div>
    </div>
    <!-- Page Introduction Wrapper /- -->

    <!-- Cart-Page -->
    <div class="page-cart u-s-p-t-80">
        <div class="container">
            <div class="row">
                <div class="col-lg-12" align="center">
                    <h3>YOUR Payment Failed!</h3>
                    <p>Please try again after some time and contact us if there are any inquiries.</p>
                </div>
            </div>
        </div>
    </div>
    <!-- Cart-Page /- -->
@endsection

{{-- Forget/Remove some data in the Session after a failed Paystack payment --}}
@php
    use Illuminate\Support\Facades\Session;

    Session::forget('grand_total');  // Clear grand total
    Session::forget('order_id');     // Clear order ID
    Session::forget('couponCode');   // Clear coupon code
    Session::forget('couponAmount'); // Clear coupon amount
@endphp
