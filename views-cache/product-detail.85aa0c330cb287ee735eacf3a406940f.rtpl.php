<?php if(!class_exists('Rain\Tpl')){exit;}?><link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" />
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" rel="stylesheet" />
<link href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js" rel="stylesheet" />
<link href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css" rel="stylesheet" />
<header class="bg-dark py-5">
    <div class="container px-4 px-lg-5 my-5">
        <div class="text-center text-white">
            <h1 class="display-4 fw-bolder">Nerdware</h1>
            <p class="lead fw-normal text-white-50 mb-0">A sua loja de tecnologia que disponibiliza uma vasta gama de produtos e serviços informáticos.</p>
        </div>
    </div>
</header>
<div class="container mt-5 mb-5">	
    <div class="card">	
        <div class="row g-0">	
            <div class="col-md-6 border-end">	
                <div class="d-flex flex-column justify-content-center">	
                    <div class="main_image">	
                        <img src="<?php echo htmlspecialchars( $product["desphoto"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" id="main_product_image" width="350">	
                    </div>		
                </div>	
            </div>	
            <div class="col-md-6">	
                <div class="p-3 right-side">	
                    <div class="d-flex justify-content-between align-items-center">	
                        <h3><?php echo htmlspecialchars( $product["desproduct"], ENT_COMPAT, 'UTF-8', FALSE ); ?></h3>	
                    </div>	
                    <div class="mt-2 pr-3 content">	
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliquaLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliquaLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliquaLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliquaLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliquaLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliquatempor incididunt ut labore et dolore magna aliqua Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua</p>	
                        <p>Categorias: <?php $counter1=-1;  if( isset($categories) && ( is_array($categories) || $categories instanceof Traversable ) && sizeof($categories) ) foreach( $categories as $key1 => $value1 ){ $counter1++; ?> <a href="/categories/<?php echo htmlspecialchars( $value1["idcategory"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo htmlspecialchars( $value1["descategory"], ENT_COMPAT, 'UTF-8', FALSE ); ?></a><?php } ?></p>
                    </div>	
                    <h3><?php echo formatPrice($product["vlprice"]); ?> €</h3>
                    <form action="/cart/<?php echo htmlspecialchars( $product["idproduct"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/add"	>
                    <div class="buttons d-flex flex-row mt-5 gap-3">	
                        <button type="submit" class="btn btn-outline-dark">Comprar</button>	
                    </div>	
                </form>
                </div>	
            </div>	
        </div>	
    </div> 
</div>
<style type="text/css">
body{background-color: #ecedee}.card{border: none;overflow: hidden}.thumbnail_images ul{list-style: none;justify-content: center;display: flex;align-items: center;margin-top:10px}.thumbnail_images ul li{margin: 5px;padding: 10px;border: 2px solid #eee;cursor: pointer;transition: all 0.5s}.thumbnail_images ul li:hover{border: 2px solid #000}.main_image{display: flex;justify-content: center;align-items: center;border-bottom: 1px solid #eee;height: 400px;width: 100%;overflow: hidden}.heart{height: 29px;width: 29px;background-color: #eaeaea;border-radius: 50%;display: flex;justify-content: center;align-items: center}.content p{font-size: 12px}.ratings span{font-size: 14px;margin-left: 12px}.colors{margin-top: 5px}.colors ul{list-style: none;display: flex;padding-left: 0px}.colors ul li{height: 20px;width: 20px;display: flex;border-radius: 50%;margin-right: 10px;cursor: pointer}.colors ul li:nth-child(1){background-color: #6c704d}.colors ul li:nth-child(2){background-color: #96918b}.colors ul li:nth-child(3){background-color: #68778e}.colors ul li:nth-child(4){background-color: #263f55}.colors ul li:nth-child(5){background-color: black}.right-side{position: relative}.search-option{position: absolute;background-color: #000;overflow: hidden;align-items: center;color: #fff;width: 200px;height: 200px;border-radius: 49% 51% 50% 50% / 68% 69% 31% 32%;left: 30%;bottom: -250px;transition: all 0.5s;cursor: pointer}.search-option .first-search{position: absolute;top: 20px;left: 90px;font-size: 20px;opacity: 1000}.search-option .inputs{opacity: 0;transition: all 0.5s ease;transition-delay: 0.5s;position: relative}.search-option .inputs input{position: absolute;top: 200px;left: 30px;padding-left: 20px;background-color: transparent;width: 300px;border: none;color: #fff;border-bottom: 1px solid #eee;transition: all 0.5s;z-index: 10}.search-option .inputs input:focus{box-shadow: none;outline: none;z-index: 10}.search-option:hover{border-radius: 0px;width: 100%;left: 0px}.search-option:hover .inputs{opacity: 1}.search-option:hover .first-search{left: 27px;top: 25px;font-size: 15px}.search-option:hover .inputs input{top: 20px}.search-option .share{position: absolute;right: 20px;top: 22px}.buttons .btn{height: 50px;width: 150px;border-radius: 0px !important}
</style>