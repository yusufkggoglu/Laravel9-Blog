@extends('layouts.admin')

@section('title', 'Settings ')

@section('js')
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
@endsection

@section('content')
    <div class="main-panel">
        <div class="container-fluid page-body-wrapper pt-0 proBanner-padding-top">
            <div class="container">
                <form class="form" action="{{route('admin_setting_update')}}" method="post"
                      enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-12 col-sm-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body dashboard-tabs p-0">
                                    <ul class="nav nav-tabs px-4" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" id="general-tab" data-bs-toggle="tab"
                                               href="#general"
                                               role="tab" aria-controls="general" aria-selected="true">Genel</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="smtp-tab" data-bs-toggle="tab" href="#smtp"
                                               role="tab" aria-controls="smtp" aria-selected="false">SMTP E-mail</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="social-tab" data-bs-toggle="tab" href="#social"
                                               role="tab" aria-controls="social" aria-selected="false">Sosyal Medya</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="about-tab" data-bs-toggle="tab" href="#about"
                                               role="tab" aria-controls="about" aria-selected="false">Hakkımızda</a>
                                        </li>
                                    </ul>
                                    <div class="tab-content py-0 px-0">
                                        <div class="tab-pane fade show active" id="general" role="tabpanel"
                                             aria-labelledby="general-tab">
                                            <div class="d-flex flex-wrap justify-content-xl-between">
                                                <div
                                                    class="d-none d-xl-flex border-md-right flex-grow-1 align-items-left justify-content-left p-3 item">

                                                    <div class="d-flex flex-column justify-content-around">

                                                        <h4 class="card-title">Genel Ayarlar</h4>
                                                        <input type="hidden" id="id" name="id"
                                                               value="{{$data->id}}">
                                                        <div class="form-group">
                                                            <label for="exampleInputName1">Site Başlık</label>
                                                            <input type="text" class="form-control"
                                                                   name="title" value="{{$data->title}}">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="exampleInputName1">Anahtar Kelimeler</label>
                                                            <input type="text" class="form-control"
                                                                   name="keywords" value="{{$data->keywords}}">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="exampleInputName1">Açıklama</label>
                                                            <input type="text" class="form-control"
                                                                   name="description"
                                                                   value="{{$data->description}}">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="exampleInputName1">Şirket</label>
                                                            <input type="text" class="form-control"
                                                                   name="company" value="{{$data->company}}">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="exampleInputName1">Adres</label>
                                                            <input type="text" class="form-control"
                                                                   name="address" value="{{$data->address}}">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="exampleInputName1">Telefon</label>
                                                            <input type="tel" class="form-control"
                                                                   name="phone" value="{{$data->phone}}">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="exampleInputEmail3">Email</label>
                                                            <input type="email" class="form-control"
                                                                   name="email" value="{{$data->email}}">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="exampleSelectGender">Durumu</label>
                                                            <select class="form-control" name="status">
                                                                <option selected>{{$data->status}}</option>
                                                                <option>True</option>
                                                                <option>False</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>İcon</label>
                                                            <input type="file" name="icon"
                                                                   class="file-upload-default">
                                                            <div class="input-group col-xs-12">
                                                                <input type="text"
                                                                       class="form-control file-upload-info"
                                                                       disabled
                                                                       placeholder="Choose Image File">
                                                                <div class="custom-file">
                                                                    <input type="file" name="icon"
                                                                           class="custom-file-input">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="smtp" role="tabpanel" aria-labelledby="smtp-tab">
                                            <div class="d-flex flex-wrap justify-content-xl-between">
                                                <div
                                                    class="d-none d-xl-flex border-md-right flex-grow-1 align-items-left justify-content-left p-3 item">
                                                    <div class="d-flex flex-column justify-content-around">
                                                        <h4 class="card-title">SMTP E-MAIL Ayarları</h4>
                                                        <div class="form-group">
                                                            <label for="exampleInputName1">SMTP SERVER</label>
                                                            <input type="text" class="form-control"
                                                                   name="smtpserver" value="{{$data->smtpserver}}">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="exampleInputEmail3">SMTP E-mail</label>
                                                            <input type="email" name="smtpemail"
                                                                   class="form-control" id="exampleInputEmail3"
                                                                   value="{{$data->email}}">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="exampleInputPassword4">SMTP
                                                                Şifre</label>
                                                            <input type="password" name="smtppassword"
                                                                   class="form-control"
                                                                   id="exampleInputPassword4"
                                                                   value="{{$data->password}}">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="exampleInputName1">SMTP Port</label>
                                                            <input type="number" class="form-control"
                                                                   name="smtpport" value="{{$data->smtpport}}">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="social" role="tabpanel"
                                             aria-labelledby="social-tab">
                                            <div class="d-flex flex-wrap justify-content-xl-between">
                                                <div
                                                    class="d-none d-xl-flex border-md-right flex-grow-1 align-items-left justify-content-left p-3 item">

                                                    <div class="d-flex flex-column justify-content-around">


                                                        <h4 class="card-title">SOSYAL MEDYA</h4>
                                                        <div class="form-group">
                                                            <label for="exampleInputName1">Facebook</label>
                                                            <input type="text" class="form-control"
                                                                   name="facebook" value="{{$data->facebook}}">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="exampleInputName1">Twitter</label>
                                                            <input type="text" class="form-control"
                                                                   name="twitter" value="{{$data->twitter}}">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="about" role="tabpanel"
                                             aria-labelledby="about-tab">
                                            <div class="d-flex flex-wrap justify-content-xl-between">
                                                <div
                                                    class="d-none d-xl-flex border-md-right flex-grow-1 align-items-left justify-content-left p-3 item">
                                                    <div class="d-flex flex-column justify-content-around">
                                                        <h4 class="card-title">HAKKIMIZDA</h4>
                                                        <div class="form-group">
                                                            <label for="exampleTextarea1">HAKKIMIZDA</label>
                                                            <textarea name="aboutus"
                                                                      class="form-control" id="aboutus"
                                                                      rows="4">{{$data->aboutus}}
                                                            </textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary col-12">
                                           AYARLARI GÜNCELLE
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>


@endsection

@section('footer')
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>

    <script>
        $(document).ready(function () {
            $('#aboutus').summernote();
            $('#contactt').summernote();
            $('#referencess').summernote();
        });
    </script>
@endsection