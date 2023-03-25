@extends('layouts.panel')

@section('content')

    <div class="row p-5 card-gray">
        <!--  card -->
        <div class="card">
            <div class="card-header">
                <h1 class="card-title"> <i class="fa fa-users"></i> {{__('main.academic_year')}}</h1>
                @role('Super-Admin')
                <a href="{{route('academic-year.create')}}" class="btn btn-primary float-right"> <i class="fa fa-plus"> {{__('main.new')}}</i></a>
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
                        <th>{{__('main.start_date')}}</th>
                        <th>{{__('main.end_date')}}</th>
                        <th>{{__('main.status')}}</th>
                        <th>{{__('main.actions')}}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($years as $year)
                        <tr>
                            <td>{{$year->id}}</td>
                            <td>{{date('Y-m-d',strtotime($year->BaslamaTarihi))}}</td>
                            <td>{{date('Y-m-d',strtotime($year->BitisTarihi ))}}</td>
                            <td>
                                @if($year->status == 1)
                                    <span class="badge badge-pill badge-success p-2">{{__('main.opened')}}</span>
                                @else
                                    <span class="badge badge-pill badge-danger p-2">{{__('main.closed')}}</span>
                                @endif
                            </td>

                            <td>
                                <div style="display: flex;justify-content: space-around">
                                    <a class="btn btn-primary" href="{{ route('academic-year.edit',$year->id) }}">{{__('main.edit')}}</a>
                                    <form action="{{ route('academic-year.destroy',$year->id) }}" method="POST" >
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">{{__('main.delete')}}</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                    <tfoot>
                    <tr>
                        <th>ID</th>
                        <th>{{__('main.start_date')}}</th>
                        <th>{{__('main.end_date')}}</th>
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

        {{--$("input[data-bootstrap-switch]").each(function(){--}}
        {{--    $(this).bootstrapSwitch('state', $(this).prop('checked'));--}}

        {{--})--}}
        {{--console.log('do something in js')--}}
    </script>
@endpush

