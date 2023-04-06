@extends('layouts.home')
@section('title' , 'Giriş | '.$setting->title)
@section('content')
    <div class="container">
        <hr style="width: 1200px">
        @include('auth.login')
    </div>
@endsection