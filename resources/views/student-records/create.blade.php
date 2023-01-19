@extends('layouts.panel')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header p-4 pb-2">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('student-records.index')}}"> Yıl & Dönemlik Kayıt</a></li>
                        <li class="breadcrumb-item"><a href="{{route('student-records.create',$student->id)}}">Öğrenci Yeterlilik Oluştur</a></li>
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
                <h3 class="card-title">{{__('Öğrenci Yeterlilik Oluştur')}}</h3>
            </div>
            <div class="card-body">


                <form action="{{route('student-records.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">

                        <div class="col-md-4">

                            <div class="form-group">
                                <label for="student_id">Öğrenci İsim & Soyismi</label>

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

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="academic_year_id">Kayıt Olacağı bölüm</label>
                                <div class="input-group">
                                    <select  class="form-control @error('academic_year_id') is-invalid @enderror"   name="academic_year_id" required>
                                        @foreach($academicYears as $academicYear)
                                            <option value="{{$academicYear->id}}">

                                                {{date('Y',strtotime($academicYear->BaslamaTarihi)).' - '.date('Y',strtotime($academicYear->BitisTarihi))}}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('academic_year_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                            </div>

                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="semester_id">Kayıt Olacağı Dönem</label>
                                <div class="input-group">
                                    <select  class="form-control @error('semester_id') is-invalid @enderror"   name="semester_id" required>
                                        @foreach($semesters as $semester)
                                            <option value="{{$semester->id}}">{{$semester->name}}</option>
                                        @endforeach
                                    </select>
                                    @error('semester_id')
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
                                        <option value="1">Aktif</option>
                                        <option value="0">Pasif</option>
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

@stop
@push('other-scripts')

@endpush
