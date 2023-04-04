@extends('layouts.admin')

@section('title', 'Kategori Ekle')

@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Kategori Ekle Menüsü</h4>

                            <form class="form" action="{{route('admin_category_store')}}" method="post"
                                  enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label>Ana Kategori</label>
                                    <select class="form-control select2" name="parent_id">
                                        <option value="0" selected="selected">Main Category</option>
                                        @foreach($data as $rs)
                                            <option
                                                value="{{$rs->id}}">{{\App\Http\Controllers\Admin\AdminCategoryController::getParentsTree($rs,$rs->title)}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Başlık</label>
                                    <input type="text" name="title" class="form-control" placeholder="Title">
                                </div>
                                <div class="form-group">
                                    <label>Anahtar Kelimeler</label>
                                    <input type="text" name="keywords" class="form-control" placeholder="Keywords">
                                </div>
                                <div class="form-group">
                                    <label>Açıklama</label>
                                    <input type="text" name="description" class="form-control"
                                           placeholder="Description">
                                </div>
                                <div class="form-group">
                                    <label>Durumu</label>
                                    <select class="form-control" name="status">
                                        <option>True</option>
                                        <option>False</option>
                                    </select>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Kaydet</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection