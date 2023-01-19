@extends('layouts.panel')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header p-4 pb-2">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('students.index')}}">Sınıflar</a></li>
                        <li class="breadcrumb-item"><a href="{{route('students.create')}}">Sınıf oluştur</a></li>
                    </ol>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <h1 class="m-0"> </h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <div class="row p-5 pt-0 card-gray">
        <!--  card -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">{{__('Öğrenci Bilgilerini Güncelle')}}</h3>
            </div>
            <div class="card-body">


                <form action="{{route('qualifications.update',$qualification->id)}}" method="post" enctype="multipart/form-data">


                    <div class="row">
                        @csrf
                        @method('put')
                        <div class="col-md-3">

                            <div class="form-group">
                                <label for="student_id">Öğrenci İsim & Soyismi</label>

                                <div class="input-group">
                                    <input id="student_id" type="text" class="form-control @error('student_id') is-invalid @enderror"
                                           name="student_id"
                                           value="{{$qualification->student->id}}"
                                           required
                                           hidden
                                    >
                                    <input type="text" value="{{ $qualification->student->name.' '.$qualification->student->surname }}" class="form-control" disabled>
                                    @error('student_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                            </div>

                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="student_no">Öğrenci No</label>
                                <div class="input-group">
                                    <input id="student_no" type="text" class="form-control @error('student_no') is-invalid @enderror"
                                           name="student_no"
                                           value="{{ $qualification->student_no  }}"
                                           required
                                           autocomplete="student_no"
                                           autofocus>
                                    @error('student_no')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                            </div>

                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="departmnent_id">Kayıt Olacağı bölüm</label>
                                <div class="input-group">
                                    <select  class="form-control @error('departmnent_id') is-invalid @enderror"   name="departmnent_id" required>
                                        @foreach($departments as $department)
                                            <option value="{{$department->id}}" {{ $department->id == $qualification->id ? 'selected' : ''}}>{{$department->name}}</option>
                                        @endforeach
                                    </select>
                                    @error('departmnent_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                            </div>

                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="student_no">Bölüm İmza Bitiş Tarihi</label>

                                <div class="input-group">
                                    <input
                                        type="date"
                                        id="depart_imza_end_date"
                                        class="form-control @error('depart_imza_end_date') is-invalid @enderror"
                                        name="depart_imza_end_date"
                                        value="{{date('Y-m-d',strtotime($qualification->depart_imza_end_date))}}"
                                        data-inputmask-alias="date"
                                        data-inputmask-inputformat="dd/mm/yyyy"
                                        required  data-masks autocomplete="depart_imza_end_date">
                                    @error('depart_imza_end_date')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                            </div>

                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="islem_sira_no">İşlem Sıra No</label>

                                <div class="input-group">
                                    <input
                                        type="text"
                                        id="islem_sira_no"
                                        class="form-control @error('islem_sira_no') is-invalid @enderror"
                                        name="islem_sira_no"
                                        value="{{$qualification->islem_sira_no}}"
                                        autocomplete="islem_sira_no">
                                    @error('islem_sira_no')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                            </div>

                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="student_no">Mesleki yeterlilik başlama tarihi</label>

                                <div class="input-group">
                                    <input
                                        type="date"
                                        id="qualification_start_date"
                                        class="form-control @error('qualification_start_date') is-invalid @enderror"
                                        name="qualification_start_date"
                                        data-inputmask-alias="date"
                                        value="{{date('Y-m-d',strtotime($qualification->qualification_start_date))}}"
                                        data-inputmask-inputformat="dd/mm/yyyy"
                                        required  data-masks autocomplete="qualification_start_date">
                                    @error('qualification_start_date')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                            </div>

                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="student_status">Öğrenci öğrenim durumu</label>
                                <div class="input-group">
                                    <select  class="form-control @error('student_status') is-invalid @enderror"   name="student_status" required>
                                        <option value="Aktif" {{$qualification->student_status == 'Aktif' ? 'selected' : ''}}>Aktif</option>
                                        <option value="Pasif" {{$qualification->student_status == 'Pasif' ? 'selected' : ''}}>Pasif</option>
                                        <option value="OnKayitli" {{$qualification->student_status == 'OnKayitli' ? 'selected' : ''}}>Ön Kayıtlı</option>
                                        <option value="KaydiSilinmis" {{$qualification->student_status == 'KaydiSilinmis' ? 'selected' : ''}}>Kaydı Silinmiş</option>
                                        <option value="KayitDondurma" {{$qualification->student_status == 'KayitDondurma' ? 'selected' : ''}}>Kayıt Dondurma</option>
                                    </select>
                                    @error('student_status')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                            </div>

                        </div>
                        <div class="col-md-3">

                            <div class="form-group">
                                <label for="ogr_hakk">Öğrenci Hak</label>

                                <div class="input-group">
                                    <select  class="form-control @error('ogr_hakk') is-invalid @enderror"   name="ogr_hakk" required>
                                        <option value="HakkiVar" {{$qualification->ogr_hakk == 'HakkiVar' ? 'selected' : ''}}>Hakki Var</option>
                                        <option value="HakkiYok" {{$qualification->ogr_hakk == 'HakkiYok' ? 'selected' : ''}}>Hakki Yok</option>
                                    </select>
                                    @error('ogr_hakk')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                            </div>

                        </div>
                        <div class="col-md-3">

                            <div class="form-group">
                                <label for="not_sistemi">Not sistemi</label>
                                <div class="input-group">
                                    <select  class="form-control @error('not_sistemi') is-invalid @enderror"   name="not_sistemi" >
                                        <option value="Deneme1">Deneme Not sistemi</option>
                                        <option value="Deneme2">Deneme Not sistemi1</option>
                                    </select>
                                    @error('not_sistemi')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                            </div>

                        </div>
                        <div class="col-md-3">

                            <div class="form-group">
                                <label for="ayrilma_tarihi"> Ayrılma Tarihi </label>

                                <div class="input-group">

                                    <input
                                        type="date"
                                        id="ayrilma_tarihi"
                                        class="form-control @error('ayrilma_tarihi') is-invalid @enderror"
                                        name="ayrilma_tarihi"
                                        value="{{date('Y-m-d',strtotime($qualification->ayrilma_tarihi))}}"
                                        data-inputmask-alias="datetime"
                                        data-inputmask-inputformat="dd/mm/yyyy"
                                        data-mask autocomplete="ayrilma_tarihi">

                                    @error('ayrilma_tarihi')
                                    <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                          </span>
                                    @enderror

                                </div>

                            </div>

                        </div>
                        <div class="col-md-3">

                            <div class="form-group">
                                <label for="ayrilma_nedeni"> Ayrılma Nedeni </label>

                                <div class="input-group">

                                    <input
                                        type="text"
                                        id="ayrilma_nedeni"
                                        class="form-control @error('ayrilma_nedeni') is-invalid @enderror"
                                        value="{{$qualification->ayrilma_nedeni}}"
                                        name="ayrilma_nedeni"
                                        autocomplete="ayrilma_nedeni">

                                    @error('ayrilma_nedeni')
                                    <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                          </span>
                                    @enderror

                                </div>

                            </div>

                        </div>
                        <div class="col-md-3">

                            <div class="form-group">
                                <label for="register_date"> Kayıt Tarihi </label>

                                <div class="input-group">

                                    <input
                                        type="date"
                                        id="register_date"
                                        class="form-control @error('register_date') is-invalid @enderror"
                                        name="register_date"
                                        value="{{date('Y-m-d',strtotime($qualification->register_date))}}"
                                        data-inputmask-alias="datetime"
                                        data-inputmask-inputformat="dd/mm/yyyy"
                                        data-mask autocomplete="register_date">

                                    @error('register_date')
                                    <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                          </span>
                                    @enderror

                                </div>

                            </div>

                        </div>
                        <div class="col-md-3">

                            <div class="form-group">
                                <label for="hazirlik_okudum">Hazırlık okudum </label>

                                <div class="input-group">

                                    <select  class="form-control @error('hazirlik_okudum') is-invalid @enderror"   name="hazirlik_okudum" >
                                        <option value="1" {{ $qualification->hazirlik_okudum == 1 ? 'selected' :'' }}>Okudum</option>
                                        <option value="0" {{ $qualification->hazirlik_okudum == 0? 'selected' :'' }}>Okumadım</option>
                                    </select>

                                    @error('hazirlik_okudum')
                                    <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                          </span>
                                    @enderror

                                </div>

                            </div>

                        </div>
                        <div class="col-md-3">

                            <div class="form-group">
                                <label for="hazirlik_donem_sayi">Hazırlık dönem sayısı </label>

                                <div class="input-group">

                                    <input
                                        type="number"
                                        id="hazirlik_donem_sayi"
                                        class="form-control @error('hazirlik_donem_sayi') is-invalid @enderror"
                                        name="hazirlik_donem_sayi"
                                        value="{{$qualification->hazirlik_donem_sayi}}"
                                        autocomplete="hazirlik_donem_sayi">

                                    @error('hazirlik_donem_sayi')
                                    <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                          </span>
                                    @enderror

                                </div>

                            </div>

                        </div>

                        <div class="col-md-3">

                            <div class="form-group">
                                <label for="giris_turu">Giriş Türü </label>

                                <div class="input-group">

                                    <select  class="form-control @error('giris_turu') is-invalid @enderror"   name="giris_turu" >
                                        <option value="1">Sınavsız Geçiş</option>
                                    </select>

                                    @error('giris_turu')
                                    <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                          </span>
                                    @enderror

                                </div>

                            </div>

                        </div>

                        <div class="col-md-3">

                            <div class="form-group">
                                <label for="giris_puan_turu">Giriş Puan Türü</label>

                                <div class="input-group">
                                    <input
                                        type="text"
                                        id="giris_puan_turu"
                                        class="form-control @error('giris_puan_turu') is-invalid @enderror"
                                        name="giris_puan_turu"
                                        value="{{$qualification->giris_puan_turu}}"
                                        autocomplete="giris_puan_turu">
                                    @error('giris_puan_turu')
                                    <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                          </span>
                                    @enderror

                                </div>

                            </div>

                        </div>
                        <div class="col-md-3">

                            <div class="form-group">
                                <label for="giris_puan">Giriş Puan </label>

                                <div class="input-group">
                                    <input
                                        type="number"
                                        id="giris_puan"
                                        class="form-control @error('giris_puan') is-invalid @enderror"
                                        name="giris_puan"
                                        value="{{$qualification->giris_puan}}"
                                        autocomplete="giris_puan">
                                    @error('giris_puan')
                                    <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                          </span>
                                    @enderror

                                </div>

                            </div>

                        </div>
                        <div class="col-md-3">

                            <div class="form-group">
                                <label for="genel_not_ortalama">Genel Not Ortalama</label>

                                <div class="input-group">
                                    <input
                                        type="number"
                                        id="genel_not_ortalama"
                                        class="form-control @error('genel_not_ortalama') is-invalid @enderror"
                                        name="genel_not_ortalama"
                                        value="{{$qualification->genel_not_ortalama}}"
                                        autocomplete="genel_not_ortalama">
                                    @error('genel_not_ortalama')
                                    <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                          </span>
                                    @enderror

                                </div>

                            </div>

                        </div>
                        <div class="col-md-3">

                            <div class="form-group">
                                <label for="diploma_tur">Diploma Türü </label>

                                <div class="input-group">

                                    <select  class="form-control @error('diploma_tur') is-invalid @enderror"   name="diploma_tur">
                                        <option value="">Diploa turu gelecek</option>
                                    </select>

                                    @error('diploma_tur')
                                    <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                          </span>
                                    @enderror

                                </div>

                            </div>

                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="student_no">Diploma İstem Tarihi</label>

                                <div class="input-group">
                                    <input
                                        type="date"
                                        id="diplom_req_date"
                                        class="form-control @error('diplom_req_date') is-invalid @enderror"
                                        name="diplom_req_date"
                                        value="{{date('Y-m-d',strtotime($qualification->diplom_req_date))}}"
                                        data-inputmask-alias="date"
                                        data-inputmask-inputformat="dd/mm/yyyy"
                                        required  data-masks autocomplete="diplom_req_date">
                                    @error('diplom_req_date')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                            </div>

                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="diplom_confirm_date">Diploma Onay Tarihi</label>

                                <div class="input-group">
                                    <input
                                        type="date"
                                        id="diplom_confirm_date"
                                        class="form-control @error('diplom_confirm_date') is-invalid @enderror"
                                        name="diplom_confirm_date"
                                        value="{{date('Y-m-d',strtotime($qualification->diplom_confirm_date))}}"
                                        data-inputmask-alias="date"
                                        data-inputmask-inputformat="dd/mm/yyyy"
                                        required  data-masks autocomplete="diplom_confirm_date">
                                    @error('diplom_confirm_date')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                            </div>

                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="diplom_no">Diploma No</label>

                                <div class="input-group">
                                    <input
                                        type="text"
                                        id="diplom_no"
                                        class="form-control @error('diplom_no') is-invalid @enderror"
                                        name="diplom_no"
                                        value="{{$qualification->diplom_no}}"
                                        autocomplete="diplom_no">
                                    @error('diplom_no')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                            </div>

                        </div>



                        <div class="col-md-3">

                            <div class="form-group">
                                <label for="diploma_not">Diploma Not</label>

                                <div class="input-group">
                                    <input
                                        type="number"
                                        id="diploma_not"
                                        class="form-control @error('diploma_not') is-invalid @enderror"
                                        name="diploma_not"
                                        value="{{$qualification->diploma_not}}"
                                        autocomplete="diploma_not">
                                    @error('diploma_not')
                                    <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                          </span>
                                    @enderror

                                </div>

                            </div>

                        </div>

                        <div class="col-md-3">

                            <div class="form-group">
                                <label for="notes">Açıklama</label>

                                <div class="input-group">

                                    <input
                                        type="text"
                                        id="notes"
                                        class="form-control @error('notes') is-invalid @enderror"
                                        name="notes"
                                        value="{{$qualification->notes}}"
                                        autocomplete="notes">

                                    @error('notes')
                                    <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                          </span>
                                    @enderror

                                </div>

                            </div>

                        </div>
                        <div class="col-md-3">

                            <div class="form-group">
                                <label>Status</label>

                                <div class="input-group">
                                    <select  class="form-control @error('status') is-invalid @enderror"   name="status" required>
                                        <option value="1" {{$qualification->status == 1 ? 'selected' : ''}}>Aktif</option>
                                        <option value="0" {{$qualification->status == 0 ? 'selected' : ''}}>Pasif</option>
                                    </select>
                                    @error('status')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                            </div>

                        </div>
                    </div>
                    <div class="row float-right">
                        <div class="col-md-4">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Kaydet') }}
                            </button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>


@endsection
@section('css')
    <style>
        /*  Toggle Switch  */
        .toggleStatus {
            margin-bottom: 20px;
        }
        .toggleSwitch span span {
            display: none;
        }

        @media only screen {
            .toggleSwitch {
                display: inline-block;
                height: 18px;
                position: relative;
                overflow: visible;
                padding: 0;
                margin-left: 50px;
                cursor: pointer;
                width: 40px
            }
            .toggleSwitch * {
                -webkit-box-sizing: border-box;
                -moz-box-sizing: border-box;
                box-sizing: border-box;
            }
            .toggleSwitch label,
            .toggleSwitch > span {
                line-height: 20px;
                height: 20px;
                vertical-align: middle;
            }
            .toggleSwitch input:focus ~ a,
            .toggleSwitch input:focus + label {
                outline: none;
            }
            .toggleSwitch label {
                position: relative;
                z-index: 3;
                display: block;
                width: 100%;
            }
            .toggleSwitch input {
                position: absolute;
                opacity: 0;
                z-index: 5;
            }
            .toggleSwitch > span {
                position: absolute;
                left: -50px;
                width: 100%;
                margin: 0;
                padding-right: 50px;
                text-align: left;
                white-space: nowrap;
            }
            .toggleSwitch > span span {
                position: absolute;
                top: 0;
                left: 0;
                z-index: 5;
                display: block;
                width: 50%;
                margin-left: 50px;
                text-align: left;
                font-size: 0.9em;
                width: 100%;
                left: 15%;
                top: -1px;
                opacity: 0;
            }
            .toggleSwitch a {
                position: absolute;
                right: 50%;
                z-index: 4;
                display: block;
                height: 100%;
                padding: 0;
                left: 2px;
                width: 18px;
                background-color: #fff;
                border: 1px solid #CCC;
                border-radius: 100%;
                -webkit-transition: all 0.2s ease-out;
                -moz-transition: all 0.2s ease-out;
                transition: all 0.2s ease-out;
                box-shadow: 0 1px 2px rgba(0, 0, 0, 0.05);
            }
            .toggleSwitch > span span:first-of-type {
                color: #ccc;
                opacity: 1;
                left: 45%;
            }
            .toggleSwitch > span:before {
                content: '';
                display: block;
                width: 100%;
                height: 100%;
                position: absolute;
                left: 50px;
                top: -2px;
                background-color: #fafafa;
                border: 1px solid #ccc;
                border-radius: 30px;
                -webkit-transition: all 0.2s ease-out;
                -moz-transition: all 0.2s ease-out;
                transition: all 0.2s ease-out;
            }
            .toggleSwitch input:checked ~ a {
                border-color: #fff;
                left: 100%;
                margin-left: -8px;
            }
            .toggleSwitch input:checked ~ span:before {
                border-color: #0097D1;
                box-shadow: inset 0 0 0 30px #0097D1;
            }
            .toggleSwitch input:checked ~ span span:first-of-type {
                opacity: 0;
            }
            .toggleSwitch input:checked ~ span span:last-of-type {
                opacity: 1;
                color: #fff;
            }
            /* Switch Sizes */
            .toggleSwitch.large {
                width: 60px;
                height: 27px;
            }
            .toggleSwitch.large a {
                width: 27px;
            }
            .toggleSwitch.large > span {
                height: 29px;
                line-height: 28px;
            }
            .toggleSwitch.large input:checked ~ a {
                left: 41px;
            }
            .toggleSwitch.large > span span {
                font-size: 1.1em;
            }
            .toggleSwitch.large > span span:first-of-type {
                left: 50%;
            }
            .toggleSwitch.xlarge {
                width: 80px;
                height: 36px;
            }
            .toggleSwitch.xlarge a {
                width: 36px;
            }
            .toggleSwitch.xlarge > span {
                height: 38px;
                line-height: 37px;
            }
            .toggleSwitch.xlarge input:checked ~ a {
                left: 52px;
            }
            .toggleSwitch.xlarge > span span {
                font-size: 1.4em;
            }
            .toggleSwitch.xlarge > span span:first-of-type {
                left: 50%;
            }
        }


        /*  End Toggle Switch  */
    </style>
@stop
@push('other-scripts')
    <script>

    </script>
@endpush
