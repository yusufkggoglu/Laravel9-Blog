@extends('layouts.home')

@section('title' , 'Blog ' .$data->title )
@section('description',$setting->description)
@section('keywords',$setting->keywords)
@section('icon',Storage::url($setting->icon))

@section('content')

<div class="main-wrapper ">
<section class="page-title bg-1">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="block text-center">
          <span class="text-white">BLOG</span>
          <h1 class="text-capitalize mb-4 text-lg">{{$data->title}}</h1>
          <ul class="list-inline">
            <li class="list-inline-item"><a href="/" class="text-white">Anasayfa</a></li>
            <li class="list-inline-item"><span class="text-white">/</span></li>
            <li class="list-inline-item"><a href="{{route('blog',['id'=>$data->id])}}" class="text-white-50">{{$data->title}}</a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</section>



<section class="section blog-wrap bg-gray">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="row">
	<div class="col-lg-12 mb-5">
		<div class="single-blog-item">
			<img src="images/blog/2.jpg" alt="" class="img-fluid rounded">

			<div class="blog-item-content bg-white p-5">
				<div class="blog-item-meta bg-gray py-1 px-2">
					<span class="text-muted text-capitalize mr-3"><i class="ti-pencil-alt mr-2"></i>{{$data->category->title}}</span>
					<span class="text-muted text-capitalize mr-3"><i class="ti-comment mr-2"></i>5 Comments</span>
					<span class="text-black text-capitalize mr-3"><i class="ti-time mr-1"></i>{{$data->created_at}}</span>
				</div> 

				<h2 class="mt-3 mb-4"><a href="blog-single.html">{{$data->title}}</a></h2>
				<p>{!!$data->detail!!}</p>
			</div>
		</div>
	</div>
	<div class="col-lg-12 mb-5">
		<div class="comment-area card border-0 p-5">
			<h4 class="mb-4">Yorum ({{$data->comment->count('id')}})</h4>
			<ul class="comment-tree list-unstyled">
                 @foreach($comment as $rs)
				<li class="mb-5">
					<div class="comment-area-box">
						<img alt="" src="images/blog/test1.jpg" class="img-fluid float-left mr-3 mt-2">

						<h5 class="mb-1">{{$rs->user->name}}</h5>
						<span>Turkey</span>
						<div class="comment-meta mt-4 mt-lg-0 mt-md-0 float-lg-right float-md-right">
							<span class="date-comm">{{$rs->created_at}}</span>
						</div>
						<div class="comment-content mt-3">
							<p>{{$rs->comment}}</p>
						</div>
					</div>
				</li>
                @endforeach
			</ul>
		</div>
	</div>

	<div class="col-lg-12">
	@include('home.messages')
        <form action="{{route('storecomment')}}" method="post">
            @csrf
            <input class="input" type="hidden" name="blog_id" value="{{$data->id}}">
			<h4 class="mb-4">Yorum yazıp fikirlerinizi paylaşabilirsiniz...</h4>
			<textarea class="form-control mb-3" name="comment" id="comment" cols="30" rows="5" placeholder="Yorumunu bu alana yazabilirsin ..."></textarea>
			@auth
			<input class="btn btn-main btn-round-full" type="submit" name="submit" id="submit" value="Gönder">
             @else
             <a href="/loginuser" class="btn btn-main">Giriş yap</a>
			 <a href="/register" class="btn btn-main">Kayıt Ol</a>
            @endauth
		</form>
	</div>
</div>
            </div>
            <div class="col-lg-4">
                <div class="sidebar-wrap">
	<div class="sidebar-widget search card p-4 mb-3 border-0">
		<input type="text" class="form-control" placeholder="search">
		<a href="#" class="btn btn-mian btn-small d-block mt-2">search</a>
	</div>

	<div class="sidebar-widget card border-0 mb-3">
		<img src="images/blog/blog-author.jpg" alt="" class="img-fluid">
		<div class="card-body p-4 text-center">
			<h5 class="mb-0 mt-4"> @foreach($user as $temp)
                                    @if($data->user_id==$temp->id)
                                        <td>{{$temp->name}}</td>
                                    @endif
                                @endforeach
                            </h5>
			<p>Bloger</p>
		</div>
	</div>

	<div class="sidebar-widget latest-post card border-0 p-4 mb-3">
		<h5>Diğer gönderiler</h5>
         @foreach($other as $rs)
        <div class="media border-bottom py-3">
            <a href="{{route('blog',['id'=>$rs->id])}}"><img class="mr-4" src="images/blog/bt-3.jpg" alt=""></a>
            <div class="media-body">
                <h6 class="my-2"><a href="{{route('blog',['id'=>$rs->id])}}">{{$rs->title}}</a></h6>
                <span class="text-sm text-muted">{{$rs->created_at}}</span>
            </div>
        </div>
        @endforeach
	</div>
</section>
@endsection