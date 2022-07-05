<?php if(!class_exists('Rain\Tpl')){exit;}?><?php if( checkLogin(false) ){ ?>

<meta http-equiv="refresh" content="0; URL=http://www.nerdware.com/logout" />
<?php }else{ ?>

<main>
    <section class="account-sign">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-12">
                    <div class="account-sign-in">
                        <h5 class="text-center">Entre na sua conta Nerdware!</h5>
                        <?php if( $error != '' ){ ?>

                        <div class="alert alert-danger">
                        <?php echo htmlspecialchars( $error, ENT_COMPAT, 'UTF-8', FALSE ); ?>

                        </div>
                        <?php } ?>

                        <form action="/login" id="login-form-wrap" class="login" method="post">
                            <div class="form__div">
                                <input type="text" id="login" name="login" class="form__input" placeholder=" ">
                                <label for="login" class="form__label">Email</label>
                            </div>
                            <div class="form__div mb-0">
                                <input type="password" id="senha" name="password" class="form__input" placeholder=" ">
                                <label for="senha" class="form__label">Palavra-Passe</label>
                            </div>
                            <div class="password-info d-flex align-items-center justify-content-between flex-wrap">
                                <div class="password-info-left">
                                    <input type="checkbox" id="showpass" class="mb-0" onclick="myFunction()">
                                    <label for="showpass" class="mb-0">Mostrar Palavra-Passe</label>
                                </div>
                            </div>
                            <div class="password-info-right">
                                <a href="forget-password.html">Esqueceu-se da palavra-passe?</a>
                            </div>
                            <br>
                            <input type="submit" value="Iniciar Sessão" class="btn bg-primary"></input>
                        </form>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12">
                    <div class="account-sign-up">
                        <h5 class="text-center">Ainda não tem conta? Registe-se agora.</h5>
                        <?php if( $errorRegister != '' ){ ?>

                        <div class="alert alert-danger">
                            <?php echo htmlspecialchars( $errorRegister, ENT_COMPAT, 'UTF-8', FALSE ); ?>

                        </div>
                        <?php } ?>

                        <form action="/register" class="register" method="post">
                            <div class="form__div">
                                <input id="nome" name="name" type="text" class="form__input" placeholder=" ">
                                <label for="nome" class="form__label">Nome Completo</label>
                            </div>
                            <div class="form__div">
                                <input name="email" id="email" type="email" class="form__input" placeholder=" ">
                                <label for="email" class="form__label">Email</label>
                            </div>
                            <div class="form__div">
                                <input type="text" id="phone" name="phone" class="form__input" placeholder=" ">
                                <label for="phone" class="form__label">Telefone</label>
                            </div>
                            <div class="form__div mb-0">
                                <input type="password" id="senha1" name="password" class="form__input" placeholder=" ">
                                <label for="senha" class="form__label">Palavra-Passe</label>
                            </div>
                            <div class="password-info-show">
                                <input type="checkbox" id="showpass" class="mb-0" onclick="funcao()">
                                <label for="showpass" class="mb-0">Mostrar Palavra-Passe</label>
                            </div>
                            <input type="submit" value="Criar Conta" name="login" class="btn bg-primary">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
<?php } ?>

                        
<script>
    function myFunction() {
  var x = document.getElementById("senha");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
</script>

<script>
    function funcao() {
  var x = document.getElementById("senha1");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
</script>