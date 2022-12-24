@extends('layouts.panel')

@section('content')

    <div class="row p-5 card-gray">
        <!--  card -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">{{__('Sınıf Düzemnle')}}</h3>
            </div>
            <div class="card-body">


                <form action="{{route('classes.update',$item->id)}}" method="post">
                    <div class="row">
                        <div class="col-md-3">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="name">Ülke Adı</label>

                                <div class="input-group">

                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $item->name }}" required autocomplete="name" autofocus>

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
                                <label>Sınıf Gururbu Seçiniz</label>

                                <div class="input-group">
                                    <select  class="form-control @error('class_group_id') is-invalid @enderror"   name="class_group_id" required>
                                        @foreach($classGroups as $classGroup)
                                            <option value="{{$classGroup->id}}" {{$item->class_group_id == $classGroup->id ? 'selected' : ''}}>{{$classGroup->name}}</option>
                                        @endforeach
                                    </select>
                                    @error('class_group_id')
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
