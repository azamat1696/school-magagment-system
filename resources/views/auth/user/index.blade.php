@extends('layouts.panel')

@section('content')

    <div class="row p-5 card-gray">
        <!--  card -->
        <div class="card">
            <div class="card-header">
                <h1 class="card-title"> <i class="fa fa-users"></i> {{__('main.users')}}</h1>
               @role('Super-Admin')
                <a href="{{route('register')}}" class="btn btn-primary float-right"> <i class="fa fa-plus"></i></a>
                @endrole
            </div>
            <div class="card-body">
                @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        <p>{{ $message }}</p>
                    </div>
                @endif
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>{{__('main.name')}}</th>
                        <th>{{__('main.email')}}</th>
                        <th>{{__('main.user_no')}}</th>
                        <th>{{__('main.status')}}</th>
                        <th>{{__('main.phone')}}</th>
                        <th>{{__('main.birth_date')}}</th>
                        <th>{{__('main.user_authority')}}</th>
                        <th>{{__('main.actions')}}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                    <tr>
                        <td>{{$user->id}}</td>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->KullaniciKodu}}</td>
                        <td>
{{--                            <input type="checkbox" name="Statu" data-id="{{$user->id}}"   class="grid-switch-released">--}}

                        @if($user->Statu === 1)
                                <span class="badge badge-pill badge-success p-2">{{__('main.opened')}}</span>
                        @else
                                <span class="badge badge-pill badge-danger p-2">{{__('main.closed')}}</span>
                        @endif
                        </td>
                        <td>{{$user->TelefonNo }}</td>
                        <td>{{$user->DogumTarihi }}</td>
                        <td>{{$user->roles()->pluck('name')->implode(' ')}}</td>
                        <td>
                  <div style="display: flex;justify-content: space-around">
                      <a class="btn btn-primary" href="{{ route('user.edit',$user->id) }}">{{__('main.edit')}}</a>
                      <form action="{{ route('user.destroy',$user->id) }}" method="POST" >
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
                        <th>{{__('main.name')}}</th>
                        <th>{{__('main.email')}}</th>
                        <th>{{__('main.user_no')}}</th>
                        <th>{{__('main.status')}}</th>
                        <th>{{__('main.phone')}}</th>
                        <th>{{__('main.birth_date')}}</th>
                        <th>{{__('main.user_authority')}}</th>
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
                "fnDrawCallback": function() {
                    $('.grid-switch-released').bootstrapSwitch({
                        size: 'small',
                        onText: 'Açık',
                        offText: 'Kapalı',
                        onColor: 'primary',
                        offColor: 'danger',
                        onSwitchChange: function (event, state) {

                            $(this).val(state ? '1' : '0');

                            var pk = $(this).data('id');

                            var value = $(this).val();
                            var publishDate = $('[data-published-id="' + pk + '"]');
                            var featureDate = $('[data-featured-id="' + pk + '"]');

                            var action = $(this).data('action');
                            $.ajax({
                                url: "/admins/posts/" + pk,
                                type: "POST",
                                data: {
                                    released: value,
                                    action: action,
                                    _token: '{{csrf_token()}}',
                                    _method: 'PUT'
                                },
                                success: function (data) {
                                    if (data.action == "publish") {
                                        publishDate.html(data.date);
                                    } else {
                                        featureDate.html(data.date);
                                    }
                                    toastr.success(data.message);
                                }
                            });
                        }
                    });
                }
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        });

        $("input[data-bootstrap-switch]").each(function(){
            $(this).bootstrapSwitch('state', $(this).prop('checked'));

        })
        console.log('do something in js')
    </script>
@endpush

