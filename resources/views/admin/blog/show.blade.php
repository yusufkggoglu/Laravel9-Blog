@extends('layouts.admin')

@section('title', 'Blog : '.$data->title)

@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 style="font-size: large" class="card-title">{{$data->title}} Detay</h4>
                            <div>
                                <td><a href="/admin/blog/edit/{{$data->id}}"
                                       class="btn btn-primary btn-rounded btn-fw">Düzelt</a></td>
                                <td><a href="/admin/blog/delete/{{$data->id}}"
                                       class="btn btn-danger btn-rounded btn-fw">Sil</a></td>
                            </div>
                            <form class="form" action="/admin/blog/updatestatus/{{$data->id}}" method="post"
                                  enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label>Durumu</label>
                                    <select class="form-control" name="status">
                                        <option selected>{{$data->status}}</option>
                                        <option>True</option>
                                        <option>False</option>
                                    </select>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Durumu Güncelle</button>
                                </div>
                            </form>
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
                                        <th style="width: 30px">Blog Detay</th>
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
                                        <th style="width: 30px">Durumu</th>
                                        <td>{{$data->status}}</td>
                                    </tr>
                                    <tr>
                                        <th style="width: 30px">Oluşturulma Tarihi</th>
                                        <td>{{$data->created_at}}</td>
                                    </tr>
                                    <tr>
                                        <th style="width: 30px">Güncelleme Tarihi</th>
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