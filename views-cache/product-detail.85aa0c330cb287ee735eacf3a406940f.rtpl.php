<?php if(!class_exists('Rain\Tpl')){exit;}?><section class="breadcrumb-area mt-15">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/">Início</a></li>
                        <li class="breadcrumb-item"><a href="/produtos">Produtos</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><?php echo htmlspecialchars( $product["desproduct"], ENT_COMPAT, 'UTF-8', FALSE ); ?></li>
                    </ol>
                </nav>
                <h5>Detalhes</h5>
                <h7>Categorias: <?php $counter1=-1;  if( isset($categories) && ( is_array($categories) || $categories instanceof Traversable ) && sizeof($categories) ) foreach( $categories as $key1 => $value1 ){ $counter1++; ?> <a href="/categories/<?php echo htmlspecialchars( $value1["idcategory"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" style="color: #335aff;"><?php echo htmlspecialchars( $value1["descategory"], ENT_COMPAT, 'UTF-8', FALSE ); ?></a><?php } ?></h7>
            </div>
        </div>
    </div>
</section>
<section class="product">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-5 col-12">
                <div class="product-slider">
                    <div class="exzoom" id="exzoom">
                        <div class="exzoom_img_box">
                            <ul class='exzoom_img_ul'>
                                <li><img src="<?php echo htmlspecialchars( $product["desphoto"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" /></li>
                            </ul>
                        </div>
                        <div class="exzoom_nav"></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-7 col-12">
                <div class="product-pricelist">
                    <h2><?php echo htmlspecialchars( $product["desproduct"], ENT_COMPAT, 'UTF-8', FALSE ); ?></h2>
                    <div class="product-pricelist-ratting">
                        <div class="price">
                            <span><?php echo formatPrice($product["vlprice"]); ?> €</span>
                        </div>
                    </div>
                    <p>Disposable Face Masks: 3-Layers Protection, the inner layer is a soft non-woven fabric,
                        which can absorb the moisture from the breath of the wearer. The middle layer is a
                        melt-blown polypropylene filtration layer for better filter out the particles in the
                        air. The outer layer is a water-resistant layer which can block the splashing liquid in
                        the air.
                    </p>
                    <br>
                    <div class="product-pricelist-selector-button">
                        <a class="btn cart-bg " href="/cart/<?php echo htmlspecialchars( $product["idproduct"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/add">Adicionar ao Carrinho
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-shopping-cart"><circle cx="9" cy="21" r="1"></circle><circle cx="20" cy="21" r="1"></circle><path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path></svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Product Details Area End -->

<!-- Features Section Start -->
<section class="features bg-lightwhite">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="section-title">
                    <h2>Produtos Recomendados</h2>
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
        </div>
    </div>
</section>