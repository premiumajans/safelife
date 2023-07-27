<header class="header header-transparent header-sticky d-none d-lg-block">
    <div class="header-top">
        <div class="container">
            <div class="row justify-content-between">

                <!--Links start-->
                <div class="header-top-links col">
                    <ul>
                        <li><i class="info-icon fa fa-phone-square"></i>(102) 6666 8888</li>
                        <li><i class="info-icon fa fa-map-marker"></i>183 Donato Parkways, CA, USA</li>
                    </ul>
                </div>
                <!--Links end-->

                <!--Socail start-->
                <div class="col">
                    <div class="header-top-social">
                        <a href="#"><i class="fa fa-facebook-square"></i></a>
                        <a href="#"><i class="fa fa-twitter"></i></a>
                        <a href="#"><i class="fa fa-instagram"></i></a>
                        <a href="#"><i class="fa fa-dribbble"></i></a>
                        <a href="#"><i class="fa fa-pinterest"></i></a>
                    </div>
                </div>
                <!--Socail end-->
            </div>

        </div>
    </div>
    <div class="header-bottom menu-right">
        <div class="container">
            <div class="row">

                <!--Logo start-->
                <div class="col-lg-2 col-md-4 col-6 mt-20 mb-20">
                    <div class="logo">
                        <a href="{{ route('frontend.index') }}"><img src="assets/images/logo/logo1.png" alt=""></a>
                    </div>
                </div>
                <!--Logo end-->

                <!--Menu start-->
                <div class="col-lg-10 col-md-8 col-6 d-flex justify-content-end position-static">
                    <nav class="main-menu">
                        <ul>
                            <li class="active"><a href="{{ route('frontend.index') }}"><p>Home</p></a></li>
                            <li class="position-static"><a href="#"><span>@lang('backend.categories')</span></a>
                                <ul class="mega-menu four-column">
                                    @foreach($mainCategories as $mc)
                                        <li>
                                            <a>{{ $mc->translate(app()->getLocale())->name ?? __('backend.translation-not-found') }}</a>
                                            <ul>
                                                @foreach($mc->subcategories as $mcs)
                                                    <li>
                                                        <a href="{{ route('frontend.selectedCategory',$mcs->slug) }}">{{ $mcs->translate(app()->getLocale())->name ?? __('backend.translation-not-found') }}</a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </li>
                                    @endforeach
                                </ul>
                            </li>
                            <li><a href="portfolio-boxed-grid.html"><span>Portfolio</span></a>
                                <ul class="sub-menu">
                                    <li><a href="portfolio-boxed-grid.html">Portfolio boxed grid</a></li>
                                    <li><a href="portfolio-wide-grid.html">Portfolio wide grid</a></li>
                                    <li><a href="portfolio-boxed-masonry.html">Portfolio boxed masonry</a></li>
                                    <li><a href="portfolio-wide-masonry.html">Portfolio wide masonry</a></li>
                                    <li><a href="portfolio-boxed-carousel.html">Portfolio boxed carousel</a></li>
                                    <li><a href="portfolio-wide-carousel.html">Portfolio wide carousel</a></li>
                                    <li><a href="portfolio-boxed-metro.html">Portfolio boxed metro</a></li>
                                    <li><a href="portfolio-wide-metro.html">Portfolio wide metro</a></li>
                                    <li class="has-dropdown"><a href="#">Single</a>
                                        <ul class="sub-menu">
                                            <li><a href="single-portfolio.html">Left description</a></li>
                                            <li><a href="single-portfolio-right.html">Right description</a></li>
                                            <li><a href="single-portfolio-gallery.html">Image gallery</a></li>
                                            <li><a href="single-portfolio-slider.html">Image slider</a></li>
                                            <li><a href="single-portfolio-video.html">Image video</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <li><a href="blog-classic.html"><span>News</span></a>
                                <ul class="sub-menu">
                                    <li><a href="blog-classic.html">Classic</a></li>
                                    <li><a href="blog-list.html">List</a></li>
                                    <li><a href="blog-grid.html">Grid</a></li>
                                    <li><a href="blog-grid-with-sidebar.html">Grid with sidebar</a></li>
                                    <li><a href="blog-carousel.html">Carousel</a></li>
                                    <li class="has-dropdown"><a href="#">Single</a>
                                        <ul class="sub-menu">
                                            <li><a href="single-blog.html">Left sidebar</a></li>
                                            <li><a href="single-blog-right.html">Right sidebar</a></li>
                                            <li><a href="single-blog-no-sidebar.html">No sidebar</a></li>
                                            <li><a href="single-blog-image.html">Image format</a></li>
                                            <li><a href="single-blog-gallery.html">Gallery format</a></li>
                                            <li><a href="single-blog-video.html">Video format</a></li>
                                            <li><a href="single-blog-link.html">Link format</a></li>
                                            <li><a href="single-blog-quote.html">Quote format</a></li>
                                            <li><a href="single-blog-audio.html">Audio format</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <li class="position-static"><a href="#"><span>Elements</span></a>
                                <ul class="mega-menu four-column">
                                    <li><a href="#">Elements 01</a>
                                        <ul>
                                            <li><a href="element-accordion.html">Accordion</a></li>
                                            <li><a href="element-button.html">Buttons</a></li>
                                            <li><a href="element-chart.html">Charts</a></li>
                                            <li><a href="element-clients.html">Clients</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="#">Elements 02</a>
                                        <ul>
                                            <li><a href="element-countdown-clock.html">Countdown clock</a></li>
                                            <li><a href="element-counter.html">Counter</a></li>
                                            <li><a href="element-icon-boxes.html">Icon boxes</a></li>
                                            <li><a href="element-image-carousel.html">Image Carousel</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="#">Elements 03</a>
                                        <ul>
                                            <li><a href="element-info-boxes-with-images.html">Info boxes with images</a>
                                            </li>
                                            <li><a href="element-list.html">Lists</a></li>
                                            <li><a href="element-popup-video.html">Popup video</a></li>
                                            <li><a href="element-pricing-tables.html">Pricing tables</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="#">Elements 04</a>
                                        <ul>
                                            <li><a href="element-slider.html">Slider</a></li>
                                            <li><a href="element-team.html">Team member</a></li>
                                            <li><a href="element-testimonial.html">Testimonial</a></li>
                                            <li><a href="element-typography.html">Typography</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <li><a href="shop.html"><span>Shop</span></a>
                                <ul class="sub-menu">
                                    <li><a href="shop.html">Shop</a></li>
                                    <li><a href="shop-with-sidebar.html">Shop with sidebar</a></li>
                                    <li><a href="shop-with-filter.html">Shop with filter</a></li>
                                    <li><a href="product-details.html">Product Details</a></li>
                                    <li><a href="cart.html">Cart</a></li>
                                    <li><a href="checkout.html">Checkout</a></li>
                                    <li><a href="my-account.html">My account</a></li>
                                </ul>
                            </li>
                        </ul>
                    </nav>
                    <div class="header-cart">
                        <a class="mini-cart" href="#"><i class="fa fa-shopping-bag"></i><span>3</span></a>
                        <div class="shopping-cart cart-box">
                            <div class="shop-inner">
                                <div class="header">
                                    <ul class="product-list">

                                        <!-- Start Single Product -->
                                        <li>
                                            <div class="thumb">
                                                <a href="single-product.html">
                                                    <img src="assets/images/cart/cart1.jpg" alt="">
                                                </a>
                                            </div>
                                            <div class="content">
                                                <div class="inner">
                                                    <h4><a href="single-product.html">Bottle with Leather
                                                            Grip</a></h4>
                                                    <div class="quatity">
                                                        <span>1 ×</span>
                                                        <span>39.00</span>
                                                    </div>
                                                </div>
                                                <button class="delete-btn"><i class="fa fa-close"></i></button>
                                            </div>
                                        </li>

                                        <!-- Start Single Product -->
                                        <li>
                                            <div class="thumb">
                                                <a href="single-product.html">
                                                    <img src="assets/images/cart/cart2.jpg" alt="">
                                                </a>
                                            </div>
                                            <div class="content">
                                                <div class="inner">
                                                    <h4><a href="single-product.html">Crystal Glass Globe Desk Lamp</a>
                                                    </h4>
                                                    <div class="quatity">
                                                        <span>1 ×</span>
                                                        <span>39.00</span>
                                                    </div>
                                                </div>
                                                <button class="delete-btn"><i class="fa fa-close"></i></button>
                                            </div>
                                        </li>

                                        <!-- Start Single Product -->
                                        <li>
                                            <div class="thumb">
                                                <a href="single-product.html">
                                                    <img src="assets/images/cart/cart1.jpg" alt="">
                                                </a>
                                            </div>
                                            <div class="content">
                                                <div class="inner">
                                                    <h4><a href="single-product.html">Gold Plated Desk
                                                            Lantern Lamp</a></h4>
                                                    <div class="quatity">
                                                        <span>1 ×</span>
                                                        <span>39.00</span>
                                                    </div>
                                                </div>
                                                <button class="delete-btn brook-transition"><i class="fa fa-close"></i>
                                                </button>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <div class="footer">
                                    <div class="total">Total: <span>225.00</span></div>
                                    <a class="cart-btn brook-transition" href="checkout.html">Check out</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="header-search">
                        <button class="header-search-toggle"><i class="fa fa-search"></i></button>
                    </div>
                </div>
                <!--Menu end-->
            </div>
        </div>
    </div>
</header>
