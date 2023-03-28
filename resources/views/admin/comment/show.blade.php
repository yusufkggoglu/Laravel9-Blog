"@extends('layouts.adminwindow')
@section('title', 'Show Comment : '.$data->name)

@section('content')
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-Messaged">
            <center>
                <h2>Comment Detail Page</h2>
            </center>
            <div class="Messaged">
                <td><a href="/admin/comment/destroy/{{$data->id}}"
                       class="btn btn-danger btn-rounded btn-fw">Delete</a></td>
            </div>
            <div class="table-responsive pt-3">
                <table class="table table-bordered">
                    <tr>
                        <th style="width: 30px">ID</th>
                        <td>{{$data->id}}</td>
                    </tr>
                    <tr>
                        <th style="width: 30px">Name</th>
                        <td>{{$data->user->name}}</td>
                    </tr>
                    <tr>
                        <th style="width: 30px">Blog</th>
                        <td>{{$data->blog->title}}</td>
                    </tr>
                    <tr>
                        <th style="width: 30px">Comment</th>
                        <td>{{$data->comment}}</td>
                    </tr>
                    <tr>
                        <th style="width: 30px">Created Date</th>
                        <td>{{$data->created_at}}</td>
                    </tr>
                    <tr>
                        <td>
                            <form action="{{route('admin_comment_update', ['id'=>$data->id])}} " method="post">
                    @csrf
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Update Data</button>
                    </div>
                    </form>
                    </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>

@endsection