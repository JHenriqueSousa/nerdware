<?php if(!class_exists('Rain\Tpl')){exit;}?><section class="breadcrumb-area mt-15">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/">Início</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Carrinho</li>
                    </ol>
                </nav>
                <h5>Carrinho</h5>
            </div>
        </div>
    </div>
</section>
<?php if( $cart["vlsubtotal"] > 0 ){ ?>

<section class="cart-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <!-- Dashboard-Nav  Start-->
                <div class="dashboard-nav">
                    <ul class="list-inline">
                        <?php if( checkLogin(false) ){ ?>

                        <li class="list-inline-item"><a href="/user-dashboard">A Minha Conta</a></li>
                        <li class="list-inline-item"><a href="/cart" class="active">Carrinho</a></li>
                        <li class="list-inline-item"><a href="/logout" class="mr-0">Terminar Sessão</a></li>
                        <?php }else{ ?>

                        <li class="list-inline-item"><a href="/cart" class="active">Carrinho</a></li>
                        <li class="list-inline-item"><a href="/login">Iniciar Sessão</a></li>
                        <?php } ?>

                    </ul>
                </div>
                <!-- Dashboard-Nav  End-->
            </div>
        </div>
        <div class="rows">
            <div class="cart-items">
                <div class="header">
                    <div class="image">
                        Imagem
                    </div>
                    <div class="name">
                        Produto
                    </div>
                    <div class="price">
                        Preço
                    </div>
                    <div class="rating">
                        Quantidade
                    </div>
                    <div class="price">
                        Total
                    </div>
                    <div class="info">
                    
                    </div>
                </div>
                <div class="body">
                    <?php $counter1=-1;  if( isset($products) && ( is_array($products) || $products instanceof Traversable ) && sizeof($products) ) foreach( $products as $key1 => $value1 ){ $counter1++; ?>

                    <div class="item">
                        <div class="image">
                            <img src="<?php echo htmlspecialchars( $value1["desphoto"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                        </div>
                        <div class="name">
                            <div class="name-text">
                                <p><?php echo htmlspecialchars( $value1["desproduct"], ENT_COMPAT, 'UTF-8', FALSE ); ?></p>
                            </div>
                        </div>
                        <div class="price">
                            <span><?php echo formatPrice($value1["vlprice"]); ?> €</span>
                        </div>
                        <div class="info">
                            <div class="quantity">
                                <div class="product-pricelist-selector-quantity">
                                    <div class="wan-spinner wan-spinner-4">
                                        <a href="/cart/<?php echo htmlspecialchars( $value1["idproduct"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/minus" class="minus">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="11.98" height="6.69"
                                                viewBox="0 0 11.98 6.69">
                                                <path id="Arrow" d="M1474.286,26.4l5,5,5-5"
                                                    transform="translate(-1473.296 -25.41)" fill="none"
                                                    stroke="#989ba7" stroke-linecap="round" stroke-linejoin="round"
                                                    stroke-width="1.4" />
                                            </svg>
                                        </a>
                                        <input type="text" value="<?php echo htmlspecialchars( $value1["nrqtd"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" disabled min="1">
                                        <a href="/cart/<?php echo htmlspecialchars( $value1["idproduct"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/add" class="plus"><svg
                                                xmlns="http://www.w3.org/2000/svg" width="11.98" height="6.69"
                                                viewBox="0 0 11.98 6.69">
                                                <g id="Arrow" transform="translate(10.99 5.7) rotate(180)">
                                                    <path id="Arrow-2" data-name="Arrow" d="M1474.286,26.4l5,5,5-5"
                                                        transform="translate(-1474.286 -26.4)" fill="none"
                                                        stroke="#1a2224" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="1.4" />
                                                </g>
                                            </svg></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="price">
                            <span><?php echo formatPrice($value1["vltotal"]); ?>€</span>
                        </div>
                        <div class="rating">
                            <a class="del" href="/cart/<?php echo htmlspecialchars( $value1["idproduct"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/remove"><i class="fa fa-trash" aria-disabled="true" style="color: #000;" aria-hidden="true"></i></a>
                        </div>
                    </div>
                    <?php } ?>

                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="card-price">
                    <h6>Resumo</h6>
                    <div class="card-price-list d-flex justify-content-between align-items-center">
                        <div class="item">
                            <p><?php echo getCartNrQtd(); ?> Produtos</p>
                        </div>
                        <div class="price">
                            <p><?php echo formatPrice($cart["vlsubtotal"]); ?>€</p>
                        </div>
                    </div>
                    <div class="card-price-list d-flex justify-content-between align-items-center">
                        <div class="item">
                            <p>Portes</p>
                        </div>
                        <div class="price">
                            <p>5€</p>
                        </div>
                    </div>
                    <div class="card-price-subtotal d-flex justify-content-between align-items-center">
                        <div class="total-text">
                            <p>Preço Total</p>
                        </div>
                        <div class="total-price">
                            <p><?php echo formatPrice($cart["vltotal"]); ?>€</p>
                        </div>

                    </div>
                    <form action="#">
                        <a href="#" class="btn bg-primary" type="submit" style="width: 100%;">Pagar Agora</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<?php }else{ ?>

<main>
    <section class="search">
        
            <div class="col-sm">
                <div class="section-title">
                    <h2>Sem Produtos no Carrinho</h2>
                </div>
            </div>
        
    </section>
</main>
<script>
    document.addEventListener("DOMContentLoaded", function (event) {
      var scrollpos = localStorage.getItem("scrollpos");
      if (scrollpos) window.scrollTo(0, scrollpos);
    });
  
    window.onscroll = function (e) {
      localStorage.setItem("scrollpos", window.scrollY);
    };
  </script>
<?php } ?>