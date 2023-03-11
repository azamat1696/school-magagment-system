@extends('layouts.panel')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header p-4 pb-2">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('students.index')}}">{{__('main.students')}}</a></li>
                        <li class="breadcrumb-item"><a href="{{route('qualifications.create',$student->id)}}">{{__('main.student_qualification_create')}}</a></li>
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
                <h3 class="card-title">{{__('main.student_qualification_create')}}</h3>
            </div>
            <div class="card-body">


                <form action="{{route('qualifications.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">

                        <div class="col-md-3">

                            <div class="form-group">
                                <label for="student_id">{{__('main.name_surname')}}</label>

                                <div class="input-group">
                                    <input id="student_id" type="text" class="form-control @error('student_id') is-invalid @enderror"
                                           name="student_id"
                                           value="{{$student->id}}"
                                           required
                                           hidden
                                    >
                                    <input type="text" value="{{ $student->name.' '.$student->surname }}" class="form-control" disabled>
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
                                <label for="student_no">{{__('main.student_no')}}</label>
                                <div class="input-group">
                                    <input id="student_no" type="text" class="form-control @error('student_no') is-invalid @enderror"
                                           name="student_no"
                                           value="{{ old('student_no') }}"
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
                                <label for="departmnent_id">{{__('main.select_the_section_to_register')}}</label>
                                <div class="input-group">
                                    <select  class="form-control @error('departmnent_id') is-invalid @enderror"   name="departmnent_id" required>
                                        @foreach($departments as $department)
                                           <option value="{{$department->id}}">{{$department->name}}</option>
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
                                <label for="student_no">{{__('main.department_signature_end')}}</label>

                                <div class="input-group">
                                    <input
                                        type="date"
                                        id="depart_imza_end_date"
                                        class="form-control @error('depart_imza_end_date') is-invalid @enderror"
                                        name="depart_imza_end_date"
                                        data-inputmask-alias="date"
                                        data-inputmask-inputformat="dd/mm/yyyy"
                                        data-masks autocomplete="depart_imza_end_date">
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
                                <label for="islem_sira_no">{{__('main.que_number')}}</label>

                                <div class="input-group">
                                    <input
                                        type="text"
                                        id="islem_sira_no"
                                        class="form-control @error('islem_sira_no') is-invalid @enderror"
                                        name="islem_sira_no"
                                        required
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
                                <label for="student_no">{{__('main.meslekyeter_qualification_start_date')}}</label>

                                <div class="input-group">
                                    <input
                                        type="date"
                                        id="qualification_start_date"
                                        class="form-control @error('qualification_start_date') is-invalid @enderror"
                                        name="qualification_start_date"
                                        data-inputmask-alias="date"
                                        data-inputmask-inputformat="dd/mm/yyyy"
                                        data-masks autocomplete="qualification_start_date">
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
                                <label for="student_status">{{__('main.student_education_status')}}</label>
                                <div class="input-group">
                                    <select  class="form-control @error('student_status') is-invalid @enderror"   name="student_status" required>
                                        <option value="Aktif">{{__('main.active')}}</option>
                                        <option value="Pasif">{{__('main.passive')}}</option>
                                        <option value="OnKayitli">{{__('main.pre_registered')}}</option>
                                        <option value="KaydiSilinmis">{{__('main.deleted_registeration')}}</option>
                                        <option value="KayitDondurma">{{__('registretation_freezed')}}</option>
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
                                <label for="ogr_hakk">{{__('main.students_rights')}}</label>

                                <div class="input-group">
                                    <select  class="form-control @error('ogr_hakk') is-invalid @enderror"   name="ogr_hakk" required>
                                        <option value="HakkiVar">{{__('main.has_right')}}</option>
                                        <option value="HakkiYok">{{__('main.has_not_right')}}</option>
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
                                <label for="not_sistemi">{{__('main.grading_system')}}</label>

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
                                <label for="ayrilma_tarihi">  {{__('main.leaving_date')}} </label>

                                <div class="input-group">

                                    <input
                                        type="date"
                                        id="ayrilma_tarihi"
                                        class="form-control @error('ayrilma_tarihi') is-invalid @enderror"
                                        name="ayrilma_tarihi"
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
                                <label for="ayrilma_nedeni"> {{__('main.leaving_reason')}}</label>

                                <div class="input-group">

                                    <input
                                        type="text"
                                        id="ayrilma_nedeni"
                                        class="form-control @error('ayrilma_nedeni') is-invalid @enderror"
                                        name="ayrilma_nedeni"
                                        data-inputmask-alias="datetime"
                                        data-inputmask-inputformat="dd/mm/yyyy"
                                          data-mask autocomplete="ayrilma_nedeni">

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
                                <label for="register_date">{{__('main.register_date')}} </label>

                                <div class="input-group">

                                    <input
                                        type="date"
                                        id="register_date"
                                        class="form-control @error('register_date') is-invalid @enderror"
                                        name="register_date"
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
                                <label for="hazirlik_okudum">{{__('main.i_have_studied_preparation')}} </label>

                                <div class="input-group">

                                    <select  class="form-control @error('hazirlik_okudum') is-invalid @enderror"   name="hazirlik_okudum" >
                                        <option value="1">{{__('main.studied')}}</option>
                                        <option value="0" selected>{{__('main.i_have_not_studied')}}</option>
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
                                <label for="hazirlik_donem_sayi">{{__('main.preparation_season_count')}} </label>

                                <div class="input-group">

                                    <input
                                        type="number"
                                        id="hazirlik_donem_sayi"
                                        class="form-control @error('hazirlik_donem_sayi') is-invalid @enderror"
                                        name="hazirlik_donem_sayi"
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
                                <label for="giris_turu">{{__('main.register_type')}} </label>

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
                                <label for="giris_puan_turu">{{__('main.entry_score_type')}}</label>

                                <div class="input-group">
                                    <input
                                        type="text"
                                        id="giris_puan_turu"
                                        class="form-control @error('giris_puan_turu') is-invalid @enderror"
                                         name="giris_puan_turu"
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
                                <label for="giris_puan">{{__('main.entry_score')}}  </label>

                                <div class="input-group">
                                    <input
                                        type="number"
                                        id="giris_puan"
                                        class="form-control @error('giris_puan') is-invalid @enderror"
                                        name="giris_puan"
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
                                <label for="genel_not_ortalama">{{__('main.gpa')}}</label>

                                <div class="input-group">
                                    <input
                                        type="number"
                                        id="genel_not_ortalama"
                                        class="form-control @error('genel_not_ortalama') is-invalid @enderror"
                                        name="genel_not_ortalama"
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
                                <label for="diploma_tur">{{__('main.diploma_type')}} </label>

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
                                <label for="student_no">{{__('main.diploma_request_date')}}</label>

                                <div class="input-group">
                                    <input
                                        type="date"
                                        id="diplom_req_date"
                                        class="form-control @error('diplom_req_date') is-invalid @enderror"
                                        name="diplom_req_date"
                                        data-inputmask-alias="date"
                                        data-inputmask-inputformat="dd/mm/yyyy"
                                        data-masks autocomplete="diplom_req_date">
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
                                <label for="diplom_confirm_date">{{__('main.diploma_confirm_date')}}</label>

                                <div class="input-group">
                                    <input
                                        type="date"
                                        id="diplom_confirm_date"
                                        class="form-control @error('diplom_confirm_date') is-invalid @enderror"
                                        name="diplom_confirm_date"
                                        data-inputmask-alias="date"
                                        data-inputmask-inputformat="dd/mm/yyyy"
                                        data-masks autocomplete="diplom_confirm_date">
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
                                <label for="diplom_no">{{__('main.diploma_no')}}</label>

                                <div class="input-group">
                                    <input
                                        type="text"
                                        id="diplom_no"
                                        class="form-control @error('diplom_no') is-invalid @enderror"
                                        name="diplom_no"
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
                                <label for="diploma_not">{{__('main.diploma_grade')}}</label>

                                <div class="input-group">
                                    <input
                                        type="number"
                                        id="diploma_not"
                                        class="form-control @error('diploma_not') is-invalid @enderror"
                                        name="diploma_not"
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
                                <label for="notes">{{__('main.description')}}</label>

                                <div class="input-group">

                                    <input
                                        type="text"
                                        id="notes"
                                        class="form-control @error('notes') is-invalid @enderror"
                                        name="notes"
                                        data-inputmask-alias="datetime"
                                        data-inputmask-inputformat="dd/mm/yyyy"
                                          data-mask autocomplete="notes">

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
                                <label>{{__('main.status')}}</label>

                                <div class="input-group">
                                    <select  class="form-control @error('status') is-invalid @enderror"   name="status" required>
                                        <option value="1">{{__('main.active')}}</option>
                                        <option value="0">{{__('main.passive')}}</option>
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
                                {{ __('main.save') }}
                            </button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>


@endsection
@section('css')

@stop
@push('other-scripts')

@endpush
