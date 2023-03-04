@extends('layouts.panel')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header p-4 pb-2">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('transactions.index')}}">{{__('main.accounting_transactions')}}</a></li>
                        <li class="breadcrumb-item"><a href="{{route('transactions.edit',$transaction->id)}}">{{__('main.invoice').' '.__('main.receipt')}}</a></li>
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
                <h3 class="card-title">{{__('main.update_student_information')}}</h3>
            </div>
            <div class="card-body">
                <form action="{{route('transactions.update',$transaction->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="student_id">{{__('main.name_surname')}}</label>
                                <select  class="form-control js-example-tags @error('student_id') is-invalid @enderror"   name="student_id">
                                    @foreach($students as $student)
                                        <option value="{{$student->id}}" {{ ($student->id == $transaction->student_id) ? 'selected' : '' }}>{{$student->name.' '.$student->surname}}</option>
                                    @endforeach
                                </select>
                                    @error('student_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                            </div>


                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="transaction_no">{{__('main.transaction_no')}}</label>
                                <div class="input-group">
                                    <input id="transaction_no" type="text" class="form-control @error('transaction_no') is-invalid @enderror"
                                           name="transaction_no"
                                           value="{{ $transaction->transaction_no }}"
                                           required
                                           autocomplete="transaction_no"
                                           autofocus>
                                    @error('transaction_no')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                            </div>

                        </div>
                        <div class="col-md-3">

                            <div class="form-group">
                                <label for="department_id"> {{__('main.departments')}} </label>
                                <div class="input-group">

                                    <select  class="form-control js-example-tags @error('department_id') is-invalid @enderror"   name="department_id" required>
                                        @foreach($departments as $department)
                                            <option value="{{$department->id}}" {{ $department->id == $transaction->department_id ? 'selected':'' }}>{{$department->name}}</option>
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
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="ayrilma_nedeni"> {{__('main.description')}} </label>

                                <div class="input-group">

                                    <input
                                        type="text"
                                        id="description"
                                        class="form-control @error('description') is-invalid @enderror"
                                        name="description"
                                        autocomplete="description"
                                        value="{{$transaction->description}}"
                                    >
                                    @error('description')
                                    <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                          </span>
                                    @enderror

                                </div>

                            </div>

                        </div>
                        <div class="col-md-3">

                            <div class="form-group">
                                <label for="islem_tarih">{{__('main.prosses_date')}}</label>
                                <div class="input-group">
                                    <input
                                        type="date"
                                        id="islem_tarih"
                                        class="form-control @error('islem_tarih') is-invalid @enderror"
                                        name="islem_tarih"
                                        value="{{date('Y-m-d',strtotime($transaction->islem_tarih))}}"
                                        data-inputmask-alias="date"
                                        data-inputmask-inputformat="dd/mm/yyyy"
                                        data-masks autocomplete="islem_tarih">
                                    @error('islem_tarih')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                            </div>

                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="vade_tarih">{{__('main.due_date')}}</label>
                                <div class="input-group">
                                    <input
                                        type="date"
                                        id="vade_tarih"
                                        class="form-control @error('vade_tarih') is-invalid @enderror"
                                        name="vade_tarih"
                                        value="{{date('Y-m-d',strtotime($transaction->vade_tarih))}}"
                                        data-inputmask-alias="date"
                                        data-inputmask-inputformat="dd/mm/yyyy"
                                        data-masks autocomplete="vade_tarih">
                                    @error('vade_tarih')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                            </div>

                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="transaction_type">{{__('main.prosses_type')}}</label>
                                <div class="input-group">
                                    <select  class="form-control @error('transaction_type') is-invalid @enderror"   name="transaction_type" required>
                                        <option value="invoice" {{$transaction->transaction_type == 'invoice' ? 'selected' : ''}}>{{ __('main.invoice') }}</option>
                                        <option value="receipt" {{$transaction->transaction_type == 'receipt' ? 'selected' : ''}}>{{ __('main.receipt') }}</option>
                                        <option value="deduction" {{$transaction->transaction_type == 'deduction' ? 'selected' : ''}}>{{__('main.deduction')}}</option>
                                        <option value="extra_fee" {{$transaction->transaction_type == 'extra_fee' ? 'selected' : ''}}>{{__('main.extra_fee')}}</option>
                                    </select>
                                    @error('transaction_type')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                            </div>

                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="qualification_id">{{__('main.profession_qualification_transaction_no')}}</label>
                                <div class="input-group">
                                    <select  class="form-control @error('qualification_id') is-invalid @enderror"   name="qualification_id"  >
                                        @foreach($transaction->student->qualification as $qualification)
                                            <option value="{{$qualification->id}}" {{$transaction->qualification_id == $qualification->id ? 'selected' : ''}} >{{$qualification->islem_sira_no}}</option>
                                        @endforeach
                                    </select>
                                    @error('qualification_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                            </div>

                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="semester_id">{{__('main.semester')}}</label>
                                <div class="input-group">

                                        <select  class="form-control @error('semester_id') is-invalid @enderror"   name="semester_id" required>
                                            @foreach($semesters as $semester)
                                                <option value="{{$semester->id}}" {{$transaction->semester_id == $semester->id ? 'selected' : ''}}>{{$semester->name}}</option>
                                            @endforeach
                                        </select>

                                    @error('semester_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                            </div>

                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="currency_type">{{__('main.money_currency')}}</label>
                                <div class="input-group">
                                    <select  class="form-control @error('currency_type') is-invalid @enderror"   name="currency_type" required>
                                        <option value="TL" {{$transaction->currency_type == 'TL' ? 'selected' : ''}}>TL</option>
                                        <option value="EUROS" {{$transaction->currency_type == 'EUROS' ? 'selected' : ''}}>EURO</option>
                                        <option value="DOLLARS" {{$transaction->currency_type == 'DOLLARS' ? 'selected' : ''}}>Dollars</option>
                                        <option value="GBP" {{$transaction->currency_type == 'GBP' ? 'selected' : ''}}>Sterlin</option>
                                    </select>
                                    @error('currency_type')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                            </div>

                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="amount_payed">{{__('main.payed_amount')}}</label>
                                <div class="input-group">
                                    <input id="amount_payed" type="number" class="form-control @error('amount_payed') is-invalid @enderror"
                                           name="amount_payed"
                                           value="{{ $transaction->amount_payed }}"
                                           required
                                           autocomplete="amount_payed"
                                           autofocus>
                                    @error('amount_payed')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                            </div>

                        </div>
                        <div class="col-md-3">

                            <div class="form-group">
                                <label>{{__('main.status')}}</label>
                                <div class="input-group">
                                    <select  class="form-control @error('status') is-invalid @enderror"  name="status" required>
                                        <option value="1" {{$transaction->status == 1 ? 'selected':''}}>Aktif</option>
                                        <option value="0" {{$transaction->status == 0 ? 'selected': ''}}>Pasif</option>
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
        $(function () {
            $(".js-example-tags").select2({
                tags: true
            });
        })
    </script>
@endpush
