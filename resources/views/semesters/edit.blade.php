@extends('layouts.panel')

@section('content')

    <div class="row p-5 card-gray">
        <!--  card -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">{{__('Akademic Yıl Oluştur')}}</h3>
            </div>
            <div class="card-body">


                <form action="{{route('semesters.update',$semesters->id)}}" method="post">
                    <div class="row">
                        <div class="col-md-3">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="DonemAdi">Dönem Adı</label>

                                <div class="input-group">

                                    <input id="DonemAdi" type="text" class="form-control @error('DonemAdi') is-invalid @enderror" name="DonemAdi" value="{{ $semesters->DonemAdi }}" required autocomplete="DonemAdi" autofocus>

                                    @error('DonemAdi')
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
                                <label> Akademik Yıl </label>

                                <div class="input-group">
                                    <select  class="form-control @error('academic_years_id') is-invalid @enderror"   name="academic_years_id" required>
                                        @foreach($years as $year)
                                            <option value="{{$year->id}}" {{ $year->id == $semesters->academic_years->id ? 'selected':'' }}>{{ date('Y',strtotime($year->BaslamaTarihi)).' - '.date('Y',strtotime($year->BitisTarihi)) }}</option>
                                        @endforeach
                                    </select>
                                    @error('academic_years_id')
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
                                <label>Status</label>

                                <div class="input-group">
                                    <select  class="form-control @error('Statu') is-invalid @enderror"   name="Statu" required>
                                        <option value="1" {{$semesters->Statu == 1 ? 'selected': ''}}>Aktif</option>
                                        <option value="0" {{$semesters->Statu == 0 ? 'selected': ''}}>Pasif</option>
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

    </script>
@endpush
