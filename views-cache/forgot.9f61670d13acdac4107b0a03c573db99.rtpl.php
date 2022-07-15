<?php if(!class_exists('Rain\Tpl')){exit;}?>

<body>
    <!-- Header Area Start -->
    
    <!-- Header Area End -->

    <main>
        <!-- Forget Password Start -->
        <section class="forget-password">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="account-sign-in">
                            <h5 class="text-center modi-sm">Esqueceu-se da palavra-passe?</h5>
                            <form id="login-form-wrap" class="login" method="post" action="/forgot">
                                <div class="form__div">
                                    <input id="email" name="email" type="email" class="form__input" placeholder=" ">
                                    <label for="email" class="form__label">Email</label>
                                </div>
                                <input type="submit" value="Recuperar" name="login" class="btn bg-primary">
                            </form>
                            <div class="ask-signup text-center">
                                <a href="/login" class="mr-1" style="color:#989BA7;">Não tens conta?</a>
                                <a href="/login">Cria uma.</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Forget Password End -->
    </main>

    
