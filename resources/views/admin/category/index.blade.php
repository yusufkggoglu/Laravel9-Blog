@extends('layouts.admin')

@section('title', 'Categories ')

@section('content')

    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-md-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <div class="template-demo">
                                <div class="card-body">
                                    <h4 style="font-size: large" class="card-title">Category List</h4>
                                    <div class="col-sm-push-6">
                                        <a href="/admin/category/create" class="btn btn-md btn-inverse-primary btn-fw">Add
                                            Category</a>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Ana Kategori</th>
                                                <th>Başlık</th>
                                                <th>Anahtar Kelime</th>
                                                <th>Durumu</th>
                                                <th>Düzelt</th>
                                                <th>Sil</th>
                                                <th>Göster</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($data as $rs)

                                                <tr>
                                                    <td>{{$rs->id}}</td>
                                                    <td>{{\App\Http\Controllers\Admin\AdminCategoryController::getParentsTree($rs,$rs->title)}}</td>
                                                    <td>{{$rs->title}}</td>
                                                    <td>{{$rs->keywords}}</td>
                                                    <td>{{$rs->status}}</td>
                                                    <td><a href="/admin/category/edit/{{$rs->id}}"
                                                           class="btn btn-primary btn-rounded btn-fw">Düzelt</a></td>
                                                    <td style="text-align: center">
                                                        <a class="btn btn-danger btn-rounded btn-fw"
                                                           style="color: white;"
                                                           href="{{route('admin_category_delete',['id'=>$rs->id])}}"
                                                           ,
                                                           onclick="return confirm('Delete Are You Sure ?')">Sil</a>
                                                    </td>
                                                    <td><a href="/admin/category/show/{{$rs->id}}"
                                                           class="btn btn-success btn-rounded btn-fw">Göster</a></td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection

@section('footer')

@endsection