@extends('layouts.panel')

@section('content')

    <div class="row p-5 card-gray">
        <!--  card -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">{{__('Akademic Yıl Oluştur')}}</h3>
            </div>
            <div class="card-body">


                <form action="{{route('academic-year.update',$academicYear->id)}}" method="post">
                    <div class="row">
                        <div class="col-md-3">

                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="BaslamaTarihi">Başlama Tarihi</label>

                                <div class="input-group">

                                    <input id="BaslamaTarihi" type="date" class="form-control @error('BaslamaTarihi') is-invalid @enderror" name="BaslamaTarihi" value="{{ date('Y-m-d',strtotime($academicYear->BaslamaTarihi)) }}" required autocomplete="BaslamaTarihi" autofocus>

                                    @error('BaslamaTarihi')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                            </div>

                        </div>
                        <div class="col-md-3">
                            <!-- Date dd/mm/yyyy -->
                            <div class="form-group">
                                <label for="BitisTarihi">Bitiş Tarihi </label>

                                <div class="input-group">
                                    <input id="BitisTarihi" type="date" class="form-control @error('BitisTarihi') is-invalid @enderror" name="BitisTarihi" value="{{ date('Y-m-d',strtotime($academicYear->BitisTarihi)) }}" required autocomplete="BitisTarihi">
                                    @error('BitisTarihi')
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
    <style>
        /*  Toggle Switch  */
        .toggleStatus {
            margin-bottom: 20px;
        }
        .toggleSwitch span span {
            display: none;
        }

        @media only screen {
            .toggleSwitch {
                display: inline-block;
                height: 18px;
                position: relative;
                overflow: visible;
                padding: 0;
                margin-left: 50px;
                cursor: pointer;
                width: 40px
            }
            .toggleSwitch * {
                -webkit-box-sizing: border-box;
                -moz-box-sizing: border-box;
                box-sizing: border-box;
            }
            .toggleSwitch label,
            .toggleSwitch > span {
                line-height: 20px;
                height: 20px;
                vertical-align: middle;
            }
            .toggleSwitch input:focus ~ a,
            .toggleSwitch input:focus + label {
                outline: none;
            }
            .toggleSwitch label {
                position: relative;
                z-index: 3;
                display: block;
                width: 100%;
            }
            .toggleSwitch input {
                position: absolute;
                opacity: 0;
                z-index: 5;
            }
            .toggleSwitch > span {
                position: absolute;
                left: -50px;
                width: 100%;
                margin: 0;
                padding-right: 50px;
                text-align: left;
                white-space: nowrap;
            }
            .toggleSwitch > span span {
                position: absolute;
                top: 0;
                left: 0;
                z-index: 5;
                display: block;
                width: 50%;
                margin-left: 50px;
                text-align: left;
                font-size: 0.9em;
                width: 100%;
                left: 15%;
                top: -1px;
                opacity: 0;
            }
            .toggleSwitch a {
                position: absolute;
                right: 50%;
                z-index: 4;
                display: block;
                height: 100%;
                padding: 0;
                left: 2px;
                width: 18px;
                background-color: #fff;
                border: 1px solid #CCC;
                border-radius: 100%;
                -webkit-transition: all 0.2s ease-out;
                -moz-transition: all 0.2s ease-out;
                transition: all 0.2s ease-out;
                box-shadow: 0 1px 2px rgba(0, 0, 0, 0.05);
            }
            .toggleSwitch > span span:first-of-type {
                color: #ccc;
                opacity: 1;
                left: 45%;
            }
            .toggleSwitch > span:before {
                content: '';
                display: block;
                width: 100%;
                height: 100%;
                position: absolute;
                left: 50px;
                top: -2px;
                background-color: #fafafa;
                border: 1px solid #ccc;
                border-radius: 30px;
                -webkit-transition: all 0.2s ease-out;
                -moz-transition: all 0.2s ease-out;
                transition: all 0.2s ease-out;
            }
            .toggleSwitch input:checked ~ a {
                border-color: #fff;
                left: 100%;
                margin-left: -8px;
            }
            .toggleSwitch input:checked ~ span:before {
                border-color: #0097D1;
                box-shadow: inset 0 0 0 30px #0097D1;
            }
            .toggleSwitch input:checked ~ span span:first-of-type {
                opacity: 0;
            }
            .toggleSwitch input:checked ~ span span:last-of-type {
                opacity: 1;
                color: #fff;
            }
            /* Switch Sizes */
            .toggleSwitch.large {
                width: 60px;
                height: 27px;
            }
            .toggleSwitch.large a {
                width: 27px;
            }
            .toggleSwitch.large > span {
                height: 29px;
                line-height: 28px;
            }
            .toggleSwitch.large input:checked ~ a {
                left: 41px;
            }
            .toggleSwitch.large > span span {
                font-size: 1.1em;
            }
            .toggleSwitch.large > span span:first-of-type {
                left: 50%;
            }
            .toggleSwitch.xlarge {
                width: 80px;
                height: 36px;
            }
            .toggleSwitch.xlarge a {
                width: 36px;
            }
            .toggleSwitch.xlarge > span {
                height: 38px;
                line-height: 37px;
            }
            .toggleSwitch.xlarge input:checked ~ a {
                left: 52px;
            }
            .toggleSwitch.xlarge > span span {
                font-size: 1.4em;
            }
            .toggleSwitch.xlarge > span span:first-of-type {
                left: 50%;
            }
        }


        /*  End Toggle Switch  */
    </style>
@stop
@push('other-scripts')
    <script>

    </script>
@endpush
