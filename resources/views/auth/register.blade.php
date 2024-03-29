@extends('layouts.panel')

@section('content')

    <div class="row p-5 card-gray">
        <!--  card -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">{{__('main.user_create')}}</h3>
            </div>
            <div class="card-body">


                    <form action="{{route('register')}}" method="post" enctype="multipart/form-data">
                        <div class="row">
                        <div class="col-md-3">
                        @csrf
                            <!-- phone mask -->
                       <div class="form-group">
                                <label >{{__('main.name')}}</label>

                                <div class="input-group">
{{--                                    <div class="input-group-prepend">--}}
{{--                                        <span class="input-group-text"><i class="fas fa-"></i></span>--}}
{{--                                    </div>--}}
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <!-- /.input group -->
                            </div>
                            <!-- /.form group -->
                        </div>
                         <div class="col-md-3">
                            <!-- Date dd/mm/yyyy -->
                            <div class="form-group">
                                <label>{{__('main.email')}} </label>

                                <div class="input-group">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <!-- /.input group -->
                            </div>
                            <!-- /.form group -->

                        </div>
                         <div class="col-md-3">
                                <!-- Date dd/mm/yyyy -->
                                <div class="form-group">
                                    <label> {{__('main.password')}} </label>

                                    <div class="input-group">
                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" value="{{old('password')}}" name="password" required autocomplete="new-password">

                                        @error('password')
                                          <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                          </span>
                                         @enderror
                                    <!-- /.input group -->
                                </div>
                                <!-- /.form group -->
                            </div>

                        </div>
                         <div class="col-md-3">
                                <!-- Date dd/mm/yyyy -->
                                <div class="form-group">
                                    <label> {{__('main.password_confirmation')}} </label>

                                    <div class="input-group">
                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" value="{{old('password_confirmation')}}" required autocomplete="new-password">

                                    </div>
                                <!-- /.form group -->

                            </div>


                        </div>
                            <div class="col-md-3">
                                <!-- Date dd/mm/yyyy -->
                                <div class="form-group">
                                    <label for="KullaniciKodu"> {{__('main.user_no')}} </label>

                                    <div class="input-group">
                                        <input id="KullaniciKodu" type="text" class="form-control @error('KullaniciKodu') is-invalid @enderror" value="{{old('KullaniciKodu')}}" name="KullaniciKodu" required autocomplete="KullaniciKodu">

                                        @error('KullaniciKodu')
                                        <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                          </span>
                                    @enderror
                                    <!-- /.input group -->
                                    </div>
                                    <!-- /.form group -->
                                </div>

                            </div>
                            <div class="col-md-3">
                                <!-- Date dd/mm/yyyy -->
                                <div class="form-group">
                                    <label for="TelefonNo"> {{__('main.phone')}} </label>

                                    <div class="input-group">
                                        <input id="TelefonNo" type="text" class="form-control @error('TelefonNo') is-invalid @enderror" value="{{old('TelefonNo')}}" name="TelefonNo" required autocomplete="TelefonNo">

                                        @error('TelefonNo')
                                        <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                          </span>
                                    @enderror
                                    <!-- /.input group -->
                                    </div>
                                    <!-- /.form group -->
                                </div>

                            </div>
                            <div class="col-md-3">
                                <!-- Date dd/mm/yyyy -->
                                <div class="form-group">
                                    <label for="Adres"> {{__('main.address')}} </label>

                                    <div class="input-group">
                                        <input id="Adres" type="text" class="form-control @error('Adres') is-invalid @enderror" name="Adres" value="{{old('Adres')}}"  required autocomplete="Adres">

                                        @error('Adres')
                                        <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                          </span>
                                    @enderror
                                    <!-- /.input group -->
                                    </div>
                                    <!-- /.form group -->
                                </div>

                            </div>

                            <div class="col-md-3">
                                <!-- Date dd/mm/yyyy -->
                                <div class="form-group">
                                    <label> {{__('main.user_authority')}} </label>

                                    <div class="input-group">
                                         <select  class="form-control @error('KullaniciTipi') is-invalid @enderror"   name="KullaniciTipi" required>
                                            @foreach(\Spatie\Permission\Models\Role::all() as $role)
                                            <option value="{{$role->name}}">{{$role->name}}</option>
                                            @endforeach
                                        </select>
                                        @error('KullaniciTipi')
                                        <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                          </span>
                                    @enderror
                                    </div>
                                </div>

                            </div>
                            <div class="col-md-3">
                                <!-- Date dd/mm/yyyy -->
                                <div class="form-group">
                                    <label for="Cinsiyet"> {{__('main.gender')}} </label>

                                    <div class="input-group">
                                        <select name="Cinsiyet" id="Cinsiyet" class="form-control @error('password') is-invalid @enderror" required>
                                            <option value="Erkek">{{__('main.male')}}</option>
                                            <option value="Kadin">{{__('main.female')}}</option>
                                        </select>
                                        @error('Cinsiyet')
                                        <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                          </span>
                                    @enderror
                                    <!-- /.input group -->
                                    </div>
                                    <!-- /.form group -->
                                </div>

                            </div>

                            <div class="col-md-3">
                                <!-- Date dd/mm/yyyy -->
                                <div class="form-group">
                                    <label> {{__('main.birth_date')}}</label>

                                    <div class="input-group">

                                        <input type="date" id="DogumTarihi" class="form-control @error('DogumTarihi') is-invalid @enderror"    name="DogumTarihi"  data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy"  required  data-mask autocomplete="DogumTarihi">

                                        @error('DogumTarihi')
                                        <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                          </span>
                                    @enderror

                                    </div>

                                </div>

                            </div>


                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="ProfilResim"> {{__('main.profile_image')}}</label>

                                    <div class="input-group">
                                        <input id="ProfilResim"   type="file" class="form-control @error('ProfilResim')   is-invalid @enderror" name="ProfilResim">

                                        @error('ProfilResim')
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

