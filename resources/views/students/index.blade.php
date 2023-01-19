@extends('layouts.panel')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header p-4 pb-2">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('students.index')}}">Sınıflar /</a></li>
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
                <h1 class="card-title"> <i class="fa fa-people-carry"></i> {{__('Öğrenciler')}}</h1>
                @role('Super-Admin')
                <a href="{{route('students.create')}}" class="btn btn-primary float-right"> <i class="fa fa-plus"> Yeni</i></a>
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
                        <th>Kimlik No</th>
                        <th>Pasaport No</th>
                        <th>Cinsiyeti</th>
                        <th>Ülkesi</th>
                        <th>Kan Gurubu</th>
                        <th>Doğum Tarihi</th>
                        <th>Doğum Yeri</th>
                        <th>Anne Adı</th>
                        <th>Baba Adı</th>
                        <th>E-posta</th>
                        <th>Telefon 1</th>
                        <th>Telefon 2</th>
                        <th>Telefon 3</th>
                        <th>KKTC adres</th>
                        <th>Son düzenleyen kullanıcı</th>
                        <th>Düzenleme Tarihi</th>
                        <th>Oluşturma Tariihi</th>
                        <th>Statüsü</th>
                        <th>Aksiyonlar</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($students as $student)
                        <tr>
                            <td>{{$student->id}}</td>
                            <td>{{$student->name .' '.$student->surname.' '. $student->other_name }}</td>
                            <td>{{$student->identity_no}}</td>
                            <td>{{$student->passport_no}}</td>
                            <td>{{$student->gender}}</td>
                            <td>{{$student->country_related->name}}</td>
                            <td>{{$student->blood_group}}</td>
                            <td>{{date('Y-m-d',strtotime($student->birth_date))}}</td>
                            <td>{{$student->place_of_birth}}</td>
                             <td>{{$student->mother_name}}</td>
                            <td>{{$student->father_name}}</td>
                            <td>{{$student->email}}</td>
                            <td>{{$student->phone_no}}</td>
                            <td>{{$student->phone_no_1}}</td>
                            <td>{{$student->phone_no_2}}</td>
                            <td>{{$student->address}}</td>
                             <td>{{$student->user->name}}</td>
                            <td>{{$student->updated_at}}</td>
                            <td>{{$student->created_at}}</td>
                            <td>
                                {{--                                                            <input type="checkbox" name="Statu" data-id="{{$year->id}}"   class="grid-switch-released">--}}
                                @if($student->status == 1)
                                    <span class="badge badge-pill badge-success p-2">Açık</span>
                                @else
                                    <span class="badge badge-pill badge-danger p-2">Kapalı</span>
                                @endif
                            </td>

                            <td>
                                <div style="display: flex;justify-content: space-around">
                                    <a class="btn btn-primary m-1" href="{{ route('students.edit',$student->id) }}"><i class="nav-icon fas fa-edit"></i> Düzenle</a>
                                    <form action="{{ route('students.destroy',$student->id) }}" method="POST" >
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger m-1"> <i class="nav-icon fas fa-trash"></i> Sil</button>
                                    </form>
                                    <a class="btn btn-warning m-1" href="{{ route('qualifications.create',$student->id) }}"><i class="nav-icon fas fa-edit"></i> Öğrenci MY Kaydı</a>
                                    <a class="btn btn-secondary m-1" href="{{ route('student-records.create',$student->id) }}"><i class="nav-icon fas fa-edit"></i> Öğrenci Dönem Kaydı</a>
                                    <a class="btn btn-outline-secondary m-1" href="{{ route('transactions.create',$student->id) }}"><i class="nav-icon fas fa-edit"></i>Öğrenci Fatura/Makbuz oluştur</a>

                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                    <tfoot>
                    <tr>
                        <th>ID</th>
                        <th>Ad & Soyad </th>
                        <th>Kimlik No</th>
                        <th>Pasaport No</th>
                        <th>Cinsiyeti</th>
                        <th>Ülkesi</th>
                        <th>Kan Gurubu</th>
                        <th>Doğum Tarihi</th>
                        <th>Doğum Yeri</th>
                        <th>Anne Adı</th>
                        <th>Baba Adı</th>
                        <th>E-posta</th>
                        <th>Telefon 1</th>
                        <th>Telefon 2</th>
                        <th>Telefon 3</th>
                        <th>KKTC adres</th>
                         <th>Son düzenleyen kullanıcı</th>
                        <th>Düzenleme Tarihi</th>
                        <th>Oluşturma Tariihi</th>
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
                "responsive": true, "lengthChange": false, "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"],

            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        });

    </script>
@endpush

