<!-- footer Start -->
<footer class="footer section">
	<div class="container">
		<div class="row">
			<div class="col-lg-3 col-md-6 col-sm-6">
				<div class="widget">
					<h4 class="text-capitalize mb-4">{{$setting->title}}</h4>

					<ul class="list-unstyled footer-menu lh-35">
						<li><a href="/">Anasayfa</a></li>
						<li><a href="/about">Hakkımızda</a></li>
						<li><a href="/contact">İletişim</a></li>
					</ul>
				</div>
			</div>
			<div class="col-lg-3 ml-auto col-sm-6">
				<div class="widget">
					<div class="logo mb-4">
						<h3>YK<span>Blog</span></h3>
					</div>
					<h6><a href="mailto:{{$setting->email}}" >{{$setting->email}}</a></h6>
					<a href="tel:+9{{$setting->phone}}"><span class="text-color h4">+{{$setting->phone}}</span></a>
				</div>
			</div>
		</div>
		
		<div class="footer-btm pt-4">
			<div class="row">
				<div class="col-lg-4 col-md-12 col-sm-12">
					<div class="copyright">
						&copy; Copyright Reserved to <span class="text-color">Yusuf K.</span>
					</div>
				</div>
				<div class="col-lg-4 col-md-12 col-sm-12 text-left text-lg-left">
					<ul class="list-inline footer-socials">
						<li class="list-inline-item"><a href="{{$setting->facebook}}"><i class="ti-facebook mr-2"></i>Facebook</a></li>
						<li class="list-inline-item"><a href="{{$setting->twitter}}"><i class="ti-twitter mr-2"></i>Twitter</a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</footer>
   
    </div>

    <!-- 
    Essential Scripts
    =====================================-->

    
    <!-- Main jQuery -->
    <script src="{{asset('assets')}}/plugins/jquery/jquery.js"></script>
    <script src="js/contact.js"></script>
    <!-- Bootstrap 4.3.1 -->
    <script src="{{asset('assets')}}/plugins/bootstrap/js/popper.js"></script>
    <script src="{{asset('assets')}}/plugins/bootstrap/js/bootstrap.min.js"></script>
   <!--  Magnific Popup-->
    <script src="{{asset('assets')}}/plugins/magnific-popup/dist/jquery.magnific-popup.min.js"></script>
    <!-- Slick Slider -->
    <script src="{{asset('assets')}}/plugins/slick-carousel/slick/slick.min.js"></script>
    <!-- Counterup -->
    <script src="{{asset('assets')}}/plugins/counterup/jquery.waypoints.min.js"></script>
    <script src="{{asset('assets')}}/plugins/counterup/jquery.counterup.min.js"></script>

    <!-- Google Map -->
    <script src="{{asset('assets')}}/plugins/google-map/map.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAkeLMlsiwzp6b3Gnaxd86lvakimwGA6UA&callback=initMap"></script>    
    
    <script src="js/script.js"></script>
