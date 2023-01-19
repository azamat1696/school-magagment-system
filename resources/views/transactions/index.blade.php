@extends('layouts.panel')

@section('content')

    <!-- Content Header (Page header) -->
    <div class="content-header p-4 pb-2">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('transactions.index')}}">Öğrenci Meslek Yeterlilik /</a></li>
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
                <h1 class="card-title"> <i class="fa fa-people-carry"></i> {{__('Öğrenciler Meslek Yeterlilik ')}}</h1>
                @role('Super-Admin')
                <a href="{{route('transactions.show')}}" class="btn btn-primary float-right"> <i class="fa fa-plus"> Yeni</i></a>
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
                        <th>Ad & Soyad </th>
                        <th>Öğrenci No</th>
                        <th>İşlem No</th>
                        <th>Miktarı</th>
                        <th>Para Birimi</th>
                        <th>Açıklama</th>
                        <th>İşlem Tarihi</th>
                        <th>Vade Tarihi</th>
                        <th>İşem Tipi</th>
                        <th>Bölüm Adı & No</th>
                        <th>Dönem Adı</th>
                        <th>Son düzenleyen kullanıcı:</th>
                        <th>Düzenleme Tarihi:</th>
                        <th>Oluşturma Tariihi:</th>
                        <th>Statüsü</th>
                        <th>Aksiyonlar</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($transactions as $transaction)
                        <tr>
                            <td>{{$transaction->id}}</td>
                            <td>{{$transaction->student->name.' '.$transaction->student->surname}}</td>
                            <td>{{$transaction->qualification->student_no}}</td>
                            <td>{{$transaction->transaction_no}}</td>
                            <td>{{$transaction->amount_payed}}</td>
                            <td>{{$transaction->currency_type}}</td>
                            <td>{{$transaction->description}}</td>
                            <td>{{$transaction->islem_tarih == null ? '' : date('d-m-Y',strtotime($transaction->islem_tarih)) }}</td>
                            <td>{{$transaction->vade_tarih == null ? '' : date('d-m-Y',strtotime($transaction->vade_tarih)) }}</td>
                            <td>{{$transaction->transaction_type}}</td>
                            <td>{{$transaction->department->name}}</td>
                            <td>{{$transaction->semester->name}}</td>
                            <td>{{$transaction->user->name}}</td>

                            <td>{{$transaction->updated_at}}</td>
                            <td>{{$transaction->created_at}}</td>

                            <td>

                                @if($transaction->status == 1)
                                    <span class="badge badge-pill badge-success p-2">Açık</span>
                                @else
                                    <span class="badge badge-pill badge-danger p-2">Kapalı</span>
                                @endif
                            </td>
                            <td>
                                <div style="display: flex;justify-content: space-around">
                                    <a class="btn btn-primary" href="{{ route('transactions.edit',$transaction->id) }}"><i class="nav-icon fas fa-edit"></i> Düzenle</a>
                                    <form action="{{ route('transactions.destroy',$transaction->id) }}" method="POST" >
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger"> <i class="nav-icon fas fa-trash"></i> Sil</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                    <tfoot>
                    <tr>
                        <th>ID</th>
                        <th>Ad & Soyad </th>
                        <th>Öğrenci No</th>
                        <th>İşlem No</th>
                        <th>Miktarı</th>
                        <th>Para Birimi</th>
                        <th>Açıklama</th>
                        <th>İşlem Tarihi</th>
                        <th>Vade Tarihi</th>
                        <th>İşem Tipi</th>
                        <th>Bölüm Adı & No</th>
                        <th>Dönem Adı</th>
                        <th>Son düzenleyen kullanıcı:</th>
                        <th>Düzenleme Tarihi:</th>
                        <th>Oluşturma Tariihi:</th>
                        <th>Statüsü</th>
                        <th>Aksiyonlar</th>
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

