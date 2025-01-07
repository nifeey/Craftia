<?php
// Getting the 'enabled' sections ONLY and their child categories (using the 'categories' relationship method) which, in turn, include their 'subcategories`
$sections = \App\Models\Section::sections();
// dd($sections);
?>



<!-- Header -->
<header>

    <!-- Mid-Header -->
    <div class="full-layer-mid-header">
        <div class="container">
            <div class="row clearfix align-items-center">
                <div class="col-lg-2 col-md-9 col-sm-6">
                    <div class="brand-logo text-lg-center">


                        <a href="{{ url('/') }}" class="w-">


                            <img src="{{ asset('front/images/main-logo/nav-logo.png') }}" alt="Craftia" class="app-brand-logo" style="width:150px">
                        </a>
                    </div>
                </div>
                <div class="col-lg-2 col-md-9 col-sm-6">
                    <div class="v-menu v-close">
                        <span class="v-title">
                        <i class="ion ion-md-menu"></i>
                        All Categories
                        {{-- <i class="fas fa-angle-down"></i> --}}
                        </span>
                        <nav>
                            <div class="v-wrapper">
                                <ul class="v-list animated fadeIn">



                                    @foreach ($sections as $section)
                                        @if (count($section['categories']) > 0) {{-- if the section has child categories, show the section name, but if it doesn't, don't show it --}}
                                            <li class="js-backdrop">
                                                <a href="javascript:;">
                                                <i class="ion-ios-add-circle"></i>


                                                {{ $section['name'] }} {{-- Show section name --}}


                                                <i class="ion ion-ios-arrow-forward"></i>
                                                </a>
                                                <button class="v-button ion ion-md-add"></button>
                                                <div class="v-drop-right" style="width: 700px;">
                                                    <div class="row">



                                                        @foreach ($section['categories'] as $category) {{-- Show the section child categories --}}
                                                            <div class="col-lg-4">
                                                                <ul class="v-level-2">
                                                                    <li>
                                                                        <a href="{{ url($category['url']) }}">{{ $category['category_name'] }}</a>
                                                                        <ul>


 
                                                                            @foreach ($category['sub_categories'] as $subcategory) {{-- Show the section child categories child Subcategories --}}
                                                                            <li>
                                                                                <a href="{{ url($subcategory['url']) }}">{{ $subcategory['category_name'] }}</a>
                                                                            </li>
                                                                            @endforeach



                                                                        </ul>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </li>
                                        @endif
                                    @endforeach


                                </ul>
                            </div>
                        </nav>
                    </div>
                </div>
                <div class="col-lg-5 u-d-none-lg">



                    {{-- Website Search Form (to search for all website products) --}} 
                    <form class="form-searchbox" action="{{ url('/search-products') }}" method="get">
                        <label class="sr-only" for="search-landscape">Search</label>
                        <input id="search-landscape" type="text" class="text-field" placeholder="Search foritems or shop" name="search" @if (isset($_REQUEST['search']) && !empty($_REQUEST['search'])) value="{{ $_REQUEST['search'] }}" @endif> {{-- We use the "name" HTML attribute as a key/name for the "value" HTML attribute for submitting the Search Form. Check the "value" HTML attribute too inside the <option> HTML tag down below! --}} {{-- if the user uses the Search Form --}}
                        <div class="select-box-position">
                            <div class="select-box-wrapper select-hide">
<label class="sr-only" for="select-category">Choose category for search</label>
<select class="select-box" id="select-category" name="section_id">
    <option selected="selected" value="">All</option>
    <option value="customized-products" @if (isset($_REQUEST['section_id']) && $_REQUEST['section_id'] == 'customized-products') selected @endif>Customized Products</option>
    <option value="handmade-items" @if (isset($_REQUEST['section_id']) && $_REQUEST['section_id'] == 'handmade-items') selected @endif>Handmade Items</option>
    <option value="unique-designs" @if (isset($_REQUEST['section_id']) && $_REQUEST['section_id'] == 'unique-designs') selected @endif>Unique Designs</option>
    @foreach ($sections as $section)
        <option value="{{ $section['id'] }}" @if (isset($_REQUEST['section_id']) && $_REQUEST['section_id'] == $section['id']) selected @endif>{{ $section['name'] }}</option>
    @endforeach
