<?php if(!class_exists('Rain\Tpl')){exit;}?><body>
    <main>
        <!-- Breadcrumb Area Start -->
        <section class="breadcrumb-area mt-15">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/">Início</a></li>
                                <li class="breadcrumb-item active" aria-current="page">A Minha Conta</li>
                            </ol>
                        </nav>
                        <h5>Conta</h5>
                    </div>
                </div>
            </div>
        </section>
        <!-- Breadcrumb Area End -->

        <!--Acount Area Start -->
        <section class="account">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <!-- Dashboard-Nav  Start-->
                        <div class="dashboard-nav">
                            <ul class="list-inline">
                                <?php if( checkLogin(false) ){ ?>

                                <li class="list-inline-item"><a href="/user-dashboard" class="active">A Minha Conta</a></li>
                                <li class="list-inline-item"><a href="/cart">Carrinho</a></li>
                                <li class="list-inline-item"><a href="/logout" class="mr-0">Terminar Sessão</a></li>
                                <?php }else{ ?>

                                <li class="list-inline-item"><a href="/cart" class="active">Carrinho</a></li>
                                <li class="list-inline-item"><a href="/login">Iniciar Sessão</a></li>
                                <?php } ?>

                            </ul>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <?php if( $error != '' ){ ?>

                        <div class="alert alert-danger">
                        <?php echo htmlspecialchars( $error, ENT_COMPAT, 'UTF-8', FALSE ); ?>

                        </div>
                        <?php } ?>

                        <?php if( $success != '' ){ ?>

                        <div class="alert alert-success">
                        <?php echo htmlspecialchars( $success, ENT_COMPAT, 'UTF-8', FALSE ); ?>

                        </div>
                        <?php } ?>

                    </div>
                    <div class="col-lg-6 col-md-12">
                        <div class="account-setting">
                            <h6>Alterar Informações de Conta</h6>
                            <form method="post" action="/user-dashboard">
                                <div class="form__div">
                                    <input id="desperson" name="desperson" type="text" class="form__input" value="<?php echo htmlspecialchars( $user["desperson"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                                    <label for="desperson" class="form__label">Nome</label>
                                </div>
                                <div class="form__div">
                                    <input type="email" class="form__input" id="desemail" name="desemail" value="<?php echo htmlspecialchars( $user["desemail"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                                    <label for="desemail" class="form__label">E-mail</label>
                                </div>
                                <div class="form__div">
                                    <input type="tel" class="form__input" id="nrphone" name="nrphone" value="<?php echo htmlspecialchars( $user["nrphone"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                                    <label for="nrphone" class="form__label">Telefone</label>
                                </div>
                                <button type="submit" class="btn bg-primary">Guardar</button>
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12">
                        <div class="change-password">
                            <h6>Alterar Palavra-Passe</h6>
                            <form action="/user-dashboard/change-password" method="post">
                                <div class="form__div">
                                    <input id="current_pass" name="current_pass" type="password" class="form__input">
                                    <label for="current_pass" class="form__label">Palavra-Passe Atual</label>
                                </div>
                                <div class="form__div">
                                    <input id="new_pass" name="new_pass" type="password" class="form__input">
                                    <label for="new_pass" class="form__label">Nova Palavra-Passe</label>
                                </div>
                                <div class="form__div">
                                    <input type="password" class="form__input" id="new_pass_confirm" name="new_pass_confirm">
                                    <label for="new_pass_confirm" class="form__label">Confirmar A Nova Palavra-Passe</label>
                                </div>
                                <button type="submit" class="btn bg-primary">Guardar</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--Acount Area End -->

    </main>
    <!-- Footer -->


    <script src="src/js/jquery.min.js"></script>
    <script src="src/js/bootstrap.min.js"></script>
    <script src="src/scss/vendors/plugin/js/jquery.nice-select.min.js"></script>
    <script src="dist/main.js"></script>
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
