<?php if(!class_exists('Rain\Tpl')){exit;}?><!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Nerdware | A sua loja de tecnologia que disponibiliza uma vasta gama de produtos e serviços informáticos.</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="/res/site/css/styles.css" rel="stylesheet" />
    </head>
    <body>
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container px-4 px-lg-5">
                <a class="navbar-brand" href="/">Nerdware</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                        <li class="nav-item"><a class="nav-link" aria-current="page" href="/">Início</a></li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Loja</a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item">Categorias</a></li>
                                <li><hr class="dropdown-divider" /></li>
                                <?php require $this->checkTemplate("categories-menu");?>

                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Desenvolvedor</a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item">João Sousa</a></li>
                                <li><hr class="dropdown-divider" /></li>
                                <li><a class="dropdown-item" href="https://github.com/JHenriqueSousa" target="_blank">GitHub</a></li>
                                <li><a class="dropdown-item" href="https://twitter.com/JHenriqueSousaa" target="_blank">Twitter</a></li>
                                <li><a class="dropdown-item" href="https://www.linkedin.com/in/JHenriqueSousa/" target="_blank">LinkedIn</a></li>
                                <li><a class="dropdown-item" href="mailto:nerdware@jhenriquesousa.com" target="_blank">E-mail</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Conta</a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <?php if( checkLogin(false) ){ ?>

                                <li><a class="dropdown-item"><?php echo getUserName(); ?></a></li>
                                <li><hr class="dropdown-divider" /></li>
                                <li><a class="dropdown-item" href="/logout">Sair</a></li>
                                <?php }else{ ?>

                                <li><a class="dropdown-item" href="/login">Entrar</a></li>
                                <?php } ?>

                            </ul>
                        </li>
                        <li class="nav-item"><a class="nav-link" aria-current="page" href="/teste">Teste</a></li>
                    </ul>
                    <form action="/cart" class="d-flex">
                        <button class="btn btn-outline-dark" type="submit">
                            <i class="bi-cart-fill me-1"></i>
                            Carrinho
                            <span class="badge bg-dark text-white ms-1 rounded-pill"><?php echo getCartNrQtd(); ?></span>
                        </button>
                    </form>
                </div>
            </div>
        </nav>