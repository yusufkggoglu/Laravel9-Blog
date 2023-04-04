<header class="navigation">
	<div class="header-top ">
		<div class="container">
			<div class="row justify-content-between align-items-center">
				<div class="col-lg-2 col-md-4">
					<div class="header-top-socials text-center text-lg-left text-md-left">
						<a href="{{$setting->facebook}}" target="_blank"><i class="ti-facebook"></i></a>
						<a href="{{$setting->twitter}}" target="_blank"><i class="ti-twitter"></i></a>
					</div>
				</div>
				<div class="col-lg-10 col-md-8 text-center text-lg-right text-md-right">
					<div class="header-top-info">
						<a href="tel:+9{{$setting->phone}}">Bizi Arayın : <span>{{$setting->phone}}</span></a>
						<a href="mailto:{{$setting->email}}" ><i class="fa fa-envelope mr-2"></i><span>{{$setting->email}}</span></a>
					</div>
				</div>
			</div>
		</div>
	</div>
	<nav class="navbar navbar-expand-lg  py-4" id="navbar">
		<div class="container">
		  <a class="navbar-brand" href="/">
		  	YK<span>Blog</span>
		  </a>
		  <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarsExample09" aria-controls="navbarsExample09" aria-expanded="false" aria-label="Toggle navigation">
			<span class="fa fa-bars"></span>
		  </button>
		  <div class="collapse navbar-collapse text-center" id="navbarsExample09">
			<ul class="navbar-nav ml-auto">
			  <li class="nav-item active">
				<a class="nav-link" href="/">Ana Sayfa <span class="sr-only">(current)</span></a>
			  </li>
			  <li class="nav-item dropdown">
					<a class="nav-link " href="/about" aria-expanded="false">Hakkımızda</a>
			  </li>
			   <li class="nav-item"><a class="nav-link" href="/contact">İletişim</a></li>
				@guest()
				<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle btn btn-solid-border btn-round-full" href="#" id="dropdown05" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Giriş</a>
						<ul class="dropdown-menu" aria-labelledby="dropdown05">
							<li><a class="dropdown-item " href="/loginuser">Giriş yap</a></li>
							<li><a class="dropdown-item" href="/registeruser">Kayıt ol</a></li>
						</ul>
				</li>
				@endguest
				@auth()
				<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle btn btn-solid-border btn-round-full" href="#" id="dropdown05" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> {{Auth::user()->name}}</a>
						<ul class="dropdown-menu" aria-labelledby="dropdown05">
							<li><a class="dropdown-item " href="/userpanel">Hesabım</a></li>
							<li><a class="dropdown-item" href="/user/posting">Bloglarım</a></li>
							<li><a class="dropdown-item" href="{{route('userpanel_reviews')}}">Yaptığım yorumlar</a></li>
							<li><a class="dropdown-item" href="/logoutuser">Çıkış</a></li>

						</ul>
				</li>
				@endauth
			</ul>
		  </div>
		</div>
	</nav>
</header>