@extends('layouts.panel')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header p-4 pb-2">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('students.index')}}">{{__('main.classes')}}</a></li>
                        <li class="breadcrumb-item"><a href="{{route('students.create')}}">{{__('main.create_class')}}</a></li>
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
                <h3 class="card-title">{{__('main.student_profile_update')}}</h3>
            </div>
            <div class="card-body">


                <form action="{{route('students.update',$student->id)}}" method="post" enctype="multipart/form-data">

                    <div class="row">
                        @csrf
                        @method('put')
                        <h4 class="text-bold col-12 text-center">{{__('main.personal_information')}}</h4>
                        <div class="col-md-3 border-right">
                            <div class="d-flex flex-column align-items-center text-center  "><img class="rounded-circle " width="100px" src="{{asset('student-images').'/'.$student->student_photo}}"> </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="name">{{__('main.name')}}</label>

                                <div class="input-group">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $student->name }}" required autocomplete="name" autofocus>

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                            </div>

                        </div>
                        <div class="col-md-3">

                            <div class="form-group">
                                <label for="surname">{{__('main.surname')}}</label>

                                <div class="input-group">
                                    <input id="surname " type="text" class="form-control @error('surname') is-invalid @enderror" name="surname" value="{{ $student->surname }}" required autocomplete="surname" autofocus>

                                    @error('surname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                            </div>

                        </div>

                        <div class="col-md-3">

                            <div class="form-group">
                                <label for="other_names">{{__('main.other_name')}}</label>

                                <div class="input-group">
                                    <input id="other_names "
                                           type="text"
                                           class="form-control @error('other_names') is-invalid @enderror"
                                           name="other_names" value="{{ $student->other_names  }}"
                                           autocomplete="other_names" autofocus>

                                    @error('other_names')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                            </div>

                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="student_photo">{{__('main.student_profile_picture')}} </label>
                                <div class="input-group">
                                    <input id="student_photo"   type="file" class="form-control @error('student_photo')    is-invalid @enderror" value="{{$student->student_photo}}" name="student_photo">

                                    @error('student_photo')
                                    <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                          </span>
                                    @enderror
                                </div>
                            </div>

                        </div>
                        <div class="col-md-3">

                            <div class="form-group">
                                <label for="identity_no">{{__('main.identify_no')}}</label>

                                <div class="input-group">
                                    <input id="identity_no "
                                           type="text"
                                           class="form-control @error('identity_no') is-invalid @enderror"
                                           name="identity_no" value="{{ $student->identity_no }}"
                                           required autocomplete="identity_no" autofocus>

                                    @error('identity_no')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                            </div>

                        </div>
                        <div class="col-md-3">

                            <div class="form-group">
                                <label for="identity_no">{{__('main.passport_no')}}</label>

                                <div class="input-group">
                                    <input id="passport_no "
                                           type="text"
                                           class="form-control @error('passport_no') is-invalid @enderror"
                                           name="passport_no" value="{{ $student->passport_no}}"
                                           autocomplete="passport_no" autofocus>

                                    @error('passport_no')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                            </div>

                        </div>

                        <div class="col-md-3">

                            <div class="form-group">
                                <label for="gender">{{__('main.gender')}}</label>

                                <div class="input-group">
                                    <select  class="form-control @error('gender') is-invalid @enderror"   name="gender" required>
                                        <option value="Male" {{$student->gender == 'Male' ? 'selected' : ''}}>{{__('main.male')}}</option>
                                        <option value="Female" {{$student->gender == 'Female' ? 'selected' : ''}}>{{__('main.female')}}</option>
                                        <option value="others" {{$student->gender == 'others' ? 'selected' : ''}}>{{__('main.other')}}</option>
                                    </select>
                                    @error('status')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                            </div>

                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="email">{{__('main.email')}}</label>
                                <div class="input-group">
                                    <input id="email "
                                           type="email"
                                           class="form-control @error('email') is-invalid @enderror"
                                           name="email" value="{{ $student->email }}"
                                           autocomplete="Email" autofocus>

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                            </div>

                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="phone_no">1.{{__('main.phone')}}</label>
                                <div class="input-group">
                                    <input id="phone_no"
                                           type="text"
                                           class="form-control @error('phone_no') is-invalid @enderror"
                                           name="phone_no" value="{{ $student->phone_no }}"
                                           required autocomplete="phone_no" autofocus>

                                    @error('phone_no')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                            </div>

                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="phone_no_1">2. {{ __('main.phone')}}</label>
                                <div class="input-group">
                                    <input id="phone_no_1"
                                           type="text"
                                           class="form-control @error('phone_no_1') is-invalid @enderror"
                                           name="phone_no_1" value="{{ $student->phone_no_1 }}"
                                           autocomplete="phone_no_1" autofocus>

                                    @error('phone_no_1')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                            </div>

                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="phone_no_2">3. {{__('main.phone')}}</label>
                                <div class="input-group">
                                    <input id="phone_no_2"
                                           type="text"
                                           class="form-control @error('phone_no_2') is-invalid @enderror"
                                           name="phone_no_2" value="{{ $student->phone_no_2 }}"
                                           autocomplete="phone_no_2" autofocus>

                                    @error('phone_no_2')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                            </div>

                        </div>

                        <div class="col-md-3">

                            <div class="form-group">
                                <label for="birth_date"> {{__('main.birth_date')}} </label>

                                <div class="input-group">

                                    <input
                                        type="date"
                                        id="birth_date"
                                        class="form-control @error('birth_date') is-invalid @enderror"
                                        name="birth_date"
                                        value="{{date('Y-m-d',strtotime($student->birth_date))}}"
                                        data-inputmask-alias="datetime"
                                        data-inputmask-inputformat="dd/mm/yyyy"
                                        required  data-mask autocomplete="birth_date">

                                    @error('birth_date')
                                    <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                          </span>
                                    @enderror

                                </div>

                            </div>

                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label> {{__('main.birth_place')}} </label>

                                <div class="input-group">

                                    <input
                                        id="place_of_birth"
                                        type="text"
                                        class="form-control @error('place_of_birth') is-invalid @enderror"
                                        name="place_of_birth" value="{{ $student->place_of_birth }}"
                                        required autocomplete="place_of_birth" autofocus>


                                    @error('place_of_birth')
                                    <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                          </span>
                                    @enderror

                                </div>

                            </div>

                        </div>

                        <div class="col-md-3">

                            <div class="form-group">
                                <label for="father_name">{{__('main.fathers_name')}}</label>

                                <div class="input-group">
                                    <input id="father_name " type="text" class="form-control @error('father_name') is-invalid @enderror" name="father_name" value="{{ $student->father_name }}" required autocomplete="father_name" autofocus>

                                    @error('father_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                            </div>

                        </div>

                        <div class="col-md-3">

                            <div class="form-group">
                                <label for="mother_name">{{__('main.mothers_name')}}</label>

                                <div class="input-group">
                                    <input id="mother_name" type="text" class="form-control @error('mother_name') is-invalid @enderror" name="mother_name" value="{{ $student->mother_name  }}" required autocomplete="mother_name" autofocus>

                                    @error('mother_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                            </div>

                        </div>
                        <div class="col-md-3">

                            <div class="form-group">
                                <label for="address">{{__('main.address')}} (KKTC)</label>

                                <div class="input-group">
                                    <input id="address "
                                           type="text"
                                           class="form-control @error('address') is-invalid @enderror"
                                           name="address" value="{{ $student->address }}"
                                           required autocomplete="address" autofocus>

                                    @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                            </div>

                        </div>

                        <div class="col-md-3">

                            <div class="form-group">
                                <label for="blood_group">{{__('main.blood_group')}}</label>

                                <div class="input-group">
                                    <select name="blood_group" id="blood_group" class="form-control @error('blood_group') is-invalid @enderror" required>
                                        <option value="A+" {{ $student->blood_group == 'A+' ? 'selected' : '' }}>A+</option>
                                        <option value="A-" {{ $student->blood_group == 'A-' ? 'selected' : '' }}>A-</option>
                                        <option value="B+" {{ $student->blood_group == 'B+' ? 'selected' : '' }}>B+</option>
                                        <option value="B-" {{ $student->blood_group == 'B-' ? 'selected' : '' }}>B-</option>
                                        <option value="AB+" {{ $student->blood_group == 'AB+' ? 'selected' : '' }}>AB+</option>
                                        <option value="Ab-" {{ $student->blood_group == 'Ab-' ? 'selected' : '' }}>Ab-</option>
                                        <option value="O+" {{ $student->blood_group == 'O+' ? 'selected' : '' }}>O+</option>
                                        <option value="O-" {{ $student->blood_group == 'O-' ? 'selected' : '' }}>O-</option>
                                    </select>

                                    @error('blood_group')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                            </div>

                        </div>
                        <div class="col-md-3">

                            <div class="form-group">
                                <label for="country_id">{{__('main.countries')}}</label>

                                <div class="input-group">
                                    <select name="country_id" id="country_id" class="form-control @error('country_id') is-invalid @enderror" required>
                                        @foreach($countries as $country)
                                            <option value="{{$country->id}}" {{$student->country_id == $country->id ? 'selected' : '' }}> {{$country->name}}</option>
                                        @endforeach
                                    </select>

                                    @error('country_id')
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
                                        <option value="1" {{ $student->status == 1 ? 'selected' : '' }}>{{__('main.active')}}</option>
                                        <option value="0" {{ $student->status == 0 ? 'selected' : '' }}>{{__('main.passive')}}</option>
                                    </select>
                                    @error('status')
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
                                        value="{{$student->notes}}"
                                        autocomplete="notes">

                                    @error('notes')
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
                                {{ __('save') }}
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
