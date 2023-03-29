@extends('layouts.home')

@section('title','Kullanıcı Profili')
@section('icon',Storage::url($setting->icon))


@section('content')
    <div class="container" style="font-size: large">
        <div class="container margin-top">
            <div class="contact-wrapper">
                <div class="row">
                    <div class="col-md-10">
                        <h1 style="font-size: large">Kullanıcı Profili</h1>
                        @include('profile.show')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection