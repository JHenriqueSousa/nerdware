<?php if(!class_exists('Rain\Tpl')){exit;}?>

    <main>
        <!-- Forget Password Start -->
        <section class="forget-password">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="account-sign-in">
                            <h2>Olá <?php echo htmlspecialchars( $name, ENT_COMPAT, 'UTF-8', FALSE ); ?>, escreva uma nova palavra-passe:</h2>
                            <br>
                            <form id="login-form-wrap" class="login" method="post" action="/forgot/reset">
                                <input type="hidden" name="code" value="<?php echo htmlspecialchars( $code, ENT_COMPAT, 'UTF-8', FALSE ); ?>">
                                <div class="form__div">
                                    <input type="password" id="password" name="password" class="form__input" placeholder=" ">
                                    <label for="password" class="form__label">Nova palavra-passe</label>
                                </div>
                                <input type="submit" value="Recuperar" name="login" class="btn bg-primary">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Forget Password End -->
    </main>

    
