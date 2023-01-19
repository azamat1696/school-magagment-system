@extends('layouts.panel')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header p-4 pb-2">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('transactions.index')}}">Makbuz / Faturar</a></li>
                        <li class="breadcrumb-item"><a href="{{route('transactions.create',$student->id)}}">Makbuz/Fatura Oluştur</a></li>
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
                <h3 class="card-title">{{__('Öğrenci  Makbuz / Fatura')}}</h3>
            </div>
            <div class="card-body">


                <form action="{{route('transactions.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-3">

                            <div class="form-group">
                                <label for="student_id">Öğrenci İsim & Soyismi</label>

                                <div class="input-group">
                                    <input id="student_id" type="text" class="form-control @error('student_id') is-invalid @enderror"
                                           name="student_id"
                                           value="{{$student->id}}"
                                           required
                                           hidden
                                    >
                                    <input type="text" value="{{ $student->name.' '.$student->surname }}" class="form-control" disabled>
                                    @error('student_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                            </div>

                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="transaction_no">İşlem No</label>
                                <div class="input-group">
                                    <input id="transaction_no" type="text" class="form-control @error('transaction_no') is-invalid @enderror"
                                           name="transaction_no"
                                           value="{{ old('transaction_no') }}"
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
                                <label for="department_id">Bölüm </label>
                                <div class="input-group">
                                    <select  class="form-control @error('department_id') is-invalid @enderror"   name="department_id" required>
                                        @foreach($departments as $department)
                                           <option value="{{$department->id}}">{{$department->name}}</option>
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
                                <label for="ayrilma_nedeni"> Açıklama </label>

                                <div class="input-group">

                                    <input
                                        type="text"
                                        id="description"
                                        class="form-control @error('description') is-invalid @enderror"
                                        name="description"
                                        autocomplete="ayrilma_nedeni">

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
                                <label for="islem_tarih">İşlem Tarihi</label>
                                <div class="input-group">
                                    <input
                                        type="date"
                                        id="islem_tarih"
                                        class="form-control @error('islem_tarih') is-invalid @enderror"
                                        name="islem_tarih"
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
                                <label for="vade_tarih">Vade Tarihi</label>
                                <div class="input-group">
                                    <input
                                        type="date"
                                        id="vade_tarih"
                                        class="form-control @error('vade_tarih') is-invalid @enderror"
                                        name="vade_tarih"
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
                                <label for="transaction_type">İşem Tipi</label>
                                <div class="input-group">
                                    <select  class="form-control @error('transaction_type') is-invalid @enderror"   name="transaction_type" required>
                                        <option value="invoice">Fatura</option>
                                        <option value="receipt">Makbuz</option>
                                        <option value="deduction">Kesinti</option>
                                        <option value="extra_fee">Ekstra Ücret</option>
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
                                <label for="qualification_id">MY İşlem Sıra No</label>
                                <div class="input-group">
                                    <select  class="form-control @error('qualification_id') is-invalid @enderror"   name="qualification_id" required>
                                        @foreach($student->qualification as $qualification)
                                            <option value="{{$qualification->id}}">{{$qualification->islem_sira_no}}</option>
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
                                <label for="semester_id">Dönem</label>
                                <div class="input-group">
                                    <select  class="form-control @error('semester_id') is-invalid @enderror"   name="semester_id" required>
                                        @foreach($semesters as $semester)
                                            <option value="{{$semester->id}}">{{$semester->name}}</option>
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
                                <label for="currency_type">Para Birimi</label>
                                <div class="input-group">
                                    <select  class="form-control @error('currency_type') is-invalid @enderror"   name="currency_type" required>
                                            <option value="TL">TL</option>
                                            <option value="EUROS">EURO</option>
                                            <option value="DOLLARS">TL</option>
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
                                <label for="amount_payed">Ödeme Miktarı</label>
                                <div class="input-group">
                                    <input id="amount_payed" type="number" class="form-control @error('amount_payed') is-invalid @enderror"
                                           name="amount_payed"
                                           value="{{ old('amount_payed') }}"
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
                                <label>Status</label>

                                <div class="input-group">
                                    <select  class="form-control @error('status') is-invalid @enderror"   name="status" required>
                                        <option value="1">Aktif</option>
                                        <option value="0">Pasif</option>
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

@endpush
