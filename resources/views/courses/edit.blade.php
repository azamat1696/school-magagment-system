@extends('layouts.panel')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header p-4 pb-2">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('courses.index')}}">{{__('main.courses')}}</a></li>
                        <li class="breadcrumb-item"><a href="{{route('courses.edit',$item->id)}}">{{__('main.course_create')}}</a></li>
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
                <h3 class="card-title">{{__('main.course_edit')}}</h3>
            </div>
            <div class="card-body">


                <form action="{{route('courses.update',$item->id)}}" method="post">

                    <div class="row">
                        <div class="col-md-4">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="name">{{__('main.course_name')}}</label>

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
                                <label for="course_no">{{__('main.course_no')}}</label>

                                <div class="input-group">

                                    <input id="course_no" type="text" class="form-control @error('course_no') is-invalid @enderror" name="course_no" value="{{ $item->course_no  }}" required autocomplete="course_no" autofocus>

                                    @error('course_no')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                            </div>

                        </div>
                        <div class="col-md-4">

                            <div class="form-group">
                                <label for="description">{{__('main.description')}}</label>

                                <div class="input-group">

                                    <input id="description" type="text" class="form-control @error('description') is-invalid @enderror" name="description" value="{{ $item->description }}" required autocomplete="description" autofocus>

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
                                <label>{{__('main.select_department')}}</label>

                                <div class="input-group">
                                    <select  class="form-control @error('department_id') is-invalid @enderror"   name="department_id" required>
                                        @foreach($departments as $department)
                                            <option value="{{$department->id}}" {{ $department->id == $item->department_id ? 'selected' : '' }} >{{$department->name}}</option>
                                        @endforeach
                                    </select>
                                    @error('department_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                            </div>

                        </div>

                        <div class="col-md-4">

                            <div class="form-group">
                                <label for="Status">{{__('main.status')}}</label>

                                <div class="input-group">
                                    <select  class="form-control @error('status') is-invalid @enderror"   name="status" required>
                                        <option value="1" {{$item->status == 1 ? 'selected':''}}>{{__('main.active')}}</option>
                                        <option value="0" {{$item->status == 0 ? 'selected':''}}>{{__('main.passive')}}</option>
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
