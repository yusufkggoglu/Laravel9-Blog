@extends('layouts.home')

@section('title','Kullanıcı Giriş')
@section('content')
    <div class="container">
        <h1>Kullanıcı Giriş</h1>
        <hr style="width: 1200px">
        @include('auth.login')
    </div>
@endsection