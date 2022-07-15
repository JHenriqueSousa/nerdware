<?php if(!class_exists('Rain\Tpl')){exit;}?><!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Nerdware | A sua loja de tecnologia que disponibiliza uma vasta gama de produtos informáticos.</title>
    <link rel="stylesheet" href="/res/site/dist/main.css">
</head>

<body>
    <!-- Header Area Start -->
    <header class="header">
        <div class="header-bottom">
            <div class="container">
                <div class="d-none d-lg-block">
                    <nav class="menu-area d-flex align-items-center">
                        <div class="logo">
                            <a href="/"><img src="/res/site/dist/images/logo/Untitled3.png" alt="logo" /></a>
                        </div>
                        <ul class="main-menu d-flex align-items-center">
                            <li><a class="active" href="/">Início</a></li>
                            <li>
                                <a href="javascript:void(0)">Categorias
                                    <svg xmlns="http://www.w3.org/2000/svg" width="9.98" height="5.69"
                                        viewBox="0 0 9.98 5.69">
                                        <g id="Arrow" transform="translate(0.99 0.99)">
                                            <path id="Arrow-2" data-name="Arrow" d="M1474.286,26.4l4,4,4-4"
                                                transform="translate(-1474.286 -26.4)" fill="none" stroke="#1a2224"
                                                stroke-linecap="round" stroke-linejoin="round" stroke-width="1.4" />
                                        </g>
                                    </svg>
                                </a>
                                <ul class="sub-menu">
                                    <?php require $this->checkTemplate("categories-menu");?>

                                </ul>
                            </li>
                        </ul>
                        <div class="menu-icon ml-auto">
                            <ul>
                                <li>
                                    <a href="/cart"><svg xmlns="http://www.w3.org/2000/svg" width="22" height="22"
                                            viewBox="0 0 22 22">
                                            <g id="Icon" transform="translate(-1524 -89)">
                                                <ellipse id="Ellipse_2" data-name="Ellipse 2" cx="0.909" cy="0.952"
                                                    rx="0.909" ry="0.952" transform="translate(1531.364 108.095)"
                                                    fill="none" stroke="#1a2224" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="2" />
                                                <ellipse id="Ellipse_3" data-name="Ellipse 3" cx="0.909" cy="0.952"
                                                    rx="0.909" ry="0.952" transform="translate(1541.364 108.095)"
                                                    fill="none" stroke="#1a2224" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="2" />
                                                <path id="Path_3" data-name="Path 3"
                                                    d="M1,1H4.636L7.073,13.752a1.84,1.84,0,0,0,1.818,1.533h8.836a1.84,1.84,0,0,0,1.818-1.533L21,5.762H5.545"
                                                    transform="translate(1524 89)" fill="none" stroke="#1a2224"
                                                    stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                                            </g>
                                        </svg>
                                        <span class="cart"><?php echo getCartNrQtd(); ?></span>
                                    </a>
                                </li>
                                <?php if( checkLogin(false) ){ ?>

                                <li>
                                    <a href="/user-dashboard"><svg xmlns="http://www.w3.org/2000/svg" width="18"
                                            height="20" viewBox="0 0 18 20">
                                            <g id="Account" transform="translate(1 1)">
                                                <path id="Path_86" data-name="Path 86"
                                                    d="M20,21V19a4,4,0,0,0-4-4H8a4,4,0,0,0-4,4v2"
                                                    transform="translate(-4 -3)" fill="none" stroke="#000"
                                                    stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                                                <circle id="Ellipse_9" data-name="Ellipse 9" cx="4" cy="4" r="4"
                                                    transform="translate(4)" fill="#fff" stroke="#000"
                                                    stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                                            </g>
                                        </svg></a>
                                </li>
                                <?php }else{ ?>

                                <li>
                                    <a href="/login"><svg xmlns="http://www.w3.org/2000/svg" width="18"
                                            height="20" viewBox="0 0 18 20">
                                            <g id="Account" transform="translate(1 1)">
                                                <path id="Path_86" data-name="Path 86"
                                                    d="M20,21V19a4,4,0,0,0-4-4H8a4,4,0,0,0-4,4v2"
                                                    transform="translate(-4 -3)" fill="none" stroke="#000"
                                                    stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                                                <circle id="Ellipse_9" data-name="Ellipse 9" cx="4" cy="4" r="4"
                                                    transform="translate(4)" fill="#fff" stroke="#000"
                                                    stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                                            </g>
                                        </svg></a>
                                </li>
                                <?php } ?>

                            </ul>
                        </div>
                    </nav>
                </div>
                <!-- Mobile Menu -->
                <aside class="d-lg-none">
                    <div id="mySidenav" class="sidenav">
                        <div class="close-mobile-menu">
                            <a href="javascript:void(0)" id="menu-close" class="closebtn"
                                onclick="closeNav()">&times;</a>
                        </div>
                        <li><a href="/">Início</a></li>
                        <li>
                            <a href="javascript:void(0)">Categorias
                                <svg xmlns="http://www.w3.org/2000/svg" width="9.98" height="5.69"
                                    viewBox="0 0 9.98 5.69">
                                    <g id="Arrow" transform="translate(0.99 0.99)">
                                        <path id="Arrow-2" data-name="Arrow" d="M1474.286,26.4l4,4,4-4"
                                            transform="translate(-1474.286 -26.4)" fill="none" stroke="#1a2224"
                                            stroke-linecap="round" stroke-linejoin="round" stroke-width="1.4" />
                                    </g>
                                </svg>
                            </a>
                            <ul class="sub-menu">
                                <?php require $this->checkTemplate("categories-menu");?>

                            </ul>
                        </li>
                    </div>
                    <div class="mobile-nav d-flex align-items-center justify-content-between">
                        <div class="logo">
                            <a href="/"><img src="/res/site/dist/images/logo/Untitled3.png" alt="logo" /></a>
                        </div>
                        <div class="search-bar">
                            <input type="text" placeholder="Search for product...">
                            <div class="icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20.414" height="20.414"
                                    viewBox="0 0 20.414 20.414">
                                    <g id="Search_Icon" data-name="Search Icon" transform="translate(1 1)">
                                        <ellipse id="Ellipse_1" data-name="Ellipse 1" cx="8.158" cy="8" rx="8.158"
                                            ry="8" fill="none" stroke="#1a2224" stroke-linecap="round"
                                            stroke-linejoin="round" stroke-width="2" />
                                        <line id="Line_4" data-name="Line 4" x1="3.569" y1="3.5"
                                            transform="translate(14.431 14.5)" fill="none" stroke="#1a2224"
                                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                                    </g>
                                </svg>
                            </div>
                        </div>
                        <div class="menu-icon">
                            <ul>
                                <li>
                                    <a href="/cart">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22"
                                            viewBox="0 0 22 22">
                                            <g id="Icon" transform="translate(-1524 -89)">
                                                <ellipse id="Ellipse_2" data-name="Ellipse 2" cx="0.909" cy="0.952"
                                                    rx="0.909" ry="0.952" transform="translate(1531.364 108.095)"
                                                    fill="none" stroke="#1a2224" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="2" />
                                                <ellipse id="Ellipse_3" data-name="Ellipse 3" cx="0.909" cy="0.952"
                                                    rx="0.909" ry="0.952" transform="translate(1541.364 108.095)"
                                                    fill="none" stroke="#1a2224" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="2" />
                                                <path id="Path_3" data-name="Path 3"
                                                    d="M1,1H4.636L7.073,13.752a1.84,1.84,0,0,0,1.818,1.533h8.836a1.84,1.84,0,0,0,1.818-1.533L21,5.762H5.545"
                                                    transform="translate(1524 89)" fill="none" stroke="#1a2224"
                                                    stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                                            </g>
                                        </svg>
                                        <span class="cart"><?php echo getCartNrQtd(); ?></span>
                                    </a>
                                </li>
                                <?php if( checkLogin(false) ){ ?>

                                <li>
                                    <a href="/user-dashboard">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="20"
                                            viewBox="0 0 18 20">
                                            <g id="Account" transform="translate(1 1)">
                                                <path id="Path_86" data-name="Path 86"
                                                    d="M20,21V19a4,4,0,0,0-4-4H8a4,4,0,0,0-4,4v2"
                                                    transform="translate(-4 -3)" fill="none" stroke="#000"
                                                    stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                                                <circle id="Ellipse_9" data-name="Ellipse 9" cx="4" cy="4" r="4"
                                                    transform="translate(4)" fill="#fff" stroke="#000"
                                                    stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                                            </g>
                                        </svg>
                                    </a>
                                </li>
                                <?php }else{ ?>

                                <li>
                                    <a href="/login">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="20"
                                            viewBox="0 0 18 20">
                                            <g id="Account" transform="translate(1 1)">
                                                <path id="Path_86" data-name="Path 86"
                                                    d="M20,21V19a4,4,0,0,0-4-4H8a4,4,0,0,0-4,4v2"
                                                    transform="translate(-4 -3)" fill="none" stroke="#000"
                                                    stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                                                <circle id="Ellipse_9" data-name="Ellipse 9" cx="4" cy="4" r="4"
                                                    transform="translate(4)" fill="#fff" stroke="#000"
                                                    stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                                            </g>
                                        </svg>
                                    </a>
                                </li>
                                <?php } ?>

                            </ul>
                        </div>
                        <div class="hamburger-menu">
                            <a style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776;</a>
                        </div>
                    </div>
                </aside>
                <!-- Body overlay -->
                <div class="overlay" id="overlayy"></div>
            </div>
        </div>
    </header>
    <!-- Header Area End -->