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



        <!-- app -->
        <div id="app">

            {{-- Header partial --}}
            @include('front.layout.header')


            {{-- Middle Content (varies from a page to another) --}}
            @yield('content')

        <!-- Footer -->
<footer class="footer" style="margin-top: 200px">
    <div class="container">
        <!-- Outer-Footer -->
        <!-- <div class="outer-footer-wrapper u-s-p-y-80">
            <h6>
                For special offers and other discount information
            </h6>
            <h1>
                Subscribe to our Newsletter
            </h1>
            <p>
                Subscribe to the mailing list to receive updates on promotions, new arrivals, discount and coupons.
            </p>



            
            <form class="newsletter-form">
                <label class="sr-only" for="subscriber_email">Enter your Email</label>
                <input type="text" placeholder="Your Email Address" id="subscriber_email" name="subscriber_email" required> {{-- We'll use the HTML id Global Attribute in jQuery in front/js/custom.js --}} 
                <button type="button" class="button" onclick="addSubscriber()">SUBMIT</button> {{-- Check the addSubscriber() function in front/js/custom.js. We'll use it in conjunction with the    id="subscriber_email"    of the <input> field --}}
            </form>



        </div> -->
        <!-- Outer-Footer /- -->
        <!-- Mid-Footer -->
        <div class="mid-footer-wrapper u-s-p-b-80" style="padding-top: 100px;">
            <div class="row d-flex justify-content-center align-items-center">
                <div class="col-lg-2 col-md-2 col-sm-12">
                    <div class="footer-list">
                        <h6>COMPANY</h6>
                        <ul>
                            <li>
                                <a href="{{ url('about-us') }}">About Us</a>
                            </li>
                            <li>
                                <a href="{{ url('contact') }}">Contact Us</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-2 col-md-2 col-sm-12">
                    <div class="footer-list">
                        <h6>COMPANY</h6>
                        <ul>
                            <li>
                                <a href="{{ url('vendor/login-register') }}">
                                    {{-- <i class="fas fa-sign-in-alt u-s-m-r-9"></i> --}}
                                    Become a vendor
                                </a>
                            </li>
                            <li>
                                <a href="{{ url('contact') }}">Contact Us</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-2 col-md-2 col-sm-12">
                    <div class="footer-list">
                        <h6>ACCOUNT</h6>
                        <ul>
                            <li>
                                <a href="{{ url('user/account') }}">My Account</a>
                            </li>
                            <li>
                                <a href="{{ url('user/orders') }}">My Orders</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-12">
                    <div class="footer-list">
                        <h6>Contact</h6>
                        <ul>
                            <li>
                                <i class="fas fa-location-arrow u-s-m-r-9"></i>
                                <span>Craftia</span>
                            </li>
                            <li>
                                <a href="tel:+201255845857">
                                <i class="fas fa-phone u-s-m-r-9"></i>
                                <span>08155845899</span>
                                </a>
                            </li>
                            <li>
                                <a href="mailto:carftia@craftia.com.ng">
                                <i class="fas fa-envelope u-s-m-r-9"></i>
                                <span>
                                craftia@craftia.com.ng</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- Mid-Footer /- -->
        <!-- Bottom-Footer -->
        <div class="bottom-footer-wrapper">
            <div class="social-media-wrapper">
                <ul class="social-media-list">
                    <li>
                        <a target="_blank" href="#">
                        <i class="fab fa-facebook-f"></i>
                        </a>
                    </li>
                    <li>
                        <a target="_blank" href="#">
                        <i class="fab fa-twitter"></i>
                        </a>
                    </li>
                    <li>
                        <a target="_blank" href="#">
                        <i class="fab fa-pinterest"></i>
                        </a>
                    </li>
                    <li>
                        <a target="_blank" href="#">
                        <i class="fab fa-youtube"></i>
                        </a>
                    </li>
                </ul>
            </div>
            <p class="copyright-text">Copyright &copy; 2024
                <a target="_blank" rel="nofollow" href="#">Craftia</a> | All Rights Reserved
            </p>
        </div>
    </div>
    <!-- Bottom-Footer /- -->
</footer>
<!-- Footer /- -->



            {{-- Modal Popup partial --}}
            @include('front.layout.modals')

        </div>
        <!-- app /- -->
        <!--[if lte IE 9]>
        <div class="app-issue">
            <div class="vertical-center">
                <div class="text-center">
                    <h1>You are using an outdated browser.</h1>
                    <span>This web app is not compatible with following browser. Please upgrade your browser to improve your security and experience.</span>
                </div>
            </div>
        </div>
        <style> #app {
            display: none;
            } 
        </style>
        <![endif]-->
        <!-- NoScript -->
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