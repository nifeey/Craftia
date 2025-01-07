@extends('front.layout.authLayout')

@section('content')
@if (Session::has('success_message'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Success:</strong> {{ Session::get('success_message') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif
@if (Session::has('error_message'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Error:</strong> {{ Session::get('error_message') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif
@if ($errors->any())
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Error:</strong> @php echo implode('', $errors->all('<div>:message</div>')); @endphp
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif

<!-- Account-Page -->
<div class="page-account u-s-p-t-80">
    <div class="container">
        <div class="single-login-wrapper">
            <div class="brand-logo text-lg-center">
                <a href="{{ url('/') }}" class="w-">
                    <img src="{{ asset('front/images/main-logo/nav-logo.png') }}" alt="Craftia" class="app-brand-logo" style="width:150px">
                </a>
            </div>
            <h2 class="account-h2 u-s-m-b-20">Login</h2>
            <h6 class="account-h6 u-s-m-b-30">Welcome back! Sign in to your account.</h6>


             {{-- Registration Success Message using jQuery. Check front/js/custom.js --}} 
                        {{-- <p id="register-success" style="color: green"></p> --}}
                        <p id="register-success"></p>

            {{-- Note: To show the form's Validation Error Messages (Laravel's Validation Error Messages) from the AJAX call response from the server (backend), we create a <p> tag after every <input> field --}} {{-- We structure and use a certain pattern so that the <p> id pattern must be like: delivery-x (e.g. delivery-mobile, delivery-email, ... in order for the jQuery loop to work. And x must be identical to the 'name' HTML attributes (e.g. the <input> with the    name='mobile'    HTML attribute must have a <p> with an id HTML attribute    id="delivery-mobile"    ) so that when the vaildation errors array is sent as a response from backend/server (check $validator->messages()    inside    the method inside the controller) to the AJAX request, they could conveniently/easily be handled by the jQuery $.each() loop. Check front/js/custom.js) --}}
            <p id="login-error"></p> {{-- if the Validation passes / is okay but the login credentials provided by the user are incorrect, this'll be used by jQuery to show a generic 'Wrong Credentials!' message. Or to show a message when the user's account is inactive/disabled/deactivated --}}
            <form id="loginForm" action="javascript:;" method="post"> {{-- We need to deactivate the 'action' HTML attribute (using    'javascript:;'    ) as we'r going to submit using an AJAX call. Check front/js/custom.js --}}
                @csrf {{-- Preventing CSRF Requests: https://laravel.com/docs/9.x/csrf#preventing-csrf-requests --}}


                <div class="u-s-m-b-30">
                    <label for="user-email">Email
                        <span class="astk">*</span>
                    </label>
                    <input type="email" name="email" id="users-email" class="text-field" placeholder="Email">
                    <p id="login-email"></p>
                </div>
                <div class="u-s-m-b-30">
                    <label for="user-password">Password
                        <span class="astk">*</span>
                    </label>
                    <input type="password" name="password" id="users-password" class="text-field" placeholder="Password">
                    <p id="login-password"></p>
                </div>

                <div class="group-inline u-s-m-b-30">
                    <div class="group-2 text-right">
                        <div class="page-anchor">
                            <a href="{{ url('user/forgot-password') }}">
                                <i class="fas fa-circle-o-notch u-s-m-r-9"></i>Lost your password?
                            </a>
                        </div>
                    </div>
                </div>

                <div class="u-s-m-b-45">
                    <button class="button button-primary w-100">Login</button>
                </div>

                <div class="text-center account-h6">
                    <p>Don't have an account? 
                        <a href="{{ url('user/get-started') }}" class="u-c-brand">Register</a>
                    </p>
                </div>
            </form>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const successMessage = localStorage.getItem('successMessage');
            if (successMessage) {
                // Display the message
                $('#register-success').html(successMessage).attr('style', 'color: green').show();
                // Clear the message from localStorage
                localStorage.removeItem('successMessage');
            }
        });
    </script>
    
@endsection