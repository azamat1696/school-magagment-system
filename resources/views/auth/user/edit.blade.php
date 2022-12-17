@extends('layouts.panel')

@section('content')

    <div class="row p-5 card-gray">
        <!--  card -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">{{__('Kulanıcılar Düzenle')}}</h3>
            </div>
            <div class="card-body">


                <form action="{{route('user.update',$user->id)}}" method="post" enctype="multipart/form-data">

                    <div class="row">
                        <div class="col-3">
                        @csrf
                        @method('PUT')
                        <!-- phone mask -->
                            <div class="form-group">
                                <label >İsim </label>

                                <div class="input-group">
                                    {{--                                    <div class="input-group-prepend">--}}
                                    {{--                                        <span class="input-group-text"><i class="fas fa-"></i></span>--}}
                                    {{--                                    </div>--}}
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $user->name }}" required autocomplete="name" autofocus>

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
                        <div class="col-3">
                            <!-- Date dd/mm/yyyy -->
                            <div class="form-group">
                                <label> E-posta </label>

                                <div class="input-group">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $user->email }}" required autocomplete="email">

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
                        <div class="col-3">
                            <!-- Date dd/mm/yyyy -->
                            <div class="form-group">
                                <label> Şifre </label>

                                <div class="input-group">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password"   autocomplete="new-password">

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

                        <div class="col-3">
                            <!-- Date dd/mm/yyyy -->
                            <div class="form-group">
                                <label for="KullaniciKodu"> Kullanıcı Kodu </label>

                                <div class="input-group">
                                    <input id="KullaniciKodu" type="text" class="form-control @error('KullaniciKodu') is-invalid @enderror" name="KullaniciKodu" value="{{$user->KullaniciKodu}}" required autocomplete="KullaniciKodu">

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
                        <div class="col-3">
                            <!-- Date dd/mm/yyyy -->
                            <div class="form-group">
                                <label for="TelefonNo"> Telefon Numara </label>

                                <div class="input-group">
                                    <input id="TelefonNo" type="text" class="form-control @error('TelefonNo') is-invalid @enderror" name="TelefonNo" value="{{$user->TelefonNo}}" autocomplete="TelefonNo">

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
                        <div class="col-3">
                            <!-- Date dd/mm/yyyy -->
                            <div class="form-group">
                                <label for="Adres"> Adres </label>

                                <div class="input-group">
                                    <input id="Adres" type="text" class="form-control @error('Adres') is-invalid @enderror" name="Adres" value="{{$user->Adres}}"  autocomplete="Adres">

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

                        <div class="col-3">
                            <!-- Date dd/mm/yyyy -->
                            <div class="form-group">
                                <label> Kullanıcı Yetkisi </label>

                                <div class="input-group">
                                    <select  class="form-control @error('KullaniciTipi') is-invalid @enderror" name="KullaniciTipi" required>
                                        @foreach(\Spatie\Permission\Models\Role::all() as $role)
                                            <option value="{{$role->name}}" {{ $user->getRoleNames()[0] === $role->name ? 'selected' : '' }}>{{$role->name}}</option>
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
                        <div class="col-3">
                            <!-- Date dd/mm/yyyy -->
                            <div class="form-group">
                                <label for="Cinsiyet"> Cinsiyet </label>

                                <div class="input-group">
                                    <select name="Cinsiyet" id="Cinsiyet" class="form-control @error('password') is-invalid @enderror" >
                                        <option value="Erkek" {{ $user->Cinsiyet === 'Erkek' ? 'selected' : '' }} >Erkek</option>
                                        <option value="Kadin"  {{ $user->Cinsiyet === 'Kadin' ? 'selected' : '' }}>Kadın</option>
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

                        <div class="col-3">
                            <!-- Date dd/mm/yyyy -->
                            <div class="form-group">
                                <label> Doğum Tarihi </label>

                                <div class="input-group">

                                    <input type="date" id="DogumTarihi" class="form-control @error('password') is-invalid @enderror" name="DogumTarihi" value="{{$user->DogumTarihi}}"  data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy"  required  data-mask autocomplete="DogumTarihi">

                                    @error('DogumTarihi')
                                    <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                          </span>
                                    @enderror

                                </div>

                            </div>

                        </div>

                        <div class="col-3">
                            <div class="form-group">
                                <label for="ProfilResim"> Profil Resmi </label>

                                <div class="input-group">
                                    <input id="ProfilResim"   type="file" class="form-control @error('ProfilResim')  is-invalid @enderror" value="{{$user->ProfilResim}}"  name="ProfilResim">

                                    @error('ProfilResim')
                                    <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                          </span>
                                    @enderror
                                </div>

                            </div>

                        </div>
                        <div class="col-3">
                            <div>
                                <img src="{{asset('panel-images').'/'.$user->ProfilResim}}" width="100px" height="100px" alt="">
                            </div>
                        </div>
{{--                        <div class="col-3">--}}
{{--                            <div class="form-group">--}}
{{--                                <label for="ProfilResim"> Kullanıcı Staüsü </label>--}}
{{--                                <div class="input-group">--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
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


