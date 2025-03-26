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
<html lang="zxx" class="no-js">

<head>
	<!-- Mobile Specific Meta -->
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- Favicon-->
	<link rel="shortcut icon" href="/public/assets/client/img/fav.png">
	<!-- Author Meta -->
	<meta name="author" content="CodePixar">
	<!-- Meta Description -->
	<meta name="description" content="">
	<!-- Meta Keyword -->
	<meta name="keywords" content="">
	<!-- meta character set -->
	<meta charset="UTF-8">
	<!-- Site Title -->
	<title>Du An 1</title>
	<!--
		CSS
		============================================= -->
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
					<!-- Brand and toggle get grouped for better mobile display -->
					<a class="navbar-brand logo_h" href="/"><img src="/public/assets/client/img/logo.png" alt=""></a>
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
					 aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<!-- Collect the nav links, forms, and other content for toggling -->
					<div class="collapse navbar-collapse offset" id="navbarSupportedContent">
						<ul class="nav navbar-nav menu_nav ml-auto">
							<li class="nav-item active"><a class="nav-link" href="/">Trang Chủ </a></li>
							<li class="nav-item submenu dropdown">
								<a href="productsCategory" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
								 aria-expanded="false">Cửa Hàng </a>
								<ul class="dropdown-menu">
									<li class="nav-item"><a class="nav-link" href="productsCategory">Sản Phẩm  </a></li>
									
									<li class="nav-item"><a class="nav-link" href="cart">Shopping Cart</a></li>
									<li class="nav-item"><a class="nav-link" href="confirmation.html">Confirmation</a></li>
								</ul>
							</li>
							<li class="nav-item active"><a class="nav-link" href="post">Bài Viết </a></li>
								<ul class="dropdown-menu">
									<!-- <li class="nav-item"><a class="nav-link" href="post">Blog</a></li> -->
									<!-- <li class="nav-item"><a class="nav-link" href="single-blog.html">Blog Details</a></li> -->
								</ul>
							</li>
							<li class="nav-item submenu dropdown">
								<a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
								 aria-expanded="false">Pages</a>
								<ul class="dropdown-menu">
									<li class="nav-item"><a class="nav-link" href="/login">Đăng Nhập </a></li>
									<li class="nav-item"><a class="nav-link" href="tracking.html">Tracking</a></li>
									<li class="nav-item"><a class="nav-link" href="elements.html">Elements</a></li>
								</ul>
							</li>
							<li class="nav-item"><a class="nav-link" href="contact.html">Contact</a></li>
						</ul>
						<ul class="nav navbar-nav navbar-right">
							<li class="nav-item"><a href="#" class="cart"><span class="ti-bag"></span></a></li>
							<li class="nav-item">
								<button class="search"><span class="lnr lnr-magnifier" id="search"></span></button>
							</li>
						</ul>
					</div>
				</div>
			</nav>
		</div>
		<div class="search_input" id="search_input_box">
			<div class="container">
				<form class="d-flex justify-content-between">
					<input type="text" class="form-control" id="search_input" placeholder="Search Here">
					<button type="submit" class="btn"></button>
					<span class="lnr lnr-cross" id="close_search" title="Close Search"></span>
				</form>
			</div>
		</div>
	</header>
	<!-- End Header Area -->





    <?php

    }
}

    ?>