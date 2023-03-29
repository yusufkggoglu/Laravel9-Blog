@extends('layouts.home')

@section('title','Kullanıcı Kayıt')

@section('content')
    <div class="container">
        <h1>Kullanıcı Kayıt</h1>
        <hr style="width: 1200px">
        @include('auth.register')
    </div>
@endsections