<!-- Footer -->
<footer class="footer">
    <div class="container">
        <!-- Outer-Footer -->
        <div class="outer-footer-wrapper u-s-p-y-80">
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



        </div>
        <!-- Outer-Footer /- -->
        <!-- Mid-Footer -->
        <div class="mid-footer-wrapper u-s-p-b-80">
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
                                <a href="tel:+2348155845899">
                                <i class="fas fa-phone u-s-m-r-9"></i>
                                <span>08155845899</span>
                                </a>
                            </li>
                            <li>
                                <a href="mailto:craftia@craftia.com.ng">
                                <i class="fas fa-envelope u-s-m-r-9"></i>
                                <span>
                                craftia@craftia.com.ng</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                 <div class="col-lg-3 col-md-3 col-sm-12">
                    <div class="footer-list">
                        <h6>Staff</h6>
                        <ul>

                            <li>
                                <a href="https://craftia.com.ng/admin/login">
                                
                                <span>Admin</span>
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