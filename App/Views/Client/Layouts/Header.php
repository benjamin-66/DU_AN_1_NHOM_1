<?php

namespace App\Views\Client\Layouts;

use App\Helpers\AuthHelper;
use App\Views\BaseView;

class Header extends BaseView
{
    public static function render($data = null)
    {

?>
<!DOCTYPE html>
<html lang="vi" class="no-js">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="/public/assets/client/img/fav.png">
    <meta name="author" content="CodePixar">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta charset="UTF-8">
    <title>Dự Án 1</title>
    <link rel="stylesheet" href="/public/assets/client/css/linearicons.css">
    <link rel="stylesheet" href="/public/assets/client/css/font-awesome.min.css">
    <link rel="stylesheet" href="/public/assets/client/css/themify-icons.css">
    <link rel="stylesheet" href="/public/assets/client/css/bootstrap.css">
    <link rel="stylesheet" href="/public/assets/client/css/owl.carousel.css">
    <link rel="stylesheet" href="/public/assets/client/css/nice-select.css">
    <link rel="stylesheet" href="/public/assets/client/css/nouislider.min.css">
    <link rel="stylesheet" href="/public/assets/client/css/ion.rangeSlider.css" />
    <link rel="stylesheet" href="/public/assets/client/css/ion.rangeSlider.skinFlat.css" />
    <link rel="stylesheet" href="/public/assets/client/css/magnific-popup.css">
    <link rel="stylesheet" href="/public/assets/client/css/main.css">
</head>

<body>

    <!-- Start Header Area -->
    <header class="header_area sticky-header">
        <div class="main_menu">
            <nav class="navbar navbar-expand-lg navbar-light main_box">
                <div class="container">
                    <a class="navbar-brand logo_h" href="/"><img src="/public/assets/client/img/logo.png" alt=""></a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
                        <ul class="nav navbar-nav menu_nav ml-auto">
                            <li class="nav-item <?= ($_SERVER['REQUEST_URI'] == '/') ? 'active' : '' ?>">
                                <a class="nav-link" href="/">Trang Chủ</a>
                            </li>

                            <li class="nav-item submenu dropdown <?= (strpos($_SERVER['REQUEST_URI'], '/productsCategory') !== false || strpos($_SERVER['REQUEST_URI'], '/cart') !== false) ? 'active' : '' ?>">
                                <a href="javascript:void(0)" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                    Cửa Hàng
                                </a>
                                <ul class="dropdown-menu">
                                    <li class="nav-item"><a class="nav-link" href="/products">Sản Phẩm</a></li>
                                    <li class="nav-item"><a class="nav-link" href="/cart">Giỏ Hàng</a></li>
                                </ul>
                            </li>

                            <li class="nav-item <?= ($_SERVER['REQUEST_URI'] == '/post') ? 'active' : '' ?>">
                                <a class="nav-link" href="/post">Bài Viết</a>
                            </li>

                            <li class="nav-item submenu dropdown">
                                <a href="javascript:void(0)" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                    Trang
                                </a>
                                <ul class="dropdown-menu">
                                    <li class="nav-item"><a class="nav-link" href="/register">Đăng Ký </a></li>
                                    <li class="nav-item"><a class="nav-link" href="/login">Đăng Nhập </a></li>
                               
                                </ul>
                            </li>

                            <li class="nav-item <?= ($_SERVER['REQUEST_URI'] == '/contact') ? 'active' : '' ?>">
                                <a class="nav-link" href="/contact">Liên Hệ</a>
                            </li>
                        </ul>

                        <ul class="nav navbar-nav navbar-right">
                            <li class="nav-item"><a href="/cart" class="cart"><span class="ti-bag"></span></a></li>
                            <li class="nav-item">
                                <button class="search"><span class="lnr lnr-magnifier" id="search"></span></button>
                            </li>
                        </ul>
                    </div>

                    <div class="search_input" id="search_input_box">
                        <div class="container">
                            <form class="d-flex justify-content-between">
                                <input type="text" class="form-control" id="search_input" placeholder="Tìm Kiếm Ở Đây">
                                <button type="submit" class="btn"></button>
                                <span class="lnr lnr-cross" id="close_search" title="Đóng Tìm Kiếm"></span>
                            </form>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
    </header>
    <!-- End Header Area -->

<?php
    }
}
?>
