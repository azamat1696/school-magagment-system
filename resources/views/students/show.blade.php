@extends('layouts.panel')

@section('content')

    <div class="row p-5 card-gray">
        <!--  card -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">{{__('Öğrenci Oluştur')}}</h3>
            </div>
            <div class="card-body">


                <form action="{{route('students.store')}}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-md-2">
                            <div class="row">

                                <label for="imgInput">
                                    <img src="" id="previewImage" alt="" height="150px" width="150px" style="border-radius: 3px">
                                    <input id="imgInput" type="file" style="display: none" onchange="readUrl(this)" name="StudentPhoto">
                                </label>

                            </div>

                        </div>
                        <div class="col-md-4">

                            <div class="form-group">
                                <label for="DiplomaAdi">İsim</label>

                                <div class="input-group">
                                    <input id="DiplomaAdi" type="text" class="form-control @error('DiplomaAdi') is-invalid @enderror" name="DiplomaAdi" value="{{ old('DiplomaAdi') }}" required autocomplete="DiplomaAdi" autofocus>

                                    @error('DiplomaAdi')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                            </div>

                        </div>
                        <div class="col-md-3">

                            <div class="form-group">
                                <label for="DiplomaSoyadi">Soyisim</label>

                                <div class="input-group">
                                    <input id="DiplomaSoyadi " type="text" class="form-control @error('DiplomaSoyadi') is-invalid @enderror" name="DiplomaSoyadi" value="{{ old('DiplomaSoyadi') }}" required autocomplete="DiplomaSoyadi" autofocus>

                                    @error('DiplomaSoyadi')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                            </div>

                        </div>
                        <div class="col-md-3">

                            <div class="form-group">
                                <label for="AnneAdi">Anne Adı</label>

                                <div class="input-group">
                                    <input id="AnneAdi " type="text" class="form-control @error('AnneAdi') is-invalid @enderror" name="AnneAdi" value="{{ old('AnneAdi') }}" required autocomplete="AnneAdi" autofocus>

                                    @error('AnneAdi')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                            </div>

                        </div>
                        <div class="col-md-3">

                            <div class="form-group">
                                <label for="BabaAdi">Baba Adı</label>

                                <div class="input-group">
                                    <input id="BabaAdi" type="text" class="form-control @error('BabaAdi') is-invalid @enderror" name="BabaAdi" value="{{ old('BabaAdi') }}" required autocomplete="BabaAdi" autofocus>

                                    @error('BabaAdi')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                            </div>

                        </div>
                        <div class="col-md-3">

                            <div class="form-group">
                                <label for="KimlikNo">Kimlik No</label>

                                <div class="input-group">
                                    <input id="KimlikNo" type="text" class="form-control @error('KimlikNo') is-invalid @enderror" name="KimlikNo" value="{{ old('KimlikNo') }}" required autocomplete="KimlikNo" autofocus>

                                    @error('KimlikNo')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                            </div>

                        </div>
                        <div class="col-md-3">

                            <div class="form-group">
                                <label for="PassportNo">Passaport No</label>

                                <div class="input-group">
                                    <input id="PassportNo" type="text"
                                           class="form-control @error('PassportNo') is-invalid @enderror"
                                           name="PassportNo" value="{{ old('PassportNo') }}"
                                           required autocomplete="PassportNo"
                                           autofocus
                                    >

                                    @error('PassportNo')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                            </div>

                        </div>
                        <div class="col-md-3">

                            <div class="form-group">
                                <label for="Cinsiyet">Cinsiyet</label>

                                <div class="input-group">
                                    <select name="Cinsiyet" id="Cinsiyet" class="form-control @error('password') is-invalid @enderror" required>
                                        <option value="Erkek">Erkek</option>
                                        <option value="Kadin">Kadın</option>
                                    </select>

                                    @error('PassportNo')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                            </div>

                        </div>
                        <div class="col-md-3">

                            <div class="form-group">
                                <label for="Cinsiyet">Uyruk</label>

                                <div class="input-group">
                                    <select name="Uyruk" id="Uyruk" class="form-control @error('Uyruk') is-invalid @enderror" required>
                                        <option value="Tkm">Türkmenistan</option>
                                        <option value="Gr">Almanya</option>
                                        <option value="USA">Amerika</option>
                                    </select>

                                    @error('Uyruk')
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
                                    <select  class="form-control @error('Statu') is-invalid @enderror"   name="Statu" required>
                                        <option value="1">Aktif</option>
                                        <option value="0">Pasif</option>
                                    </select>
                                    @error('Statu')
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
    <script>
function readUrl(input){
    if(input.files && input.files[0])
    {
        var reader = new FileReader();
        reader.onload = function (e) {
            $('#previewImage').attr('src',e.target.result)
        };
        reader.readAsDataURL(input.files[0])
    }
}
    </script>
@endpush
