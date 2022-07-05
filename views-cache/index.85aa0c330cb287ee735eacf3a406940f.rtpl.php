<?php if(!class_exists('Rain\Tpl')){exit;}?><main>
    <!--Banner Area Start -->
    <section class="banner-area">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 order-2 order-lg-1">
                    <div class="banner-area__content">
                        <h2>iPhone 13 Resistência de lado a lado. E de um extremo ao outro.</h2>
                        <p>A nova câmara Ultra grande angular revela mais detalhes nas áreas escuras.</p>
                        <a class="btn bg-primary" href="/products/iphone13">Compra Agora</a>
                    </div>
                </div>
                <div class="col-lg-6 order-1 order-lg-2">
                    <div class="banner-area__img">
                        <img src="/res/site/dist/images/iphone-13-5-500x500.jpeg" alt="banner-img" class="img-fluid">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="brand-area">
                        <div class="brand-area-image">
                            <img src="/res/site/dist/images/brand/01.png" alt="Brand" class="img-fluid">
                        </div>
                        <div class="brand-area-image">
                            <img src="/res/site/dist/images/brand/02.png" alt="Brand" class="img-fluid">
                        </div>
                        <div class="brand-area-image">
                            <img src="/res/site/dist/images/brand/03.png" alt="Brand" class="img-fluid">
                        </div>
                        <div class="brand-area-image">
                            <img src="/res/site/dist/images/brand/04.png" alt="Brand" class="img-fluid">
                        </div>
                        <div class="brand-area-image">
                            <img src="/res/site/dist/images/brand/02.png" alt="Brand" class="img-fluid">
                        </div>
                        <div class="brand-area-image">
                            <img src="/res/site/dist/images/brand/05.png" alt="Brand" class="img-fluid">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Banner Area End -->

    <!-- Features Section Start -->
    <section class="features">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="section-title">
                        <h2>Novidades</h2>
                    </div>
                </div>
            </div>
            <div class="features-wrapper">
                <div class="features-active">
                    <?php $counter1=-1;  if( isset($products) && ( is_array($products) || $products instanceof Traversable ) && sizeof($products) ) foreach( $products as $key1 => $value1 ){ $counter1++; ?>

                    <div class="product-item">
                        <div class="product-item-image">
                            <a href="/products/<?php echo htmlspecialchars( $value1["desurl"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><img src="<?php echo htmlspecialchars( $value1["desphoto"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" alt="..."
                                    class="img-fluid"></a>
                            <div class="cart-icon">
                                <a href="/cart/<?php echo htmlspecialchars( $value1["idproduct"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/add">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16.75" height="16.75"
                                        viewBox="0 0 16.75 16.75">
                                        <g id="Your_Bag" data-name="Your Bag" transform="translate(0.75)">
                                            <g id="Icon" transform="translate(0 1)">
                                                <ellipse id="Ellipse_2" data-name="Ellipse 2" cx="0.682" cy="0.714"
                                                    rx="0.682" ry="0.714" transform="translate(4.773 13.571)"
                                                    fill="none" stroke="#1a2224" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="1.5" />
                                                <ellipse id="Ellipse_3" data-name="Ellipse 3" cx="0.682" cy="0.714"
                                                    rx="0.682" ry="0.714" transform="translate(12.273 13.571)"
                                                    fill="none" stroke="#1a2224" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="1.5" />
                                                <path id="Path_3" data-name="Path 3"
                                                    d="M1,1H3.727l1.827,9.564a1.38,1.38,0,0,0,1.364,1.15h6.627a1.38,1.38,0,0,0,1.364-1.15L16,4.571H4.409"
                                                    transform="translate(-1 -1)" fill="none" stroke="#1a2224"
                                                    stroke-linecap="round" stroke-linejoin="round"
                                                    stroke-width="1.5" />
                                            </g>
                                        </g>
                                    </svg>
                                </a>
                            </div>
                        </div>
                        <div class="product-item-info">
                            <a href="/products/<?php echo htmlspecialchars( $value1["desurl"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo htmlspecialchars( $value1["desproduct"], ENT_COMPAT, 'UTF-8', FALSE ); ?></a>
                            <span><?php echo formatPrice($value1["vlprice"]); ?> €</span>
                        </div>
                    </div>
                    <?php } ?>

                </div>
                <div class="slider-arrows">
                    <div class="prev-arrow">
                        <svg xmlns="http://www.w3.org/2000/svg" width="9.414" height="16.828"
                            viewBox="0 0 9.414 16.828">
                            <path id="Icon_feather-chevron-left" data-name="Icon feather-chevron-left"
                                d="M20.5,23l-7-7,7-7" transform="translate(-12.5 -7.586)" fill="none"
                                stroke="#1a2224" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                        </svg>
                    </div>
                    <div class="next-arrow">
                        <svg xmlns="http://www.w3.org/2000/svg" width="9.414" height="16.828"
                            viewBox="0 0 9.414 16.828">
                            <path id="Icon_feather-chevron-right" data-name="Icon feather-chevron-right"
                                d="M13.5,23l5.25-5.25.438-.437L20.5,16l-7-7" transform="translate(-12.086 -7.586)"
                                fill="none" stroke="#1a2224" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" />
                        </svg>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="features-morebutton text-center">
                        <a class="btn bt-glass" href="/novidades">Ver Novidades</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Features Section End -->

    <!-- About Area Start -->
    <section class="about-area">
        <div class="container">
            <div class="about-area-content">
                <div class="row align-items-center">
                    <div class="col-lg-6 ">
                        <div class="about-area-content-img">
                            <img src="/res/site/dist/images/feature/medicine.jpg" alt="img" class="img-fluid">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="about-area-content-text">
                            <h3>Why Shop with Olog</h3>
                            <p>Fortify your hair follicles, give thinning areas some volume, and treat your
                                body’s
                                skin like driving your dream car off the lot.</p>
                            <div class="icon-area-content">
                                <div class="icon-area">
                                    <i class="far fa-check-circle"></i>
                                    <span>Secure Payment Method.</span>
                                </div>
                                <div class="icon-area">
                                    <i class="far fa-check-circle"></i>
                                    <span>24/7 Customers Services.</span>
                                </div>
                                <div class="icon-area">
                                    <i class="far fa-check-circle"></i>
                                    <span>Shop in 2 languages</span>
                                </div>
                                <div class="icon-area">
                                    <i class="far fa-check-circle"></i>
                                    <span>Mauris congue eros in iaculis.</span>
                                </div>
                            </div>

                            <a class="btn bg-primary" href="#">Get Started</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- About Area End -->

    <!-- Populer Product Strat -->
    <section class="populerproduct">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="section-title">
                        <h2>Produtos</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <?php $counter1=-1;  if( isset($products2) && ( is_array($products2) || $products2 instanceof Traversable ) && sizeof($products2) ) foreach( $products2 as $key1 => $value1 ){ $counter1++; ?>

                <div class="col-md-4 col-sm-6">
                    <div class="product-item">
                        <div class="product-item-image">
                            <a href="/products/<?php echo htmlspecialchars( $value1["desurl"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><img src="<?php echo htmlspecialchars( $value1["desphoto"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" alt="Product Name"
                                    class="img-fluid"></a>
                            <div class="cart-icon">
                                <a href="/cart/<?php echo htmlspecialchars( $value1["idproduct"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/add">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16.75" height="16.75"
                                        viewBox="0 0 16.75 16.75">
                                        <g id="Your_Bag" data-name="Your Bag" transform="translate(0.75)">
                                            <g id="Icon" transform="translate(0 1)">
                                                <ellipse id="Ellipse_2" data-name="Ellipse 2" cx="0.682" cy="0.714"
                                                    rx="0.682" ry="0.714" transform="translate(4.773 13.571)"
                                                    fill="none" stroke="#1a2224" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="1.5" />
                                                <ellipse id="Ellipse_3" data-name="Ellipse 3" cx="0.682" cy="0.714"
                                                    rx="0.682" ry="0.714" transform="translate(12.273 13.571)"
                                                    fill="none" stroke="#1a2224" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="1.5" />
                                                <path id="Path_3" data-name="Path 3"
                                                    d="M1,1H3.727l1.827,9.564a1.38,1.38,0,0,0,1.364,1.15h6.627a1.38,1.38,0,0,0,1.364-1.15L16,4.571H4.409"
                                                    transform="translate(-1 -1)" fill="none" stroke="#1a2224"
                                                    stroke-linecap="round" stroke-linejoin="round"
                                                    stroke-width="1.5" />
                                            </g>
                                        </g>
                                    </svg>
                                </a>
                            </div>
                        </div>
                        <div class="product-item-info">
                            <a href="/products/<?php echo htmlspecialchars( $value1["desurl"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo htmlspecialchars( $value1["desproduct"], ENT_COMPAT, 'UTF-8', FALSE ); ?></a>
                            <span><?php echo formatPrice($value1["vlprice"]); ?> €</span>
                        </div>
                    </div>
                </div>
                <?php } ?>

            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="features-morebutton text-center">
                        <a class="btn bt-glass" href="/produtos">Ver Produtos</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>