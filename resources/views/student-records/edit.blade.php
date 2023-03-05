@extends('layouts.panel')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header p-4 pb-2">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('student-records.index')}}">{{__('main.academic_year_semester_register')}}</a></li>
                        <li class="breadcrumb-item"><a href="{{route('student-records.edit',$studentRecord->id)}}">{{__('main.academic_year_semester_register_create')}}</a></li>
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
                <h3 class="card-title">{{__('main.edit')}}</h3>
            </div>
            <div class="card-body">


                <form action="{{route('student-records.update',$studentRecord->id)}}" method="post">
                    @csrf
                    @method('PUT')

                    <div class="row">

                        <div class="col-md-3">

                            <div class="form-group">
                                <label for="student_id">{{__('main.student_name_surname')}}</label>
                                <div class="input-group">
                                    <select  class="form-control js-example-tags @error('student_id') is-invalid @enderror"   name="student_id">
                                        @foreach($students as $student)
                                            <option value="{{$student->id}}" {{$studentRecord->student_id == $student->id ? 'selected':''}}>{{$student->name.' '.$student->surname}}</option>
                                        @endforeach
                                    </select>

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
                                <label for="academic_year_id">{{__('main.select_the_section_to_register')}}</label>
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
                                <label for="semester_id">{{__('main.select_the_department_to_register')}}</label>
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
                        <div class="col-md-4">

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

        <script>
            $(function () {
            $(".js-example-tags").select2({
                tags: true
            });
        })
    </script>

@endpush
