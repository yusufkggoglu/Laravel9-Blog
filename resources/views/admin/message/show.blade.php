@extends('layouts.adminwindow')
@section('title', 'Göster : '.$data->name.' '.$data->lastname)

@section('content')
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-Messaged">
            <center>
                <h2>Mesaj Detay Sayfası</h2>
            </center>
            <div class="Messaged">
                <td><a href="/admin/message/delete/{{$data->id}}"
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
                        <th style="width: 30px">Mail</th>
                        <td>{{$data->email}}</td>
                    </tr>
                    <tr>
                        <th style="width: 30px">Mesaj</th>
                        <td>{{$data->message}}</td>
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
                        <th style="width: 30px">Admin Notu :</th>
                        <td>
                            <form action="{{route('admin_message_update', ['id'=>$data->id])}} " method="post">
                                @csrf
                                <textarea class="textarea" cols="100" id="note" name="note">{{$data->note}}</textarea>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Kaydet</button>
                                </div>
                            </form>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>

@endsection