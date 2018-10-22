<!DOCTYPE html>
<html lang="en">
<head>
	<title>Fashe</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="public/user/images/icons/favicon.png"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="public/user/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="public/user/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="public/user/fonts/themify/themify-icons.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="public/user/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="public/user/fonts/elegant-font/html-css/style.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="public/user/vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="public/user/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="public/user/vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="public/user/vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="public/user/vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="public/user/vendor/slick/slick.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="public/user/vendor/lightbox2/css/lightbox.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="public/user/vendor/Carousel/owl.carousel.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
	<link rel="stylesheet" type="text/css" href="public/user/css/util.css">
	<link rel="stylesheet" type="text/css" href="public/user/css/main.css">
<!--===============================================================================================-->
</head>
<body class="animsition">
	<div id="fb-root"></div>
	<script>(function(d, s, id) {
	  var js, fjs = d.getElementsByTagName(s)[0];
	  if (d.getElementById(id)) return;
	  js = d.createElement(s); js.id = id;
	  js.src = 'https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v3.1';
	  fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));</script>

		<!-- Load Facebook SDK for JavaScript -->
			<div id="fb-root"></div>
			<script>(function(d, s, id) {
			  var js, fjs = d.getElementsByTagName(s)[0];
			  if (d.getElementById(id)) return;
			  js = d.createElement(s); js.id = id;
			  js.src = 'https://connect.facebook.net/vi_VN/sdk/xfbml.customerchat.js#xfbml=1&version=v2.12&autoLogAppEvents=1';
			  fjs.parentNode.insertBefore(js, fjs);
			}(document, 'script', 'facebook-jssdk'));</script>

			<!-- Your customer chat code -->
			<div class="fb-customerchat"
			  attribution=setup_tool
			  page_id="250165732354999"
			  theme_color="#ff5ca1"
			  logged_in_greeting="Hi ! How can we help you?"
			  logged_out_greeting="Hi ! How can we help you?">
			</div>
	<!-- Header -->
	<header class="header1">
		<!-- Header desktop -->
		<div class="container-menu-header">
			
			<div class="wrap_header">
				<!-- Logo -->
				<a href="?" class="logo">
					<img src="public/user/images/icons/logo.png" alt="IMG-LOGO">
					<p style="color: red">Luôn đi đầu về chất lượng</p>
				</a>

				<!-- Menu -->
				<div class="wrap_menu">
					<nav class="menu">
						<ul class="main_menu">
							<li>
								<a href="?">Trang chủ</a>
							</li>

							<li>
								<a href="?mod=index&act=product&LSP=1">Điện thoại</a>
								<ul class="sub_menu">
									<li><a href="?mod=index&act=product&LSP=1&NSX=1">Iphone</a></li>
									<li><a href="?mod=index&act=product&LSP=1&NSX=2">Samsung</a></li>
									<li><a href="?mod=index&act=product&LSP=1&NSX=3">Oppo</a></li>
									<li><a href="?mod=index&act=product&LSP=1&NSX=4">Xiaomi</a></li>
								</ul>
							</li>

							<li>
								<a href="?mod=index&act=product&LSP=2">Máy tính bảng</a>
								<ul class="sub_menu">
									<li><a href="?mod=index&act=product&LSP=2&NSX=1">Ipad</a></li>
									<li><a href="?mod=index&act=product&LSP=2&NSX=2">Samsung Galaxy Tab</a></li>
								</ul>
							</li>
							<li>
								<a href="?mod=index&act=about">Giới thiệu</a>
							</li>

							<li>
								<a href="?mod=index&act=contact">Liên hệ</a>
							</li>
						</ul>
					</nav>
				</div>

				<!-- Header Icon -->
				<div class="header-icons">
					<a href="?mod=login&act=form" class="header-wrapicon1 dis-block" title="Chỉ dành cho nhân viên">
						Đăng nhập
					</a>

					<span class="linedivide1"></span>

					<div class="header-wrapicon2">
						<img src="public/user/images/icons/icon-header-02.png" class="header-icon1 js-show-header-dropdown" alt="ICON">
						<span class="header-icons-noti"><?php echo (!empty($cart))? count($cart) : 0;?></span>

						<!-- Header cart noti -->
						<div class="header-cart header-dropdown">
							<ul class="header-cart-wrapitem">
								<?php 
									if (!empty($cart)) {
										$tong =0;
										foreach ($cart as $valuecart) {
											$tong += $valuecart['SO_LUONG']*$valuecart['GIA_BAN'] - ($valuecart['SO_LUONG']*$valuecart['GIA_BAN']*$valuecart['khuyen_mai'])/100;
								?>
									<li class="header-cart-item">
										<div class="header-cart-item-img">
											<img src="public/user/images/uploads/<?=$valuecart['ANH2']?>" alt="IMG">
										</div>

										<div class="header-cart-item-txt">
											<a href="#" class="header-cart-item-name">
												<b><?=$valuecart['TEN_SP']?></b>
											</a>

											<span class="header-cart-item-info">
												<?php 
													echo $valuecart['SO_LUONG']." x ".number_format($valuecart['GIA_BAN']);
												 ?>
											</span>
										</div>
									</li>
								<?php
										}
									}else{
										echo "<center><h2>Giỏ hàng trống</h2></center>";
									}
								 ?>
							</ul>

							<div class="header-cart-total">
								<?php 
									if (isset($tong)) {
										echo "Total: ".number_format($tong)." VNĐ";
									}
								 ?>
							</div>

							<div class="header-cart-buttons">
								<div class="header-cart-wrapbtn">
									<!-- Button -->
									<a href="?mod=index&act=cart" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
										View Cart
									</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- Header Mobile -->
		<div class="wrap_header_mobile">
			<!-- Logo moblie -->
			<a href="?" class="logo-mobile">
				<img src="public/user/images/icons/logo.png" alt="IMG-LOGO">
			</a>

			<!-- Button show menu -->
			<div class="btn-show-menu">
				<!-- Header Icon mobile -->
				<div class="header-icons-mobile">
					<a href="#" class="header-wrapicon1 dis-block">
						<img src="public/user/images/icons/icon-header-01.png" class="header-icon1" alt="ICON">
					</a>

					<span class="linedivide2"></span>

					<div class="header-wrapicon2">
						<img src="public/user/images/icons/icon-header-02.png" class="header-icon1 js-show-header-dropdown" alt="ICON">
						<span class="header-icons-noti"><?php $v =(!empty($cart))? count($cart) : 0; echo $v;?></span>

						<!-- Header cart noti -->
						<div class="header-cart header-dropdown">
							<ul class="header-cart-wrapitem">
								<?php 
									if (!empty($cart)) {
										$tong =0;
										foreach ($cart as $valuecart) {
											$tong += $valuecart['SO_LUONG']*$valuecart['GIA_BAN'];
								?>
									<li class="header-cart-item">
										<div class="header-cart-item-img">
											<img src="public/user/images/uploads/<?=$valuecart['ANH2']?>" alt="IMG">
										</div>

										<div class="header-cart-item-txt">
											<a href="#" class="header-cart-item-name">
												<b><?=$valuecart['TEN_SP']?></b>
											</a>

											<span class="header-cart-item-info">
												<?php 
													echo $valuecart['SO_LUONG']." x ".number_format($valuecart['GIA_BAN']);
												 ?>
											</span>
										</div>
									</li>
								<?php
										}
									}else{
										echo "<center><h2>Giỏ hàng trống</h2></center>";
									}
								 ?>
							</ul>

							<div class="header-cart-total">
								<?php 
									if (isset($tong)) {
										echo "Total: ".number_format($tong)." VNĐ";
									}
								 ?>
							</div>

							<div class="header-cart-buttons">
								<div class="header-cart-wrapbtn">
									<!-- Button -->
									<a href="?mod=index&act=cart" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
										View Cart
									</a>
								</div>

								<?php 
									if (!empty($cart)) {
								?>
									<div class="header-cart-wrapbtn">
									<!-- Button -->
									<button data-toggle="modal" data-target="#checkout1" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
										Check Out
									</button>
								</div>
								<?php
									}
								 ?>
							</div>
						</div>
					</div>
				</div>

				<div class="btn-show-menu-mobile hamburger hamburger--squeeze">
					<span class="hamburger-box">
						<span class="hamburger-inner"></span>
					</span>
				</div>
			</div>
		</div>

		<!-- Menu Mobile -->
		<div class="wrap-side-menu" >
			<nav class="side-menu">
				<ul class="main-menu">
					<li class="item-topbar-mobile p-l-20 p-t-8 p-b-8">
						<span class="topbar-child1">
							Free shipping for standard order over $100
						</span>
					</li>

					<li class="item-topbar-mobile p-l-20 p-t-8 p-b-8">
						<div class="topbar-child2-mobile">
							<span class="topbar-email">
								fashe@example.com
							</span>

							<div class="topbar-language rs1-select2">
								<select class="selection-1" name="time">
									<option>USD</option>
									<option>EUR</option>
								</select>
							</div>
						</div>
					</li>

					<li class="item-topbar-mobile p-l-10">
						<div class="topbar-social-mobile">
							<a href="#" class="topbar-social-item fa fa-facebook"></a>
							<a href="#" class="topbar-social-item fa fa-instagram"></a>
							<a href="#" class="topbar-social-item fa fa-pinterest-p"></a>
							<a href="#" class="topbar-social-item fa fa-snapchat-ghost"></a>
							<a href="#" class="topbar-social-item fa fa-youtube-play"></a>
						</div>
					</li>

					<li class="item-menu-mobile">
						<a href="?">Trang chủ</a>
						<ul class="sub-menu">
							<li><a href="?">Homepage V1</a></li>
							<li><a href="home-02.html">Homepage V2</a></li>
							<li><a href="home-03.html">Homepage V3</a></li>
						</ul>
						<i class="arrow-main-menu fa fa-angle-right" aria-hidden="true"></i>
					</li>

					<li class="item-menu-mobile">
						<a href="?mod=index&act=product">Điện thoại</a>
					</li>

					<li class="item-menu-mobile">
						<a href="?mod=index&act=product">Máy tính bảng</a>
					</li>

					<li class="item-menu-mobile">
						<a href="?mod=index&act=cart">Features</a>
					</li>

					<li class="item-menu-mobile">
						<a href="?mod=index&act=blog">Blog</a>
					</li>

					<li class="item-menu-mobile">
						<a href="?mod=index&act=about">Giới thiệu</a>
					</li>

					<li class="item-menu-mobile">
						<a href="?mod=index&act=contact">Liên hệ</a>
					</li>
				</ul>
			</nav>
		</div>
	</header>