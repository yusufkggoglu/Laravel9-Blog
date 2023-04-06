@extends('layouts.home')

@section('title', 'Düzelt : '.$data->title)
@section('icon',Storage::url($setting->icon))
@section('headerjs')
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
@endsection
@section('content')
<div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Düzelt : {{$data->title}}</h4>

                            <form class="form" action="/user/blog/update/{{$data->id}}" method="post"
                                  enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="user_id" value="{{\Illuminate\Support\Facades\Auth::id()}}">

                                <div class="form-group">
                                    <label>Kategori</label>

                                    <select class="form-control select2" name="category_id">
                                        @foreach($datalist as $rs)
                                            <option value="{{$rs->id}}"
                                                    @if($rs->id == $data->category_id) selected="selected" @endif>
                                                {{\App\Http\Controllers\Admin\AdminCategoryController::getParentsTree($rs,$rs->title)}}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Başlık</label>
                                    <input type="text" name="title" class="form-control" value="{{$data->title}}">
                                </div>
                                <div class="form-group">
                                    <label>Anahtar Kelimeler</label>
                                    <input type="text" name="keywords" class="form-control" value="{{$data->keywords}}">
                                </div>
                                <div class="form-group">
                                    <label>Açıklama</label>
                                    <input type="text" name="description" class="form-control"
                                           value="{{$data->description}}">
                                </div>
                                <div class="form-group">
                                    <label>Detay</label>
                                    <textarea class="textarea" id="detail" name="detail">{{$data->detail}}</textarea>
                                </div>
                                <div class="form-group">
                                    <label>Fotoğraf</label>
                                    <input type="file" name="image" class="file-upload-default">
                                </div>
                                <div class="form-group">
                                    <label>Durumu</label>
                                    <select class="form-control" name="status">
                                        <option selected>{{$data->status}}</option>
                                        <option>False</option>
                                    </select>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Güncelle</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>
<br>
<br>
<br>
@endsection

@section('footerjs')
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>

    <script>
        $(function () {
            //Summernote
            $('.textarea').summernote()
        })
    </script>
@endsection