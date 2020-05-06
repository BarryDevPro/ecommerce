
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>@yield('title')</title>
	<link rel="icon" href="{{config('templates.path')}}/img/Fevicon.png" type="image/png">
  <link rel="stylesheet" href="{{config('templates.path')}}/bootstrap/bootstrap.min.css">
  <link rel="stylesheet" href="{{config('templates.path')}}/fontawesome/css/all.min.css">
	<link rel="stylesheet" href="{{config('templates.path')}}/themify-icons/themify-icons.css">
  <link rel="stylesheet" href="{{config('templates.path')}}/nice-select/nice-select.css">
  <link rel="stylesheet" href="{{config('templates.path')}}/owl-carousel/owl.theme.default.min.css">
  <link rel="stylesheet" href="{{config('templates.path')}}/owl-carousel/owl.carousel.min.css">
  <link rel="stylesheet" href="{{config('templates.path')}}/nouislider/nouislider.min.css">
  <link rel="stylesheet" href="{{config('templates.path')}}/linericon/style.css">

  <link rel="stylesheet" href="{{config('templates.path')}}/css/style.css">
</head>
<body>
  <!--================ Start Header Menu Area =================-->
	<header class="header_area">
    <div class="main_menu">
      <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container">
          <a class="navbar-brand logo_h" href="index.html"><img src="{{config('templates.path')}}/img/logo.png" alt=""></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
            <ul class="nav navbar-nav menu_nav ml-auto mr-auto">
              <li class="nav-item active">{!! link_to_route('home', 'Home', null, ['class'=> 'nav-link']) !!}</li>
              <li class="nav-item submenu dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                  aria-expanded="false">Shop</a>
                <ul class="dropdown-menu">
                  <li class="nav-item"><a class="nav-link" href="category.html">Shop Category</a></li>
                  <li class="nav-item"><a class="nav-link" href="single-product.html">Product Details</a></li>
                  <li class="nav-item"><a class="nav-link" href="checkout.html">Product Checkout</a></li>
                  <li class="nav-item"><a class="nav-link" href="confirmation.html">Confirmation</a></li>
                  <li class="nav-item"><a class="nav-link" href="cart.html">Shopping Cart</a></li>
                </ul>
							</li>
              <li class="nav-item submenu dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                  aria-expanded="false">Blog</a>
                <ul class="dropdown-menu">
                  <li class="nav-item"><a class="nav-link" href="blog.html">Blog</a></li>
                  <li class="nav-item"><a class="nav-link" href="single-blog.html">Blog Details</a></li>
                </ul>
							</li>
							<li class="nav-item submenu dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                  aria-expanded="false">User</a>
                <ul class="dropdown-menu">
					@if (session()->get('client') == null)
					<li class="nav-item">
						
						{!! link_to_route('connexion.get', 'Login', null, ['class' => 'nav-link']) !!}
					</li>
				  @endif
				  <li class="nav-item">{!! link_to_route('registre.get', 'S\'enregistrer', null, ['class' => 'nav-link']) !!}</li>
				  @if (session()->get('client') != null)
				  <li class="nav-item">
					{!! link_to_route('connexion.logout', 'Deconnexion', null, ['class' => 'nav-link']) !!}
				  </li>
				  @endif
                  
                </ul>
              </li>
              <li class="nav-item"><a class="nav-link" href="contact.html">Contact</a></li>
            </ul>

            <ul class="nav-shop">
              
			<li class="nav-item"><a href="/cart"><button><i class="ti-shopping-cart"></i><span class="nav-shop__circle">{{count(session()->get('cart', collect()))}}</span></button></a> </li>
			  @if (session()->get('total') > 0)
				<li class="nav-item">
					{!! link_to_route('cart.valide', 'Valider la commande', null, ['class' => 'button button-header']) !!}
				</li>
			  @endif
            </ul>
          </div>
        </div>
      </nav>
    </div>
  </header>
	<!--================ End Header Menu Area =================-->

  <main class="site-main">
  		<!-- <script src="//code.jquery.com/jquery.js"></script> -->
        @include('flashy::message')
    	@yield('content')
    

  </main>


  <!--================ Start footer Area  =================-->	
	<footer class="footer">
		<div class="footer-area">
			<div class="container">
				<div class="row section_gap">
					<div class="col-lg-3 col-md-6 col-sm-6">
						<div class="single-footer-widget tp_widgets">
							<h4 class="footer_title large_title">Our Mission</h4>
							<p>
								So seed seed green that winged cattle in. Gathering thing made fly you're no 
								divided deep moved us lan Gathering thing us land years living.
							</p>
							<p>
								So seed seed green that winged cattle in. Gathering thing made fly you're no divided deep moved 
							</p>
						</div>
					</div>
					<div class="offset-lg-1 col-lg-2 col-md-6 col-sm-6">
						<div class="single-footer-widget tp_widgets">
							<h4 class="footer_title">Quick Links</h4>
							<ul class="list">
								<li><a href="#">Home</a></li>
								<li><a href="#">Shop</a></li>
								<li><a href="#">Blog</a></li>
								<li><a href="#">Product</a></li>
								<li><a href="#">Brand</a></li>
								<li><a href="#">Contact</a></li>
							</ul>
						</div>
					</div>
					<div class="col-lg-2 col-md-6 col-sm-6">
						<div class="single-footer-widget instafeed">
							<h4 class="footer_title">Gallery</h4>
							<ul class="list instafeed d-flex flex-wrap">
								<li><img src="{{config('templates.path')}}/img/gallery/r1.jpg" alt=""></li>
								<li><img src="{{config('templates.path')}}/img/gallery/r2.jpg" alt=""></li>
								<li><img src="{{config('templates.path')}}/img/gallery/r3.jpg" alt=""></li>
								<li><img src="{{config('templates.path')}}/img/gallery/r5.jpg" alt=""></li>
								<li><img src="{{config('templates.path')}}/img/gallery/r7.jpg" alt=""></li>
								<li><img src="{{config('templates.path')}}/img/gallery/r8.jpg" alt=""></li>
							</ul>
						</div>
					</div>
					<div class="offset-lg-1 col-lg-3 col-md-6 col-sm-6">
						<div class="single-footer-widget tp_widgets">
							<h4 class="footer_title">Contact Us</h4>
							<div class="ml-40">
								<p class="sm-head">
									<span class="fa fa-location-arrow"></span>
									Head Office
								</p>
								<p>123, Main Street, Your City</p>
	
								<p class="sm-head">
									<span class="fa fa-phone"></span>
									Phone Number
								</p>
								<p>
									+123 456 7890 <br>
									+123 456 7890
								</p>
	
								<p class="sm-head">
									<span class="fa fa-envelope"></span>
									Email
								</p>
								<p>
									free@infoexample.com <br>
									www.infoexample.com
								</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="footer-bottom">
			<div class="container">
				<div class="row d-flex">
					<p class="col-lg-12 footer-text text-center">
						<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
				</div>
			</div>
		</div>
	</footer>
	<!--================ End footer Area  =================-->



  <script src="{{config('templates.path')}}/jquery/jquery-3.2.1.min.js"></script>
  <script src="{{config('templates.path')}}/bootstrap/bootstrap.bundle.min.js"></script>
  <script src="{{config('templates.path')}}/skrollr.min.js"></script>
  <script src="{{config('templates.path')}}/owl-carousel/owl.carousel.min.js"></script>
  <script src="{{config('templates.path')}}/nice-select/jquery.nice-select.min.js"></script>
  <script src="{{config('templates.path')}}/jquery.ajaxchimp.min.js"></script>
  <script src="{{config('templates.path')}}/mail-script.js"></script>
  <script src="{{config('templates.path')}}/js/main.js"></script>

  @yield('script')
</body>
</html>