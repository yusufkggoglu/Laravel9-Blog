@extends('layouts.home')

@section('title', 'Blog : '.$data->title)
@section('icon',Storage::url($setting->icon))

@section('content')
<div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 style="font-size: large" class="card-title">{{$data->title}} Bloğunuzun İçeriği </h4>
                            <div>
                                <td><a href="/user/blog/edit/{{$data->id}}"
                                       class="btn btn-primary btn-rounded btn-fw">Düzelt</a></td>
                                <td><a href="/user/blog/delete/{{$data->id}}"
                                       class="btn btn-danger btn-rounded btn-fw">Sil</a></td>
                            </div>
                            <div class="table-responsive pt-3">
                                <table class="table table-bordered">
                                    <tr>
                                        <th style="width: 30px">ID</th>
                                        <td>{{$data->id}}</td>
                                    </tr>
                                    <tr>
                                        <th style="width: 30px">Kategori</th>
                                        <td>{{\App\Http\Controllers\Admin\AdminCategoryController::getParentsTree($data->category,$data->category->title)}}</td>

                                    </tr>
                                    <tr>
                                        <th style="width:30px">Başlık</th>
                                        <td>{{$data->title}}</td>
                                    </tr>
                                    <tr>
                                        <th style="width: 30px">Anahtar Kelimeler</th>
                                        <td>{{$data->keywords}}</td>
                                    </tr>
                                    <tr>
                                        <th style="width: 30px">Detay</th>
                                        <td>{!! $data->detail !!}</td>
                                    </tr>
                                    <tr>
                                        <th style="width: 30px">Fotoğraf</th>
                                        <td>@if($data->image)
                                                <img src="{{Storage::url($data->image)}}"
                                                     style=" border-radius:2px ; height:100px ;width: 150px">
                                            @endif</td>
                                    </tr>
                                    <tr>
                                        <th style="width: 30px">Durum</th>
                                        <td>{{$data->status}}</td>
                                    </tr>
                                    <tr>
                                        <th style="width: 30px">Oluşturulma Tarihi</th>
                                        <td>{{$data->created_at}}</td>
                                    </tr>
                                    <tr>
                                        <th style="width: 30px">Güncellenme Tarihi</th>
                                        <td>{{$data->updated_at}}</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
