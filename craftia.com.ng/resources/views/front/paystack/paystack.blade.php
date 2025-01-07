
@extends('front.layout.useraccountLayout')


@section('content')

    <!-- Page Introduction Wrapper /- -->
    <!-- Cart-Page -->
    <div class="page-cart u-s-p-t-80">
        <div class="container">
            <div class="row">
                <div class="col-lg-12" align="center">
                    <h3>PLEASE MAKE <span style="color: red">NGN {{ Session::get('grand_total') }}</span> PAYMENT FOR YOUR ORDER</h3>
                    <form action="{{ route('paystack.pay') }}" method="post"> {{-- This is a Named Route. Check web.php --}} {{-- Generating URLs To Named Routes: https://laravel.com/docs/9.x/routing#generating-urls-to-named-routes --}}
                        @csrf {{-- Preventing CSRF Requests: https://laravel.com/docs/9.x/csrf#preventing-csrf-requests --}}

                        <input type="hidden" name="amount" value="{{ round(Session::get('grand_total') / 80, 2) }}">
                         {{-- 'grand_total' was stored in Session in checkout() method in Front/ProductsController.php --}}
                          {{-- Interacting With The Session: Retrieving Data: https://laravel.com/docs/9.x/session#retrieving-data --}}
                          <button type="submit" class="btn btn-danger">Pay with Paystack</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Cart-Page /- -->
@endsection