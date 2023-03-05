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
                <h3 class="card-title">{{__('main.create_student')}}</h3>
            </div>
            <div class="card-body">


                <form action="{{route('students.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <h4 class="text-bold col-12 text-center">{{__('main.personal_information')}}</h4>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="name">{{__('main.name')}}</label>

                                <div class="input-group">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

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
                                    <input id="surname " type="text" class="form-control @error('surname') is-invalid @enderror" name="surname" value="{{ old('surname') }}" required autocomplete="surname" autofocus>

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
                                           name="other_names" value="{{ old('other_names') }}"
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
                                <label for="identity_no">{{__('main.identify_no')}}</label>

                                <div class="input-group">
                                    <input id="identity_no "
                                           type="text"
                                           class="form-control @error('identity_no') is-invalid @enderror"
                                           name="identity_no" value="{{ old('identity_no') }}"
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
                                           name="passport_no" value="{{ old('passport_no') }}"
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
                                        <option value="Male">{{__('main.male')}}</option>
                                        <option value="Female">{{__('main.female')}}</option>
                                        <option value="others">{{__('main.other')}}</option>
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
                                           name="email" value="{{ old('email') }}"
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
                                <label for="phone_no">1. {{__('main.phone')}}</label>
                                <div class="input-group">
                                    <input id="phone_no"
                                           type="text"
                                           class="form-control @error('phone_no') is-invalid @enderror"
                                           name="phone_no" value="{{ old('phone_no') }}"
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
                                <label for="phone_no_1">2. {{__('main.phone')}}</label>
                                <div class="input-group">
                                    <input id="phone_no_1"
                                           type="text"
                                           class="form-control @error('phone_no_1') is-invalid @enderror"
                                           name="phone_no_1" value="{{ old('phone_no_1') }}"
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
                                           name="phone_no_2" value="{{ old('phone_no_2') }}"
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
                                        name="place_of_birth" value="{{ old('place_of_birth') }}"
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
                                    <input id="father_name " type="text" class="form-control @error('father_name') is-invalid @enderror" name="father_name" value="{{ old('father_name') }}" required autocomplete="father_name" autofocus>

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
                                    <input id="mother_name" type="text" class="form-control @error('mother_name') is-invalid @enderror" name="mother_name" value="{{ old('mother_name') }}" required autocomplete="mother_name" autofocus>

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
                                <label for="address">{{ __('main.address') }} (KKTC)</label>

                                <div class="input-group">
                                    <input id="address "
                                           type="text"
                                           class="form-control @error('address') is-invalid @enderror"
                                           name="address" value="{{ old('address') }}"
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
                                        <option value="A+">A+</option>
                                        <option value="A-">A-</option>
                                        <option value="B+">B+</option>
                                        <option value="B-">B-</option>
                                        <option value="AB+">AB+</option>
                                        <option value="Ab-">Ab-</option>
                                        <option value="O+">O+</option>
                                        <option value="O-">O-</option>
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
                                        <option value="{{$country->id}}"> {{$country->name}}</option>
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
                                <label for="student_photo">{{__('main.student_profile_picture')}}</label>
                                <div class="input-group">
                                    <input id="student_photo"   type="file" class="form-control @error('student_photo')   is-invalid @enderror" name="student_photo">

                                    @error('student_photo')
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
