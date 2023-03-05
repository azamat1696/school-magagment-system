@extends('layouts.panel')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header p-4 pb-2">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('sections.index')}}"> {{__('main.classes')}} /</a></li>
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
                <h1 class="card-title"> <i class="fa fa-users"></i> {{__('Sınıflar ')}}</h1>
                @role('Super-Admin')
                <a href="{{route('sections.create')}}" class="btn btn-primary float-right"> <i class="fa fa-plus"> {{__('main.mew')}}</i></a>
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
                        <th>{{__('main.class_name')}}</th>
                        <th>{{__('main.class_no')}}</th>
                        <th>{{__('main.course_name')}}</th>
                        <th>{{__('main.instructor_name')}}</th>
                        <th>{{__('main.theory_start')}} </th>
                        <th>{{__('main.theory_end')}} </th>
                        <th>{{__('main.practice_start')}} </th>
                        <th>{{__('main.practice_end')}}</th>
                        <th>{{__('main.course_signature_end')}}</th>
                        <th>{{__('main.last_edited_user')}}</th>
                        <th>{{__('main.status')}}</th>
                        <th>{{__('main.edited_date')}}  </th>
                        <th>{{__('main.created_date')}}  </th>
                        <th>{{__('main.actions')}}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($sections as $section)
                        <tr>
                            <td>{{$section->id}}</td>
                            <td>{{$section->name}}</td>
                            <td>{{$section->section_no}}</td>
                            <td>{{$section->course->name}}</td>
                            <td>{{$section->instructorUser->name}}</td>
                            <td>{{date('Y-m-d',strtotime($section->theory_start_date))}}</td>
                            <td>{{date('Y-m-d',strtotime($section->theory_end_date))}}</td>
                            <td>{{date('Y-m-d',strtotime($section->practice_start_date))}}</td>
                            <td>{{date('Y-m-d',strtotime($section->practice_end_date ))}}</td>
                            <td>{{date('Y-m-d',strtotime($section->ders_imza_end_date ))}}</td>
                            <td>{{$section->user->name}}</td>
                             <td>
                                 @if($section->status == 1)
                                    <span class="badge badge-pill badge-success p-2">Açık</span>
                                @else
                                    <span class="badge badge-pill badge-danger p-2">Kapalı</span>
                                @endif
                            </td>
                            <td>{{date('Y-m-d',strtotime($section->created_at ))}}</td>
                            <td>{{date('Y-m-d',strtotime($section->updated_at ))}}</td>
                            <td>
                                <div style="display: flex;justify-content: space-around">
                                    <a class="btn btn-primary" href="{{ route('sections.edit',$section->id) }}">Düzenle</a>
                                    <form action="{{ route('sections.destroy',$section->id) }}" method="POST" >
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Sil</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                    <tfoot>
                    <tr>
                        <th>ID</th>
                        <th>{{__('main.class_name')}}</th>
                        <th>{{__('main.class_no')}}</th>
                        <th>{{__('main.course_name')}}</th>
                        <th>{{__('main.instructor_name')}}</th>
                        <th>{{__('main.theory_start')}} </th>
                        <th>{{__('main.theory_end')}} </th>
                        <th>{{__('main.practice_start')}} </th>
                        <th>{{__('main.practice_end')}}</th>
                        <th>{{__('main.course_signature_end')}}</th>
                        <th>{{__('main.last_edited_user')}}</th>
                        <th>{{__('main.status')}}</th>
                        <th>{{__('main.edited_date')}}  </th>
                        <th>{{__('main.created_date')}}  </th>
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

        {{--$("input[data-bootstrap-switch]").each(function(){--}}
        {{--    $(this).bootstrapSwitch('state', $(this).prop('checked'));--}}

        {{--})--}}
        {{--console.log('do something in js')--}}
    </script>
@endpush

