@extends('layouts.panel')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header p-4 pb-2">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('departments.index')}}">{{__('main.departments')}}</a></li>
                        <li class="breadcrumb-item"><a href="{{route('departments.create')}}">{{__('main.department_create')}}</a></li>
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
                <h3 class="card-title">{{__('main.department_create')}}</h3>
            </div>
            <div class="card-body">


                <form action="{{route('departments.store')}}" method="post">
                    <div class="row">
                        <div class="col-md-4">
                        @csrf
                            <div class="form-group">
                                <label for="name">{{__('main.department_name')}}</label>

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
                        <div class="col-md-4">

                            <div class="form-group">
                                <label for="name">{{__('main.description')}}</label>

                                <div class="input-group">

                                    <input id="description" type="text" class="form-control @error('description') is-invalid @enderror" name="description" value="{{ old('description') }}" required autocomplete="description" autofocus>

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
                                <label for="department_no">{{__('main.department_no')}}</label>

                                <div class="input-group">

                                    <input id="department_no" type="text" class="form-control @error('department_no') is-invalid @enderror" name="department_no" value="{{ old('department_no') }}" required autocomplete="department_no" autofocus>

                                    @error('department_no')
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
                                        <option value="1">{{__('main.active')}}</option>
                                        <option value="0">{{__('main.passive')}}</option>
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
                                <label for="first_letter">{{__('main.the_first_letter_of_the_department_name')}}</label>

                                <div class="input-group">

                                    <input id="first_letter" type="text" class="form-control @error('first_letter') is-invalid @enderror" name="first_letter" value="{{ old('first_letter') }}" required autocomplete="first_letter" autofocus>

                                    @error('first_letter')
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
