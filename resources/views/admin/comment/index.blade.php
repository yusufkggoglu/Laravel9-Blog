@extends('layouts.admin')

@section('title', 'Comment')

@section('content')

    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-md-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <div class="template-demo">
                                <div class="card-body">
                                    <h4 style="font-size: large" class="card-title">Comment List</h4>
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Name</th>
                                                <th>Blog</th>
                                                <th>Comment</th>
                                                <th>Status</th>
                                                <th>Delete</th>
                                                <th>Show</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($data as $rs)

                                                <tr>
                                                    <td>{{$rs->id}}</td>
                                                    <td>{{$rs->user->name}}</td>
                                                    <td>
                                                        <a href="{{route('admin_blog_show',['id'=>$rs->blog_id])}}">{{$rs->blog->title}}</a>
                                                    </td>
                                                    <td>{{$rs->comment}}</td>
                                                    <td>{{$rs->status}}</td>
                                                    <td style="text-align: center">
                                                        <a class="btn btn-danger btn-rounded btn-fw"
                                                           style="color: white;"
                                                           href="{{route('admin_comment_destroy',['id'=>$rs->id])}}"
                                                           ,
                                                           onclick="return confirm('Delete Are You Sure ?')">Delete</a>
                                                    </td>
                                                    <td><a href="/admin/comment/show/{{$rs->id}}"
                                                           class="btn btn-success btn-rounded btn-fw"
                                                           onclick="return !window.open(this.href,'','top=50 left=100 width=1100,height=700')">Show</a>
                                                    </td>
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