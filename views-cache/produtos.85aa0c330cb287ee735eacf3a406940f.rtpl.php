<?php if(!class_exists('Rain\Tpl')){exit;}?><section class="breadcrumb-area mt-15">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/">Início</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Produtos</li>
                    </ol>
                </nav>
                <h5>Produtos</h5>
            </div>
        </div>
    </div>
</section>
<br>
<section class="populerproduct bg-white p-0 shop-product">
    <div class="container">
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
    </div>
</section>