"@extends('layouts.adminwindow')
@section('title', 'Göster : '.$data->name)

@section('content')
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-Messaged">
            <center>
                <h2>Yorum Detay Sayfası</h2>
            </center>
            <div class="Messaged">
                <td><a href="/admin/comment/destroy/{{$data->id}}"
                       class="btn btn-danger btn-rounded btn-fw">Sil</a></td>
            </div>
            <div class="table-responsive pt-3">
                <table class="table table-bordered">
                    <tr>
                        <th style="width: 30px">ID</th>
                        <td>{{$data->id}}</td>
                    </tr>
                    <tr>
                        <th style="width: 30px">İsim</th>
                        <td>{{$data->user->name}}</td>
                    </tr>
                    <tr>
                        <th style="width: 30px">Blog</th>
                        <td>{{$data->blog->title}}</td>
                    </tr>
                    <tr>
                        <th style="width: 30px">Yorum</th>
                        <td>{{$data->comment}}</td>
                    </tr>
                    <tr>
                        <th style="width: 30px">Oluşturulma Tarihi</th>
                        <td>{{$data->created_at}}</td>
                    </tr>
                    <tr>
                        <td>
                            <form action="{{route('admin_comment_update', ['id'=>$data->id])}} " method="post">
                    @csrf
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Yorumu Onayla</button>
                    </div>
                    </form>
                    </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>

@endsection