</select>

                            </div>
                        </div>
                        <button id="btn-search" type="submit" class="button button-primary fas fa-search"></button>
                    </form>

                    @php
                        // dd($_GET);
                    @endphp



                </div>
                <div class="col-lg-2 col-md-3 col-sm-6">
                    <nav>
                        <ul class="mid-nav g-nav">
                            <li style="margin-left: 0;">



                                <a style="font-size:14px;">
                                    {{-- If the user is authenticated/logged in, show 'My Account', if not, show 'Login/Register' --}} 
                                    @if (\Illuminate\Support\Facades\Auth::check()) {{-- Determining If The Current User Is Authenticated: https://laravel.com/docs/9.x/authentication#determining-if-the-current-user-is-authenticated --}}
                                        My Account
                                    @else
                                        Login/Register
                                    @endif
        
                                    <i class="fas fa-chevron-down u-s-m-l-9"></i>
                                </a>
                                <ul class="g-dropdown" style="width:200px">
                                     {{-- If the user is authenticated/logged in, show 'My Account' and 'Logout', if not, show 'Customer Login' and 'Vendor Login' --}} 
                                     @if (\Illuminate\Support\Facades\Auth::check()) {{-- Determining If The Current User Is Authenticated: https://laravel.com/docs/9.x/authentication#determining-if-the-current-user-is-authenticated --}}
                                     <li>
                                         <a href="{{ url('user/account') }}"> 
                                             <i class="fas fa-sign-in-alt u-s-m-r-9"></i>
                                             My Account
                                         </a>
                                     </li>
     
                                     
                                     <li>
                                         <a href="{{ url('user/orders') }}"> 
                                             <i class="fas fa-sign-in-alt u-s-m-r-9"></i>
                                             My Orders
                                         </a>
                                     </li>
     
                                     <li>
                                         <a href="{{ url('user/logout') }}"> 
                                             <i class="fas fa-sign-in-alt u-s-m-r-9"></i>
                                             Logout
                                         </a>
                                     </li>
                                 @else
                                     <li>
                                         <a href="{{ url('user/sign-in') }}"> 
                                             <i class="fas fa-sign-in-alt u-s-m-r-9"></i>
                                             Login as a Buyer
                                         </a>
                                     </li>
                                     <li>
                                         <a href="{{ url('vendor/login-register') }}"> 
                                             <i class="fas fa-sign-in-alt u-s-m-r-9"></i>
                                             Login as a Vendor
                                         </a>
                                     </li>
                                     <li>
                                         <a href="{{ url('user/get-started') }}"> 
                                             <i class="fas fa-sign-in-alt u-s-m-r-9"></i>
                                             Register as a Buyer
                                         </a>
                                     </li>
                                   
                                 @endif
     
     
                                    <li>
                                        <a href="{{ url('cart') }}">
                                        <i class="fas fa-cog u-s-m-r-9"></i>
                                        My Cart</a>
                                    </li>
                                    <li>
                                        <a href="{{ url('checkout') }}">
                                        <i class="far fa-check-circle u-s-m-r-9"></i>
                                        Checkout</a>
                                    </li>
        
        
        
                                   
        
                                </ul>
                            </li>
                            
                            <li>
                                <a id="mini-cart-trigger">
                                <i class="ion ion-md-basket"></i>
                                <span class="item-counter totalCartItems">{{ totalCartItems() }}</span> {{-- totalCartItems() function is in our custom Helpers/Helper.php file that we have registered in 'composer.json' file --}} {{-- We created the CSS class 'totalCartItems' to use it in front/js/custom.js to update the total cart items via AJAX, because in pages that we originally use AJAX to update the cart items (such as when we delete a cart item in http://127.0.0.1:8000/cart using AJAX), the number doesn't change in the header automatically because AJAX is already used and no page reload/refresh has occurred --}}
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- Mid-Header /- -->
    <!-- Responsive-Buttons -->
    <div class="fixed-responsive-container">
        <div class="fixed-responsive-wrapper">
            <button type="button" class="button fas fa-search" id="responsive-search"></button>
        </div>
    </div>
    <!-- Responsive-Buttons /- -->



    <!-- Mini Cart Widget -->
    <div id="appendHeaderCartItems"> {{-- We created the CSS class 'appendHeaderCartItems' to use it in front/js/custom.js to update the total cart items via AJAX in the Mini Cart Wedget, because in pages that we originally use AJAX to update the cart items (such as when we delete a cart item in http://127.0.0.1:8000/cart using AJAX), the number doesn't change in the header automatically because AJAX is already used and no page reload/refresh has occurred --}}
        @include('front.layout.header_cart_items')
    </div>
    <!-- Mini Cart Widget /- -->



    <!-- Bottom-Header -->
    <div class="full-layer-bottom-header">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-3">

                </div>
                <div class="col-lg-9">
                    <ul class="bottom-nav g-nav u-d-none-lg">
                        <li>
                            <a href="{{ url('search-products?search=new-arrivals') }}">New Arrivals 
                            {{-- <span class="superscript-label-new">NEW</span> --}}
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('search-products?search=best-sellers') }}">Best Seller 
                            {{-- <span class="superscript-label-hot">HOT</span> --}}
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('search-products?search=featured') }}">Featured 
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('search-products?search=discounted') }}">Discounted 
                            {{-- <span class="superscript-label-discount">>10%</span> --}}
                            </a>
                        </li>
                        <li class="mega-position">
                            <a>More
                            <i class="fas fa-chevron-down u-s-m-l-9"></i>
                            </a>
                            <div class="mega-menu mega-3-colm">
                                <ul>
                                    <li class="menu-title">COMPANY</li>
                                    <li>
                                        <a href="{{ url('about-us') }}" class="u-c-brand">About Us</a>
                                    </li>
                                    <li>
                                        <a href="{{ url('contact') }}">Contact Us</a>
                                    </li>
                                    <li>
                                        <a href="{{ url('faq') }}">FAQ</a>
                                    </li>
                                </ul>
                                <ul>
                                    <li class="menu-title">ACCOUNT</li>
                                    <li>
                                        <a href="{{ url('user/account') }}">My Account</a>
                                    </li>
                                    <li>
                                        <a href="{{ url('user/orders') }}">My Orders</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- Bottom-Header /- -->
</header>
<!-- Header /- -->