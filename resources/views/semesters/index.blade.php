@extends('layouts.panel')

@section('content')

    <div class="row p-5 card-gray">
        <!--  card -->
        <div class="card">
            <div class="card-header">
                <h1 class="card-title"> <i class="fa fa-users"></i> {{__('Dönemler')}}</h1>
                @role('Super-Admin')
                <a href="{{route('semesters.create')}}" class="btn btn-primary float-right"> <i class="fa fa-plus"> Yeni</i></a>
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
                        <th>Dönem Adı</th>
                        <th>Akademik Senesi</th>
                        <th>Statüsü</th>
                        <th>Aksiyonlar</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($semesters as $semester)
                        <tr>
                            <td>{{$semester->id}}</td>
                            <td>{{$semester->DonemAdi }}</td>
                             <td>{{ date('Y',strtotime($semester->academic_years->BaslamaTarihi)).' - '.date('Y',strtotime($semester->academic_years->BitisTarihi ))  }}</td>

                            <td>
{{--                                                            <input type="checkbox" name="Statu" data-id="{{$year->id}}"   class="grid-switch-released">--}}
                                @if($semester->Statu === 1)
                                    <span class="badge badge-pill badge-success p-2">Açık</span>
                                @else
                                    <span class="badge badge-pill badge-danger p-2">Kapalı</span>
                                @endif
                            </td>

                            <td>
                                <div style="display: flex;justify-content: space-around">
                                    <a class="btn btn-primary" href="{{ route('semesters.edit',$semester->id) }}"><i class="nav-icon fas fa-edit"></i> Düzenle</a>
                                    <form action="{{ route('semesters.destroy',$semester->id) }}" method="POST" >
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
                        <th>Dönem Adı</th>
                        <th>Akademik Senesi</th>
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
        {{--$(function () {--}}
        {{--    $("#academic-year").DataTable({--}}
        {{--        "responsive": true, "lengthChange": false, "autoWidth": false,--}}
        {{--        "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"],--}}
        {{--        "fnDrawCallback": function() {--}}
        {{--            $('.grid-switch-released').bootstrapSwitch({--}}
        {{--                size: 'small',--}}
        {{--                onText: 'Açık',--}}
        {{--                offText: 'Kapalı',--}}
        {{--                onColor: 'primary',--}}
        {{--                offColor: 'danger',--}}
        {{--                onSwitchChange: function (event, state) {--}}

        {{--                    $(this).val(state ? '1' : '0');--}}

        {{--                    var pk = $(this).data('id');--}}

        {{--                    var value = $(this).val();--}}
        {{--                    var publishDate = $('[data-published-id="' + pk + '"]');--}}
        {{--                    var featureDate = $('[data-featured-id="' + pk + '"]');--}}

        {{--                    var action = $(this).data('action');--}}
        {{--                    $.ajax({--}}
        {{--                        url: "/admins/posts/" + pk,--}}
        {{--                        type: "POST",--}}
        {{--                        data: {--}}
        {{--                            released: value,--}}
        {{--                            action: action,--}}
        {{--                            _token: '{{csrf_token()}}',--}}
        {{--                            _method: 'PUT'--}}
        {{--                        },--}}
        {{--                        success: function (data) {--}}
        {{--                            if (data.action == "publish") {--}}
        {{--                                publishDate.html(data.date);--}}
        {{--                            } else {--}}
        {{--                                featureDate.html(data.date);--}}
        {{--                            }--}}
        {{--                            toastr.success(data.message);--}}
        {{--                        }--}}
        {{--                    });--}}
        {{--                }--}}
        {{--            });--}}
        {{--        }--}}
        {{--    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');--}}
        {{--});--}}

        {{--$("input[data-bootstrap-switch]").each(function(){--}}
        {{--    $(this).bootstrapSwitch('state', $(this).prop('checked'));--}}

        {{--})--}}
        {{--console.log('do something in js')--}}
    </script>
@endpush

