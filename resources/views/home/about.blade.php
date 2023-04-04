@extends('layouts.home')

@section('title' , 'Hakkımızda |' .$setting->title )
@section('description',$setting->description)
@section('keywords',$setting->keywords)
@section('icon',Storage::url($setting->icon))

@section('content')
<section class="section about-2 position-relative">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 col-md-12">
				<div class="about-item pr-3 mb-5 mb-lg-0">
					<span class="h6 text-color">Biz kimiz ?</span>
					<h2 class="mt-3 mb-4 position-relative content-title">Biz yaratıcı insanlardan oluşan dinamik bir ekibiz</h2>
					<p class="mb-5">{!! $setting->aboutus !!}</p>

					<a href="/contact" class="btn btn-main btn-round-full">İletişim</a>
				</div>
			</div>
		</div>
	</div>
</section>

@endsection