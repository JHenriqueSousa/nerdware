<?php if(!class_exists('Rain\Tpl')){exit;}?><!-- Footer -->
<footer>
    <div class="container">
        <div class="row main-footer">
            <div class="col-lg-4 col-md-12 col-sm-12 col-12">
                <div class="main-footer-info">
                    <img src="res/site/dist/images/logo/white.png" alt="Logo" class="img-fluid">
                    <p>
                    A Nerdware é uma loja que atua no mercado de tecnologia, buscando sempre a excelência no que faz.  Com os melhores produtos das linhas de:
                    Smartphones, Periféricos e Eletrônicos com excelência e com as melhores marcas do mercado.
                    </p>
                </div>
            </div>
            <div class="col-lg-2 offset-lg-2 col-md-4 col-sm-6 col-12">
                <div class="main-footer-quicklinks">
                    <h6>Nerdware</h6>
                    <ul class="quicklink">
                        <li><a href="#">Código Aberto</a></li>
                        <li><a href="#">Ajuda &amp; Suporte</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-2 col-md-4 col-sm-6 col-12">
                <div class="main-footer-quicklinks">
                    <h6>Acesso Rápido</h6>
                    <ul class="quicklink">
                        <li><a href="#">Produtos</a></li>
                        <li><a href="#">Novidades</a></li>
                        <li><a href="#">Carrinho</a></li>
                        <?php if( checkLogin(false) ){ ?>

                        <li><a href="#">A Minha Conta</a></li>
                        <li><a href="/logout">Terminar Sessão</a></li>
                        <?php }else{ ?>

                        <li><a href="#">Iniciar &amp; Criar Sessão</a></li>
                        <?php } ?>

                    </ul>
                </div>
            </div>
            <div class="col-lg-2 col-md-4 col-sm-6 col-12">
                <div class="main-footer-quicklinks">
                    <h6>Categorias</h6>
                    <ul class="quicklink">
                        <?php require $this->checkTemplate("categories-menu");?>

                    </ul>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="copyright d-flex justify-content-between align-items-center">
                    <div class="copyright-text order-2 order-lg-1">
                        <p>&copy; 2022. Desenvolvido por <a href="#">João Henrique Sousa</a></p>
                    </div>
                    <div class="copyright-links order-1 order-lg-2">
                        <a href="https://github.com/JHenriqueSousa" class="ml-0"><i class="fab fa-github"></i></a>
                        <a href="https://twitter.com/JHenriqueSousaa"><i class="fab fa-twitter"></i></a>
                        <a href="https://www.linkedin.com/in/JHenriqueSousa"><i class="fab fa-linkedin"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- Footer -->

<script src="/res/site/src/js/jquery.min.js"></script>
<script src="/res/site/src/js/bootstrap.min.js"></script>
<script src="/res/site/src/scss/vendors/plugin/js/slick.min.js"></script>
<script src="/res/site/src/scss/vendors/plugin/js/jquery.nice-select.min.js"></script>
<script src="/res/site/dist/main.js"></script>
<script>
    function openNav() {

        document.getElementById("mySidenav").style.width = "350px";
        $('#overlayy').addClass("active");
    }

    function closeNav() {
        document.getElementById("mySidenav").style.width = "0";
        $('#overlayy').removeClass("active");
    }
</script>
</body>
