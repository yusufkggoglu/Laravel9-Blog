@extends('layouts.home')

@section('title','User Comments')
@section('icon',Storage::url($setting->icon))


@section('content')
    <div class="container" style="font-size: large">
        <div class="container margin-top">
            <div class="contact-wrapper">
                <div class="row">
                    <div class="col-md-10">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Blog</th>
                                    <th>Yorum</th>
                                    <th>Status</th>
                                    <th>Delete</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($comments as $rs)

                                    <tr>
                                        <td>{{$rs->id}}</td>
                                        <td>{{$rs->user->name}}</td>
                                        <td>
                                            <a href="{{route('blog',['id'=>$rs->blog_id])}}">{{$rs->blog->title}}</a>
                                        </td>
                                        <td>{{$rs->comment}}</td>
                                        <td>{{$rs->status}}</td>
                                        <td style="text-align: center">
                                            <a class="btn btn-danger btn-rounded btn-fw"
                                               style="color: white;"
                                               href="{{route('userpanel_review_destroy',['id'=>$rs->id])}}"
                                               ,
                                               onclick="return confirm('Delete Are You Sure ?')">Delete</a>
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
<br><br><br><br>
@endsection