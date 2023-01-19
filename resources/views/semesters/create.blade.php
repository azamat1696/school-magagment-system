@extends('layouts.panel')

@section('content')

    <div class="row p-5 card-gray">
        <!--  card -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">{{__('Akademic Yıl Oluştur')}}</h3>
            </div>
            <div class="card-body">


                <form action="{{route('semesters.store')}}" method="post">
                    <div class="row">
                        <div class="col-md-3">
                        @csrf
                            <div class="form-group">
                                <label for="name">Dönem Adı</label>

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
                            <!-- Date dd/mm/yyyy -->
                            <div class="form-group">
                                <label for="academic_years_id"> Akademik Yıl </label>

                                <div class="input-group">
                                    <select  class="form-control @error('academic_years_id') is-invalid @enderror"   name="academic_years_id" required>
                                        @foreach($years as $year)
                                            <option value="{{$year->id}}">{{ date('Y',strtotime($year->BaslamaTarihi)).' - '.date('Y',strtotime($year->BitisTarihi)) }}</option>
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

                            <div class="form-group">
                                <label for="status">Status</label>

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
    <script>

    </script>
@endpush
