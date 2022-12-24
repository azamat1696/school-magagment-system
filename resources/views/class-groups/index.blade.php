@extends('layouts.panel')

@section('content')

    <div class="row p-5 card-gray">
        <!--  card -->
        <div class="card">
            <div class="card-header">
                <h1 class="card-title"> <i class="fa fa-layer-group"></i> {{__('Sınıf Gurupları')}}</h1>
                @role('Super-Admin')
                <a href="{{route('class-groups.create')}}" class="btn btn-primary float-right"> <i class="fa fa-plus"> Yeni</i></a>
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
                        <th>Sınıf Gurubu</th>
                        <th>Güncelleme Tarihi </th>
                        <th>Oluşturma Tarihi </th>
                        <th>Aksiyonlar</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($classgroups as $item)
                        <tr>
                            <td>{{$item->id}}</td>
                            <td>{{$item->name }}</td>
                            <td>{{ date('Y-m-d',strtotime($item->created_at))}}</td>
                            <td>{{ date('Y-m-d',strtotime($item->updated_at)) }}</td>

                            <td>
                                <div style="display: flex;justify-content: space-around">
                                    <a class="btn btn-primary" href="{{ route('class-groups.edit',$item->id) }}"><i class="nav-icon fas fa-edit"></i> Düzenle</a>
                                    <form action="{{ route('class-groups.destroy',$item->id) }}" method="POST" >
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
                        <th>Sınıf Gurubu</th>
                        <th>Güncelleme Tarihi </th>
                        <th>Oluşturma Tarihi </th>
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

