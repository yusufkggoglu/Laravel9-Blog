@extends('layouts.home')
@section('title' , 'Kayıt | '.$setting->title)
@section('content')
    <div class="container">
        <hr style="width: 1200px">
        @include('auth.register')
    </div>
@endsection