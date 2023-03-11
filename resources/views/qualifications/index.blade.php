@extends('layouts.panel')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header p-4 pb-2">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('qualifications.index')}}">Öğrenci Meslek Yeterlilik /</a></li>
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
                <h1 class="card-title"> <i class="fa fa-people-carry"></i> {{__('main.student_qualification')}}</h1>
                @role('Super-Admin')
                <a href="{{route('qualifications.show')}}" class="btn btn-primary float-right"> <i class="fa fa-plus"> {{__('main.new')}}</i></a>
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
                        <th>{{__('main.name_surname')}} </th>
                        <th>{{__('main.student_no')}}</th>
                        <th>{{__('main.student_education_status')}}</th>
                        <th>{{__('main.profession_qualification_transaction_no')}}</th>
                        <th>{{__('main.qualification_start_date')}}</th>
                        <th>{{__('main.qualification_end_sign_date')}}</th>
                        <th>{{__('main.qualification_diploma_request_date')}}</th>
                        <th>{{__('main.qualification_diploma_confirm_date')}}</th>
                        <th>{{__('main.qualification_diploma_no')}}</th>
                        <th>{{__('main.que_number')}}</th>
                        <th>{{__('main.student_right')}}</th>
                        <th>{{__('main.grading_system')}}</th>
                        <th>{{__('main.leaving_date')}}</th>
                        <th>{{__('main.leaving_reason')}}</th>
                        <th>{{__('main.register_date')}}</th>
                        <th>{{__('main.last_edited_user')}}</th>
                        <th>{{__('main.edited_date')}}</th>
                        <th>{{__('main.created_date')}}</th>
                        <th>{{__('main.status')}}</th>
                        <th>{{__('main.actions')}}</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($qualifications as $qualification)
                        <tr>
                            <td>{{$qualification->id}}</td>
                            <td>{{$qualification->student->name .' '.$qualification->student->surname.' '. $qualification->student->other_name }}</td>
                            <td>{{$qualification->student_no}}</td>
                            <td>{{$qualification->student_status}}</td>
                            <td>{{$qualification->departmnent->department_no}}</td>
                            <td>{{date('d-m-Y',strtotime($qualification->qualification_start_date))}}</td>
                            <td>{{date('d-m-Y',strtotime($qualification->depart_imza_end_date))}}</td>
                            <td>{{date('d-m-Y',strtotime($qualification->diplom_req_date))}}</td>
                            <td>{{date('d-m-Y',strtotime($qualification->diplom_confirm_date))}}</td>
                             <td>{{$qualification->diplom_no}}</td>
                             <td>{{$qualification->islem_sira_no}}</td>
                             <td>{{$qualification->ogr_hakk}}</td>
                             <td>{{$qualification->not_sistemi}}</td>
                             <td>{{date('d-m-Y',strtotime($qualification->ayrilma_tarihi))}}</td>
                             <td>{{$qualification->ayrilma_nedeni}}</td>
                            <td>{{date('d-m-Y',strtotime($qualification->register_date))}}</td>
                            <td>{{$qualification->user->name}}</td>
                            <td>{{$qualification->updated_at}}</td>
                            <td>{{$qualification->created_at}}</td>
                            <td>
                                @if($qualification->status == 1)
                                    <span class="badge badge-pill badge-success p-2">{{__('main.opened')}}</span>
                                @else
                                    <span class="badge badge-pill badge-danger p-2">{{__('main.closed')}}</span>
                                @endif
                            </td>

                            <td>
                                <div style="display: flex;justify-content: space-around">
                                    <a class="btn btn-primary" href="{{ route('qualifications.edit',$qualification->id) }}"><i class="nav-icon fas fa-edit"></i> {{__('main.edit')}}</a>
                                    <form action="{{ route('qualifications.destroy',$qualification->id) }}" method="POST" >
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
                        <th>{{__('main.name_surname')}} </th>
                        <th>{{__('main.student_no')}}</th>
                        <th>{{__('main.student_education_status')}}</th>
                        <th>{{__('main.profession_qualification_transaction_no')}}</th>
                        <th>{{__('main.qualification_start_date')}}</th>
                        <th>{{__('main.qualification_end_sign_date')}}</th>
                        <th>{{__('main.qualification_diploma_request_date')}}</th>
                        <th>{{__('main.qualification_diploma_confirm_date')}}</th>
                        <th>{{__('main.qualification_diploma_no')}}</th>
                        <th>{{__('main.que_number')}}</th>
                        <th>{{__('main.student_right')}}</th>
                        <th>{{__('main.grading_system')}}</th>
                        <th>{{__('main.leaving_date')}}</th>
                        <th>{{__('main.leaving_reason')}}</th>
                        <th>{{__('main.register_date')}}</th>
                        <th>{{__('main.last_edited_user')}}</th>
                        <th>{{__('main.edited_date')}}</th>
                        <th>{{__('main.created_date')}}</th>
                        <th>{{__('main.status')}}</th>
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

