@extends('layouts.adminwindow')
@section('title', 'User list')

@section('content')
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-Messaged">
            <center>
                <h2>Kullanıcı Detay Sayfası</h2>
            </center>
            <div class="Messaged">
                <td><a href="/admin/user/delete/{{$data->id}}"
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
                        <td>{{$data->name}}</td>
                    </tr>
                    <tr>
                        <th style="width: 30px">Email</th>
                        <td>{{$data->email}}</td>
                    </tr>
                    <tr>
                        <th style="width: 30px">Rol</th>
                        <td>
                            @foreach($data->roles as $role)
                                {{$role->name}}
                                <a href="{{route('admin_user_destroyrole',['uid'=>$data->id,'rid'=>$role->id])}}" ,
                                   onclick="return confirm('Silmeye emin misiniz ?')">[x]</a>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th style="width: 30px">Oluşturulma Tarihi</th>
                        <td>{{$data->created_at}}</td>
                    </tr>
                    <tr>
                        <th style="width: 30px">Kullanıcıya Rol Ekle</th>
                        <td>
                            <form action="{{route('admin_user_addrole',['id'=>$data->id])}} " method="post">
                                @csrf
                                <select name="role_id">
                                    @foreach($roles as $role)
                                        <option value="{{$role->id}}">{{$role->name}}</option>
                                    @endforeach
                                </select>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Ekle</button>
                                </div>
                            </form>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>

@endsection