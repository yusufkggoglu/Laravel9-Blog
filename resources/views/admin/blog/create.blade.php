@extends('layouts.admin')

@section('title', 'Blog Ekle')

@section('js')
    <script src="https://cdn.ckeditor.com/ckeditor5/34.0.0/classic/ckeditor.js"></script>
@endsection

@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Blog Ekle</h4>

                            <form class="form" action="{{route('admin_blog_store')}}" method="post"
                                  enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="user_id" value="{{\Illuminate\Support\Facades\Auth::id()}}">

                                <div class="form-group">
                                    <label>Kategori</label>
                                    <select class="form-control select2" name="category_id">
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
                                    <label>Fotoğraf</label>
                                    <input type="file" name="image" class="file-upload-default">
                                    <div class="input-group col-xs-12">
                                        <input type="text" class="form-control file-upload-info" disabled
                                               placeholder="Choose Image File">
                                        <div class="custom-file">
                                            <input type="file" name="image" class="custom-file-input">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Blog Detay</label>
                                    <textarea class="form-check" id="detail" name="detail">

                                    </textarea>
                                    <script>
                                        ClassicEditor
                                            .create(document.querySelector('#detail'))
                                            .then(editor =>{
                                                    console.log(editor);
                                            })
                                            .catch(error=>{
                                                    console.error(error);
                                            })
                                    </script>
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