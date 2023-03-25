@extends('layouts.panel')

@section('content')

    <!-- Content Header (Page header) -->
    <div class="content-header p-4 pb-2">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('transactions.index')}}"> {{  __('main.student').' '.__('main.accounting')}} /</a></li>
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
                <h1 class="card-title"> <i class="fa fa-people-carry"></i> {{__('main.accounting')}}</h1>
                @role('Super-Admin')
                <a href="{{route('transactions.show')}}" class="btn btn-primary float-right"> <i class="fa fa-plus"> {{__('main.new')}}</i></a>
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
                        <th>{{__('main.name_surname')}}</th>
                        <th>{{__('main.student_no')}}</th>
                        <th>{{__('main.transaction_no')}}</th>
                        <th>{{__('main.amount')}}</th>
                        <th>{{__('main.money_currency')}}</th>
                        <th>{{__('main.description')}}</th>
                        <th>{{__('main.prosses_date')}}</th>
                        <th>{{__('main.due_date')}}</th>
                        <th>{{__('main.prosses_type')}}</th>
                        <th>{{__('main.departments')}}</th>
                        <th>{{__('main.semester')}}</th>
                        <th>{{__('main.last_edited_user')}}</th>
                        <th>{{__('main.edited_date')}}</th>
                        <th>{{__('main.created_date')}}</th>
                        <th>{{__('main.status')}}</th>
                        <th>{{__('main.actions')}}</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($transactions as $transaction)
                        <tr>
                            <td>{{$transaction->id}}</td>
                            <td>{{$transaction->student->name.' '.$transaction->student->surname}}</td>
                            <td>{{$transaction->qualification->student_no}}</td>
                            <td>{{$transaction->transaction_no}}</td>
                            <td>{{number_format($transaction->amount_payed)}}</td>
                            <td>{{$transaction->currency_type}}</td>
                            <td>{{$transaction->description}}</td>
                            <td>{{$transaction->islem_tarih == null ? '' : date('d-m-Y',strtotime($transaction->islem_tarih)) }}</td>
                            <td>{{$transaction->vade_tarih == null ? '' : date('d-m-Y',strtotime($transaction->vade_tarih)) }}</td>
                            <td>@if($transaction->transaction_type == 'invoice')
                                   {{__('main.invoice')}}
                                @elseif($transaction->transaction_type == 'deduction')
                                    {{__('main.deduction')}}
                                @elseif($transaction->transaction_type == 'receipt')
                                    {{__('main.receipt')}}
                                @else
                                    {{__('main.extra_fee')}}
                               @endif
                            </td>
                            <td>{{$transaction->department->name}}</td>
                            <td>{{$transaction->semester->name}}</td>
                            <td>{{$transaction->user->name}}</td>
                            <td>{{$transaction->updated_at}}</td>
                            <td>{{$transaction->created_at}}</td>

                            <td>

                                @if($transaction->status == 1)
                                    <span class="badge badge-pill badge-success p-2">{{__('main.opened')}}</span>
                                @else
                                    <span class="badge badge-pill badge-danger p-2">{{__('main.closed')}}</span>
                                @endif
                            </td>
                            <td>
                                <div style="display: flex;justify-content: space-around">
                                    <a class="btn btn-primary" href="{{ route('transactions.edit',$transaction->id) }}"><i class="nav-icon fas fa-edit"></i> {{__('main.edit')}}</a>
                                    <form action="{{ route('transactions.destroy',$transaction->id) }}" method="POST" >
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
                        <th>{{__('main.name_surname')}}</th>
                        <th>{{__('main.student_no')}}</th>
                        <th>{{__('main.transaction_no')}}</th>
                        <th>{{__('main.amount')}}</th>
                        <th>{{__('main.money_currency')}}</th>
                        <th>{{__('main.description')}}</th>
                        <th>{{__('main.prosses_date')}}</th>
                        <th>{{__('main.due_date')}}</th>
                        <th>{{__('main.prosses_type')}}</th>
                        <th>{{__('main.departments')}}</th>
                        <th>{{__('main.semester')}}</th>
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
                 "responsive": true, "lengthChange": true, "autoWidth": true,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"],

            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        });

    </script>
@endpush

