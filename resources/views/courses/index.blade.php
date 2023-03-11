@extends('layouts.panel')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header p-4 pb-2">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('departments.index')}}">{{__('main.departments')}}</a></li>
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
                <h1 class="card-title"> <i class="fa fa-chalkboard pr-1"></i> {{__('main.coureses')}}</h1>
                @role('Super-Admin')
                <a href="{{route('courses.create')}}" class="btn btn-primary float-right"> <i class="fa fa-plus"> {{__('main.new')}}</i></a>
                @endrole
            </div>
            <div class="card-body">
                @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        <p>{{ $message }}</p>
                    </div>
                @endif
                    @if ($message = Session::get('error'))
                        <div class="alert alert-danger">
                            <p>{{ $message }}</p>
                        </div>
                    @endif
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>{{__('main.course_name')}}</th>
                        <th>{{__('main.course_no')}}</th>
                        <th>{{__('main.description')}}</th>
                        <th>{{__('main.department_name')}}</th>
                        <th>{{__('main.department_name')}}</th>
                        <th>{{__('main.edited_date')}}</th>
                        <th>{{__('main.created_date')}}</th>
                        <th>{{__('main.actions')}}</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($items as $item)
                        <tr>
                            <td>{{$item->id}}</td>
                            <td>{{$item->name }}</td>
                            <td>{{$item->course_no }}</td>
                            <td>{{$item->description }}</td>
                            <td>{{$item->department->name }}</td>
                            <td>
                                @if($item->status == 1)
                                    <span class="badge badge-pill badge-success p-2">Açık</span>
                                @else
                                    <span class="badge badge-pill badge-danger p-2">Kapalı</span>
                                @endif
                            </td>
                            <td>{{ date('Y-m-d',strtotime($item->created_at )) }}</td>
                            <td>{{ date('Y-m-d',strtotime($item->updated_at))  }}</td>
                            <td>
                                <div style="display: flex;justify-content: space-around">
                                    <a class="btn btn-primary" href="{{ route('courses.edit',$item->id) }}"><i class="nav-icon fas fa-edit"></i> {{__('main.last_edited_user')}}</a>
                                    <form action="{{ route('courses.destroy',$item->id) }}" method="POST" >
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger"> <i class="nav-icon fas fa-trash"></i> {{__('main.delete')}}</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                    <tfoot>
                    <tr>
                        <th>ID</th>
                        <th>{{__('main.course_name')}}</th>
                        <th>{{__('main.course_no')}}</th>
                        <th>{{__('main.description')}}</th>
                        <th>{{__('main.department_name')}}</th>
                        <th>{{__('main.department_name')}}</th>
                        <th>{{__('main.edited_date')}}</th>
                        <th>{{__('main.created_date')}}</th>
                        <th>{{__('main.actions')}}</th>
                    </tr>
                    </tfoot>
                </table>

            </div>
        </div>
    </div>


@endsection
@push('other-scripts')
    <script>
        $(function () {
            $("#example1").DataTable({
                "responsive": true, "lengthChange": false, "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"],

            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        });

    </script>
@endpush

