<!DOCTYPE html>
<html class="no-js" lang="en-US">
    <head>
        <meta charset="UTF-8">
        <!--[if IE]>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <![endif]-->
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">



        {{-- X-CSRF-TOKEN: https://laravel.com/docs/9.x/csrf#csrf-x-csrf-token --}} 
        <meta name="csrf-token" content="{{ csrf_token() }}">



        <meta name="description" content="">
        <meta name="author" content="">


        {{-- Static And Dynamic SEO (HTML meta tags): Check the HTML <meta> tags and <title> tag in front/layout/layout.blade.php. Check index() method in Front/IndexController.php, listing() method in Front/ProductsController.php, detail() method in Front/ProductsController.php and cart() method in Front/ProductsController.php     --}}
        @if (!empty($meta_description))
            <meta name="description" content="{{ $meta_description }}">
        @endif

        @if (!empty($meta_keywords))
            <meta name="keywords" content="{{ $meta_keywords }}">
        @endif

        <title>

            {{-- Static And Dynamic SEO (HTML meta tags): Check the HTML <meta> tags and <title> tag in front/layout/layout.blade.php. Check index() method in Front/IndexController.php, listing() method in Front/ProductsController.php, detail() method in Front/ProductsController.php and cart() method in Front/ProductsController.php     --}}
            @if (!empty($meta_title))
                {{ $meta_title }}
            @else
            Craftia- Global marketplace for customized, handmade and unique products
            @endif
            
        </title>
        <!-- Standard Favicon -->
        <link href="{{ url('favicon.ico') }}" rel="shortcut icon">
        <!-- Base Google Font for Web-app -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700" rel="stylesheet">
        <!-- Google Fonts for Banners only -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:400,800" rel="stylesheet">
        <!-- Bootstrap 4 -->
        <link rel="stylesheet" href="{{ url('front/css/bootstrap.min.css') }}">
        <!-- Font Awesome 5 -->
        <link rel="stylesheet" href="{{ url('front/css/fontawesome.min.css') }}">
        <!-- Ion-Icons 4 -->
        <link rel="stylesheet" href="{{ url('front/css/ionicons.min.css') }}">
        <!-- Animate CSS -->
        <link rel="stylesheet" href="{{ url('front/css/animate.min.css') }}">
        <!-- Owl-Carousel -->
        <link rel="stylesheet" href="{{ url('front/css/owl.carousel.min.css') }}">
        <!-- Jquery-Ui-Range-Slider -->
        <link rel="stylesheet" href="{{ url('front/css/jquery-ui-range-slider.min.css') }}">
        <!-- Utility -->
        <link rel="stylesheet" href="{{ url('front/css/utility.css') }}">
        <!-- Main -->
        <link rel="stylesheet" href="{{ url('front/css/bundle.pink.css') }}">



        {{-- EasyZoom plugin for zooming product images upon hover --}}
        {{-- My EasyZoom (jQuery image zoom plugin): https://i-like-robots.github.io/EasyZoom/ --}}
        <link rel="stylesheet" href="{{ url('front/css/easyzoom.css') }}">



        {{-- My Preloader/Loader/Loading Page/Preloading Screen --}} 
        <link rel="stylesheet" href="{{ url('front/css/custom.css') }}">



    </head>
    <body>


        {{-- My Preloader/Loader/Loading Page/Preloading Screen --}} 
        <div class="loader">
            <img src="{{ asset('front/images/loaders/loader.gif') }}" alt="loading..." />
         </div>

        <!-- Terms and Conditions Section -->
        <div class="terms-and-conditions u-s-p-t-80">
            <div class="container term">
                <h1>Terms and Conditions</h1>
                <p>Craftia is a global marketplace for customized, handmade, and unique products. By accessing and using our website, you agree to comply with the following terms and conditions:</p>

                <ul class="term-list">
                    <li>
                        <strong>1. General Use</strong>
                        <p>By using Craftia, you confirm that you are at least 18 years old or accessing under parental supervision. Craftia reserves the right to modify or terminate services without prior notice.</p>
                    </li>
                    <li>
                        <strong>2. Account Registration</strong>
                        <p>Users must register an account to purchase or sell products. You agree to provide accurate and up-to-date information during registration. You are responsible for keeping your account secure, including your login credentials.</p>
                    </li>
                    <li>
                        <strong>3. Buying & Selling</strong>
                        <p>Sellers must accurately describe products. Craftia is not liable for inaccuracies in product listings. Buyers must ensure their payment information is correct when completing transactions.</p>
                    </li>
                    <li>
                        <strong>4. Payments</strong>
                        <p>Payments are processed through third-party payment gateways (e.g., Paystack, PayPal). Craftia is not responsible for payment issues arising from third-party providers. Payment information is securely handled and not stored by Craftia.</p>
                    </li>
                    <li>
                        <strong>5. Shipping</strong>
                        <p>Sellers are responsible for shipping products promptly using reliable carriers. Buyers are encouraged to track their packages. Shipping costs and any customs duties are the responsibility of the buyer, unless otherwise specified.</p>
                    </li>
                    <li>
                        <strong>6. Returns and Refunds</strong>
                        <p>Products may be returned in accordance with Craftia’s return policy. Any disputes will be handled on a case-by-case basis. Refunds will only be issued once the product has been returned in original condition.</p>
                    </li>
                    <li>
                        <strong>7. Intellectual Property</strong>
                        <p>All content on Craftia, including logos, images, and designs, are the intellectual property of Craftia or the respective sellers. Unauthorized use is prohibited.</p>
                    </li>
                    <li>
                        <strong>8. Prohibited Use</strong>
                        <p>Users may not engage in any illegal or fraudulent activities, including selling counterfeit products. Craftia reserves the right to suspend or terminate any account involved in such activities.</p>
                    </li>
                    <li>
                        <strong>9. Limitation of Liability</strong>
                        <p>Craftia is not liable for any direct or indirect damages arising from the use of the website or the services provided by third parties. Users agree that their use of Craftia is at their own risk.</p>
                    </li>
                    <li>
                        <strong>10. Dispute Resolution</strong>
                        <p>Any disputes between buyers and sellers should be resolved amicably. If unresolved, Craftia may assist in resolving the issue but is not obligated to.</p>
                    </li>
                    <li>
                        <strong>11. Governing Law</strong>
                        <p>These terms are governed by the laws of the Federal Republic of Nigeria. By continuing to use Craftia, you agree to these Terms and Conditions. If you do not agree, please discontinue use of the platform.</p>
                    </li>
                </ul>
            </div>
        </div>
        <!-- Terms and Conditions Section /- -->
    </div>
    <!-- app /- -->

    <noscript>
            <div class="app-issue">
                <div class="vertical-center">
                    <div class="text-center">
                        <h1>JavaScript is disabled in your browser.</h1>
                        <span>Please enable JavaScript in your browser or upgrade to a JavaScript-capable browser.</span>
                    </div>
                </div>
            </div>
            <style>
                #app {
                display: none;
                }
            </style>
        </noscript>
        <!-- Google Analytics: change UA-XXXXX-Y to be your site's ID. -->
        <script>
            window.ga = function() {
                ga.q.push(arguments)
            };
            ga.q = [];
            ga.l = +new Date;
            ga('create', 'UA-XXXXX-Y', 'auto');
            ga('send', 'pageview')
        </script>
        <script src="https://www.google-analytics.com/analytics.js" async defer></script>
        <!-- Modernizr-JS -->
        <script type="text/javascript" src="{{ url('front/js/vendor/modernizr-custom.min.js') }}"></script>
        <!-- NProgress -->
        <script type="text/javascript" src="{{ url('front/js/nprogress.min.js') }}"></script>
        <!-- jQuery -->
        <script type="text/javascript" src="{{ url('front/js/jquery.min.js') }}"></script>
        <!-- Bootstrap JS -->
        <script type="text/javascript" src="{{ url('front/js/bootstrap.min.js') }}"></script>
        <!-- Popper -->
        <script type="text/javascript" src="{{ url('front/js/popper.min.js') }}"></script>
        <!-- ScrollUp -->
        <script type="text/javascript" src="{{ url('front/js/jquery.scrollUp.min.js') }}"></script>
        <!-- Elevate Zoom -->
        <script type="text/javascript" src="{{ url('front/js/jquery.elevatezoom.min.js') }}"></script>
        <!-- jquery-ui-range-slider -->
        <script type="text/javascript" src="{{ url('front/js/jquery-ui.range-slider.min.js') }}"></script>
        <!-- jQuery Slim-Scroll -->
        <script type="text/javascript" src="{{ url('front/js/jquery.slimscroll.min.js') }}"></script>
        <!-- jQuery Resize-Select -->
        <script type="text/javascript" src="{{ url('front/js/jquery.resize-select.min.js') }}"></script>
        <!-- jQuery Custom Mega Menu -->
        <script type="text/javascript" src="{{ url('front/js/jquery.custom-megamenu.min.js') }}"></script>
        <!-- jQuery Countdown -->
        <script type="text/javascript" src="{{ url('front/js/jquery.custom-countdown.min.js') }}"></script>
        <!-- Owl Carousel -->
        <script type="text/javascript" src="{{ url('front/js/owl.carousel.min.js') }}"></script>
        <!-- Main -->
        <script type="text/javascript" src="{{ url('front/js/app.js') }}"></script>



        <!-- Our front/js/custom.js file --> 
        <script type="text/javascript" src="{{ url('front/js/custom.js') }}"></script>



        {{-- EasyZoom plugin for zooming product images upon hover --}}
        {{-- My EasyZoom (jQuery image zoom plugin): https://i-like-robots.github.io/EasyZoom/ --}}
        <script type="text/javascript" src="{{ url('front/js/easyzoom.js') }}"></script>
        <script>
            // Instantiate EasyZoom instances
            var $easyzoom = $('.easyzoom').easyZoom();
    
            // Setup thumbnails example
            var api1 = $easyzoom.filter('.easyzoom--with-thumbnails').data('easyZoom');
    
            $('.thumbnails').on('click', 'a', function(e) {
                var $this = $(this);
    
                e.preventDefault();
    
                // Use EasyZoom's `swap` method
                api1.swap($this.data('standard'), $this.attr('href'));
            });
    
            // Setup toggles example
            var api2 = $easyzoom.filter('.easyzoom--with-toggle').data('easyZoom');
    
            $('.toggle').on('click', function() {
                var $this = $(this);
    
                if ($this.data("active") === true) {
                    $this.text("Switch on").data("active", false);
                    api2.teardown();
                } else {
                    $this.text("Switch off").data("active", true);
                    api2._init();
                }
            });
        </script>



        {{-- To enable us to write PHP code within JavaScript code (to operate the Dynamic Filters dynamically (the second way)) --}} 
        @include('front.layout.scripts') {{-- scripts.blade.php --}}



    </body>
</html>
