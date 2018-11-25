<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js">
<!--<![endif]-->


<!-- Mirrored from webdesign-finder.com/html/canabia/shop-left.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 18 Nov 2018 18:21:34 GMT -->
<head>
	<title>Canabia</title>
	<meta charset="utf-8">
	<!--[if IE]>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<![endif]-->
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
	<!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
	<link rel="stylesheet" href="/css/bootstrap.min.css">
	<link rel="stylesheet" href="/css/animations.css">
	<link rel="stylesheet" href="/css/fonts.css">
	<link rel="stylesheet" href="/css/main.css" class="color-switcher-link">
	<link rel="stylesheet" href="/css/shop.css" class="color-switcher-link">
	<script src="/js/vendor/modernizr-2.6.2.min.js"></script>
	<!--[if lt IE 9]>
		<script src="js/vendor/html5shiv.min.js"></script>
		<script src="js/vendor/respond.min.js"></script>
		<script src="js/vendor/jquery-1.12.4.min.js"></script>
	<![endif]-->
</head>

<body >
	<!--[if lt IE 9]>
		<div class="bg-danger text-center">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/" class="highlight">upgrade your browser</a> to improve your experience.</div>
	<![endif]-->
	<div class="preloader">
		<div class="preloader_image"></div>
	</div>
	<!-- search modal -->
	<div class="modal" tabindex="-1" role="dialog" aria-labelledby="search_modal" id="search_modal"> <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		<span aria-hidden="true">
			<i class="rt-icon2-cross2"></i>
		</span>
	</button>
		<div class="widget widget_search">
			<form method="get" class="searchform search-form form-inline" action="http://webdesign-finder.com/html/canabia/">
				<div class="form-group bottommargin_0"> <input type="text" value="" name="search" class="form-control" placeholder="Search keyword" id="modal-search-input"> </div> <button type="submit" class="theme_button no_bg_button">Search</button> </form>
		</div>
	</div>
	<!-- Unyson messages modal -->
	<div class="modal fade" tabindex="-1" role="dialog" id="messages_modal">
		<div class="fw-messages-wrap ls with_padding">
			<!-- Uncomment this UL with LI to show messages in modal popup to your user: -->
			<!--
		<ul class="list-unstyled">
			<li>Message To User</li>
		</ul>
		-->
		</div>
	</div>
	<!-- eof .modal -->
	<!-- wrappers for visual page editor and boxed version of template -->
	<div id="app">
		<div id="box_wrapper">
			<!-- template sections -->
			<section class="page_topline ls ms table_section table_section_md">
				<div class="container">
					<div class="row">
						<div class="col-sm-8 col-lg-9 text-center text-sm-left">
							<div class="inline-content big-spacing"> <span>
						<i class="fa fa-map-marker highlight2 rightpadding_5" aria-hidden="true"></i>
						123 Abshire Circle, Colorado
					</span> <span class="greylinks">
						<i class="fa fa-pencil highlight2 rightpadding_5" aria-hidden="true"></i>
						<a href="mailto:marijuana@example.com">marijuana@example.com</a>
					</span> <span>
						<i class="fa fa-clock-o highlight2 rightpadding_5" aria-hidden="true"></i>
						Working Hours: 24/7
					</span> </div>
						</div>
						<div class="col-sm-4 col-lg-3 text-center text-sm-right"> <a href="contacts.html" class="theme_button color3 block_button margin_0">Request a call back free</a> </div>
					</div>
				</div>
			</section>
			<header class="page_header header_white toggler_right">
				<div class="container">
					<div class="row">
						<div class="col-sm-12 display_table">
							<div class="header_left_logo display_table_cell"> 
								<a href="/" class="logo">
									<img src="/images/logo.png" alt="">
                    			</a> 
							</div>
							<div class="header_mainmenu display_table_cell text-right">
								<!-- main nav start -->
								<nav class="mainmenu_wrapper">
									<ul class="mainmenu nav sf-menu">
										<li class="{{ Request::is('/') ? 'active' : '' }}"> 
											<a href="/">Home</a>
										</li>
										<li class="{{ Request::is('product-list') ? 'active' : '' }}"> 
											<a href="/product-list">Shop <span class="label label-success">4</span></a>
										</li>
										<li class="{{ Request::is('contact-us') ? 'active' : '' }}"> 
											<a href="/contact-us">Contact us</a>
										</li>
										<!-- eof contacts -->
									</ul>
								</nav>
								<!-- eof main nav -->
								<!-- header toggler --><span class="toggle_menu"><span></span></span>
							</div>
						</div>
					</div>
				</div>
			</header>
			@yield('content')
			
			<newsletter-component></newsletter-component>
			<footer class="page_footer ds section_padding_top_150 section_padding_bottom_130 columns_margin_bottom_30">
				<div class="container">
					<div class="row">
						<div class="col-lg-3 col-md-12 text-center">
							<div class="logo vertical_logo topmargin_20"> <img src="/images/logo_white.png" alt=""> </div>
						</div>
						<div class="col-lg-3 col-md-4 col-sm-6 text-center text-sm-left">
							<div class="widget widget_text greylinks color2">
								<h4 class="widget-title"> Our Contacts </h4>
								<div class="media small-media">
									<div class="media-left"> <i class="fa fa-map-marker highlight2"></i> </div>
									<div class="media-body">123 Abshire Circle, Colorado</div>
								</div>
								<div class="media small-media">
									<div class="media-left"> <i class="fa fa-pencil highlight2"></i> </div>
									<div class="media-body"> <a href="mailto:marijuana@example.com">marijuana@example.com</a> </div>
								</div>
								<div class="media small-media">
									<div class="media-left"> <i class="fa fa-internet-explorer highlight2"></i> </div>
									<div class="media-body"> <a href="#">www.example.com</a> </div>
								</div>
								<div class="media small-media">
									<div class="media-left"> <i class="fa fa-phone highlight2"></i> </div>
									<div class="media-body">0 (800) 846 4235 (operator) </div>
								</div>
								<div class="media small-media">
									<div class="media-left"> <i class="fa fa-clock-o highlight2"></i> </div>
									<div class="media-body">Working Hours: 24/7</div>
								</div>
							</div>
						</div>
						
						
					</div>
				</div>
			</footer>
			<section class="ds ms page_copyright section_padding_50">
				<div class="container">
					<div class="row">
						<div class="col-sm-12 text-center">
							<p>&copy; Copyright {{date('Y')}}. All Rights Reserved.</p>
							<div class="social-links"> <a class="social-icon border-icon rounded-icon socicon-facebook" href="#" title="Facebook"></a> <a class="social-icon border-icon rounded-icon socicon-twitter" href="#" title="Twitter"></a> <a class="social-icon border-icon rounded-icon socicon-google"
								    href="#" title="Google"></a> </div>
						</div>
					</div>
				</div>
			</section>
		</div>
		<!-- eof #box_wrapper -->
	</div>
	<!-- eof #canvas -->
	<script src="/js/app.js"></script>
	<script src="/js/compressed.js"></script>
	<script src="/js/main.js"></script>
	<script src="/js/switcher.js"></script>
	@yield('scripts')
</body>


<!-- Mirrored from webdesign-finder.com/html/canabia/shop-left.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 18 Nov 2018 18:21:35 GMT -->
</html>