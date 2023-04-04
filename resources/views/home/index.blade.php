@extends('layouts.home')

@section('title' , $setting->title)
@section('description',$setting->description)
@section('keywords',$setting->keywords)
@section('icon',Storage::url($setting->icon))

@section('content')

<div class="main-wrapper ">
<!-- Slider Start -->
<section class="slider">
	<div class="container">
		<div class="row">
			<div class="col-lg-9 col-md-10">
				<div class="block">
					<span class="d-block mb-3 text-white text-capitalize">Blog AŞ. LTD.</span>
					<h1 class="animated fadeInUp mb-5">Blog <br>Yazılarınızı<br>Bekliyoruz...</h1>
					<a href="/loginuser" target="_blank" class="btn btn-main animated fadeInUp btn-round-full" >Giriş Yap<i class="btn-icon fa fa-angle-right ml-2"></i></a>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- Section Intro Start -->

<section class="section blog-wrap bg-gray">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="row">
					@foreach($data as $rs)
						<div class="col-lg-6 col-md-6 mb-5">
							<div class="blog-item">
								<img src="{{Storage::url($rs->image)}}" alt="" class="img-fluid rounded">
								<div class="blog-item-content bg-white p-4">
									<div class="blog-item-meta  py-1 px-2">
										<span class="text-muted text-capitalize mr-3"><i class="ti-pencil-alt mr-2"></i>{{$rs->category->title}}</span>
									</div> 
									<h3 class="mt-3 mb-3"><a href="{{route('blog',['id'=>$rs->id])}}">{{$rs->title}}</a></h3>
									<p class="mb-4"><?php echo substr($rs->description,0,100)   ?>...</p>
									<a href="{{route('blog',['id'=>$rs->id])}}" class="btn btn-small btn-main btn-round-full">Daha Fazla</a>
								</div>
							</div>
						</div>
					@endforeach
				</div>
            </div>
            <div class="col-lg-4">
                <div class="sidebar-wrap">
					<div class="sidebar-widget search card p-4 mb-3 border-0">
					<form action="">
						<input type="text" name="search" id="search" class="form-control" placeholder="Ara" required>
						<!--<button type="submit" class="btn btn-primary">Ara</button> -->
					</form>
					</div>
					<div class="sidebar-widget bg-white rounded tags p-4 mb-3">
						<h5 class="mb-4">Kategoriler</h5>
						@foreach($category as $rs)
							<a href="{{route('categoryblogs',['id'=>$rs->id ,'slug'=>$rs->title])}}">{{$rs->title}}</a>
						@endforeach
					</div>
				</div>
            </div>   
        </div>
        <div class="row mt-5">
            <div class="col-lg-8">
                <nav class="navigation pagination py-2 d-inline-block">
                    <div class="nav-links">
					{{ $data->links() }}
                    </div>
                </nav>
            </div>
        </div>
    </div>
</section>

<section class="mt-70 position-relative">
	<div class="container">
	<div class="cta-block-2 bg-white p-5 rounded border-1">
		<div class="row justify-content-center align-items-center ">
			<div class="col-lg-7">
				<h2 class="mt-2 mb-4 mb-lg-0">Bir adım uzağındayız , Herhangi bir sorununuzda bizimle iletişime geçebilirsiniz ... </h2>
			</div>
			<div class="col-lg-4">
				<a href="/about" class="btn btn-main btn-round-full float-lg-right ">İletişim</a>
			</div>
		</div>
	</div>
</div>
</section>
@endsection