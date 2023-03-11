@extends('layouts.panel')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header p-4 pb-2">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('sections.index')}}">{{__('main.classes')}}</a></li>
                        <li class="breadcrumb-item"><a href="{{route('sections.edit',$section->id)}}">{{__('main.class_edit')}}</a></li>
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
                <h3 class="card-title">{{__('main.class_edit')}}</h3>
            </div>
            <div class="card-body">


                <form action="{{route('sections.update',$section->id)}}" method="post">

                    <div class="row">
                        <div class="col-md-4">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="name">{{__('main.class_name')}}</label>

                                <div class="input-group">

                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $section->name }}" required autocomplete="name" autofocus>

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                            </div>

                        </div>
                        <div class="col-md-4">

                            <div class="form-group">
                                <label for="name">{{__('main.description')}}</label>

                                <div class="input-group">

                                    <input id="description" type="text" class="form-control @error('description') is-invalid @enderror" name="description" value="{{ $section->description }}" required autocomplete="description" autofocus>

                                    @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                            </div>

                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="section_no">{{__('main.class_no')}}</label>

                                <div class="input-group">

                                    <input id="section_no" type="text" class="form-control @error('section_no') is-invalid @enderror" name="section_no" value="{{ $section->section_no}}" required autocomplete="section_no" autofocus>

                                    @error('section_no')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                            </div>

                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="theory_start_date">{{__('main.theory_start')}}</label>

                                <div class="input-group">

                                    <input id="theory_start_date" type="date" class="form-control @error('theory_start_date') is-invalid @enderror" name="theory_start_date" value="{{ date('Y-m-d',strtotime($section->theory_start_date )) }}" required autocomplete="theory_start_date" autofocus>

                                    @error('theory_start_date')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                            </div>

                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="theory_end_date">{{__('main.theory_end')}}</label>

                                <div class="input-group">

                                    <input id="theory_end_date" type="date" class="form-control @error('theory_end_date') is-invalid @enderror" name="theory_end_date" value="{{ date('Y-m-d',strtotime($section->theory_end_date)) }}" required autocomplete="theory_end_date" autofocus>

                                    @error('theory_end_date')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                            </div>

                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="practice_start_date">{{__('main.practice_start')}} </label>

                                <div class="input-group">

                                    <input id="practice_start_date" type="date" class="form-control @error('practice_start_date') is-invalid @enderror" name="practice_start_date" value="{{ date('Y-m-d',strtotime($section->practice_start_date)) }}" required autocomplete="practice_start_date" autofocus>

                                    @error('practice_start_date')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                            </div>

                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="practice_end_date">{{__('main.practice_end')}} </label>

                                <div class="input-group">

                                    <input id="practice_end_date" type="date" class="form-control @error('practice_end_date') is-invalid @enderror" name="practice_end_date" value="{{ date('Y-m-d'),strtotime($section->practice_end_date)}}" required autocomplete="practice_end_date" autofocus>

                                    @error('practice_end_date')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                            </div>

                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="ders_imza_end_date"> {{__('main.course_signature_end')}}</label>

                                <div class="input-group">

                                    <input id="ders_imza_end_date" type="date" class="form-control @error('ders_imza_end_date') is-invalid @enderror" name="ders_imza_end_date" value="{{ date('Y-m-d',strtotime($section->ders_imza_end_date ))}}" required autocomplete="ders_imza_end_date" autofocus>

                                    @error('ders_imza_end_date')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                            </div>

                        </div>
                        <div class="col-md-4">

                            <div class="form-group">
                                <label for="status">{{__('main.status')}}</label>

                                <div class="input-group">
                                    <select  class="form-control @error('status') is-invalid @enderror"   name="status" required>
                                        <option value="1"  {{ $section->status == 1 ? 'selected':''}}>{{__('main.active')}}</option>
                                        <option value="0"  {{ $section->status == 0 ? 'selected':''}}>{{__('main.passive')}}</option>
                                    </select>
                                    @error('status')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                            </div>

                        </div>
                        <div class="col-md-4">

                            <div class="form-group">
                                <label for="course_id">{{__('main.select_course')}}</label>

                                <div class="input-group">
                                    <select  class="form-control @error('course_id') is-invalid @enderror"   name="course_id" required>
                                        @foreach($courses as $course)
                                            <option value="{{$course->id}}" {{$course->id == $section->course_id ? 'selected':''}}>{{$course->name}}</option>
                                        @endforeach
                                    </select>
                                    @error('course_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                            </div>

                        </div>
                        <div class="col-md-4">

                            <div class="form-group">
                                <label for="instructor_user_id">{{__('main.select_instructor')}}</label>

                                <div class="input-group">
                                    <select  class="form-control @error('instructor_user_id') is-invalid @enderror"   name="instructor_user_id" required>
                                        @foreach($instructors as $instructor)
                                            <option value="{{$instructor->id}}" {{$instructor->id == $section->instructor_user_id ? 'selected':''}}>{{$instructor->name}}</option>
                                        @endforeach
                                    </select>
                                    @error('instructor_user_id')
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
