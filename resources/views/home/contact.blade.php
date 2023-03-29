@extends('layouts.home')

@section('title' , 'İletişim' .$setting->title )
@section('description',$setting->description)
@section('keywords',$setting->keywords)
@section('icon',Storage::url($setting->icon))

@section('content')
<section class="contact-form-wrap section">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-12 col-sm-12">
                <form action="{{route('storemessage')}}" method="post">
                     @csrf
                    <div class="row">
                        <div class="col-12">
                            <div class="alert alert-success contact__msg" style="display: none" role="alert">
                                    @include('home.messages')
                            </div>
                        </div>
                    </div>
                    <!-- end message -->
                    <span class="text-color">Bizimle iletişime geç</span>
                    <h3 class="text-md mb-4">İletişim Formu</h3>
                    <div class="form-group">
                        <input name="name" type="text" class="form-control" placeholder="İsim">
                    </div>
                    <div class="form-group">
                        <input name="email" type="email" class="form-control" placeholder="Email">
                    </div>
                    <div class="form-group-2 mb-4">
                        <textarea name="message" class="form-control" rows="4" placeholder="Mesaj"></textarea>
                    </div>
                    <button class="btn btn-main" name="submit" type="submit">Mesajı gönder</button>
                </form>
            </div>

            <div class="col-lg-5 col-sm-12">
                <div class="contact-content pl-lg-5 mt-5 mt-lg-0">
                    <span class="text-muted">Biz Profesyoneliz</span>
                    <h2 class="mb-5 mt-2">Her türlü bilgi için bizimle iletişime geçmekten çekinmeyin</h2>

                    <ul class="address-block list-unstyled">
                        <li>
                            <i class="ti-direction mr-3"></i>{{$setting->address}}
                        </li>
                        <li>
                        <a href="tel:+9{{$setting->phone}}"><i class="ti-email mr-3"></i>{{$setting->email}}</a>
                        </li>
                        <li>
                        <a href="mailto:{{$setting->email}}" ><i class="ti-mobile mr-3"></i>{{$setting->phone}}</a>
                        </li>
                    </ul>

                    <ul class="social-icons list-inline mt-5">
                        <li class="list-inline-item">
                            <a href="{{$setting->facebook}}"><i class="fab fa-facebook-f"></i></a>
                        </li>
                        <li class="list-inline-item">
                            <a href="{{$setting->twitter}}"><i class="fab fa-twitter"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection