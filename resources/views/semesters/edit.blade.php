@extends('layouts.panel')

@section('content')

    <div class="row p-5 card-gray">
        <!--  card -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">{{__('main.academic_year_create')}}</h3>
            </div>
            <div class="card-body">


                <form action="{{route('semesters.update',$semesters->id)}}" method="post">
                    <div class="row">
                        <div class="col-md-3">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="name">{{__('main.semester_name')}}</label>

                                <div class="input-group">

                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $semesters->name }}" required autocomplete="name" autofocus>

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
                                <label> {{__('main.academic_year')}} </label>

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
                                <label>{{__('main.status')}}</label>

                                <div class="input-group">
                                    <select  class="form-control @error('status') is-invalid @enderror"   name="status" required>
                                        <option value="1" {{$semesters->status == 1 ? 'selected': ''}}>{{__('main.active')}}</option>
                                        <option value="0" {{$semesters->status == 0 ? 'selected': ''}}>{{__('main.passive')}}</option>
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

    </script>
@endpush
