@extends('app.master')

@section('css')

<link rel="stylesheet" href="{{ url('backend/vendor/datatables/css/jquery.dataTables.min.css')}}" />
<link rel="stylesheet" href="{{ url('backend/vendor/bootstrap-select/dist/css/bootstrap-select.min.css')}}" />
<link rel="stylesheet" href="{{ url('backend/css/style.css')}}" />

@endsection

@section('content')
<!--**********************************
            Content body start
        ***********************************-->
<div class="content-body">
    @if (session()->exists('message'))
    <div class="alert alert-{{ session()->get('color') }} solid alert-right-icon alert-dismissible fade show">
        <span><i class="mdi mdi-account-search"></i></span>
        <button type="button" class="close h-100" data-dismiss="alert" aria-label="Close"><span><i
                    class="mdi mdi-close"></i></span>
        </button> {{ session()->get('message') }}
    </div>
    @endif

    <!-- row -->
    <div class="container-fluid">
        <div class="row page-titles mx-0">
            <div class="align-self-end">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('app.igreja')}}">Igreja/Congregações</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">{{$church->name}}</a></li>
                </ol>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form method="POST" action="{{ route('app.igreja.store')}}">
                            @csrf
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Dados da Congregação</h4>
                                </div>
                                <div class="card-body">
                                    <div class="basic-form">
                                        <div class="form-row">
                                            <div class="form-group col-md-12">
                                                <label>Descrição da Congregação</label>
                                                <input name="name" type="text" class="form-control"
                                                    value="{{ old('name') ?? $church->name }}" required>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>Data da Fundação</label>
                                                <input class="form-control" name="date_of_foundation" type="text"
                                                    data-mask="00/00/0000"
                                                    value="{{ old('date_of_foundation') ?? $church->date_of_foundation }}">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>CNPJ</label>
                                                <input class="form-control mask-cnpj" id="document" name="document"
                                                    type="text" value="{{ old('document') ?? $church->document }}">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>Dirigente</label>
                                                <select name="leader" class="form-control selectpicker"
                                                    data-live-search="true" required>
                                                    <option selected>Digite o nome do Responsável</option>
                                                    @foreach ($users as $user)
                                                    <option value="{{ $user->id }}"
                                                        {{$church->leaderId->id == $user->id  ? 'selected' : ''}}>
                                                        {{ $user->name}}</option>

                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Endereço</h4>
                                </div>
                                <div class="card-body">

                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label>CEP</label>
                                            <input type="text" name="zipcode" class="form-control mask-zipcode"
                                                id="zipcode" value="{{ old('zipcode') ?? $church->zipcode }}" size="10"
                                                maxlength="9">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>UF</label>
                                            <input type="text" name="state" class="form-control" id="state"
                                                value="{{ old('state') ?? $church->state }}">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Cidade</label>
                                            <input type="text" name="city" class="form-control" id="city"
                                                value="{{ old('city') ?? $church->city }}">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Bairro</label>
                                            <input type="text" name="neighborhood" class="form-control"
                                                id="neighborhood"
                                                value="{{ old('neighborhood') ?? $church->neighborhood }}">
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label>Endereço</label>
                                            <input name="street" type="text" class="form-control"
                                                value="{{ old('street') ?? $church->street }}" id="street">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Número</label>
                                            <input type="text" name="number" class="form-control" data-mask="000000"
                                                id="number" value="{{ old('number') ?? $church->number }}">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Complemento</label>
                                            <input type="text" name="complement" class="form-control" id="complement"
                                                value="{{ old('complement') ?? $church->complement }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-info">Cadastrar Congregação</button>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>

</div>
<!--**********************************
            Content body end
        ***********************************-->

@endsection


@section('javascript')
<!-- Jquery Mask -->
<!-- Adicionando JQuery -->
<script src="{{ url('backend/js/jquery.min.js')}}"></script>
<script src="{{ url('backend/js/jquery.mask.js')}}"></script>
<!-- scripts -->
<script src="{{ url('backend/js/scripts.js')}}"></script>
<!-- Required vendors -->
<script src="{{ url('backend/vendor/global/global.min.js')}}"></script>
<script src="{{ url('backend/vendor/bootstrap-select/dist/js/bootstrap-select.min.js')}}"></script>
<script src="{{ url('backend/vendor/chart.js/Chart.bundle.min.js')}}"></script>
<script src="{{ url('backend/js/custom.min.js')}}"></script>

<!-- Apex Chart -->
<script src="{{ url('backend/vendor/apexchart/apexchart.js')}}"></script>

<!-- Datatable -->
<script src="{{ url('backend/vendor/datatables/js/jquery.dataTables.min.js')}}"></script>
<script src="{{ url('backend/js/plugins-init/datatables.init.js')}}"></script>

<script src="{{ url('backend/js/deznav-init.js')}}"></script>

@endsection
