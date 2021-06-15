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
                    <li class="breadcrumb-item"><a href="{{ route('app.ministerios')}}">Ministérios</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">{{ $ministry->name }}</a></li>
                </ol>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form method="POST" action="{{ route('app.ministerios.update',  [$ministry->id ])}}">
                            @csrf
                            @method('PUT')
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Dados da Igreja</h4>
                                </div>
                                <div class="card-body">
                                    <div class="basic-form">
                                        <div class="form-row">
                                            <div class="form-group col-md-12">
                                                <div class="d-block my-3">
                                                    <h4 class="mb-3">Status do Ministério</h4>
                                                    <div class="custom-control custom-radio mb-2">
                                                        <label class="radio-inline mr-3">
                                                            <input type="radio" name="situation" value="1"
                                                                {{ (old('situation') == 'Ativo' ? 'checked' : ($ministry->situation == 'Ativo' ? 'checked' : ''))}}> Ativo
                                                            </label>
                                                        <label class="radio-inline mr-3">
                                                            <input type="radio" name="situation" value="0"
                                                            {{ (old('situation') == 'Inativo' ? 'checked' : ($ministry->situation == 'Inativo' ? 'checked' : ''))}}>
                                                            Inativo
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group col-md-12">
                                                <label>Descrição do Ministério</label>
                                                <input name="name" type="text" class="form-control"
                                                    value="{{ old('name') ?? $ministry->name }}" required>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>Data da Fundação</label>
                                                <input class="form-control" name="date_of_foundation" type="text"
                                                    data-mask="00/00/0000"
                                                    value="{{ old('date_of_foundation') ?? $ministry->date_of_foundation }}" readonly>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>Data da última atualização</label>
                                                <input class="form-control" name="date_last_update" type="text"
                                                value="{{ $ministry->updated_at }}" readonly>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>Dirigente</label>
                                                <select name="leader" class="form-control selectpicker"
                                                data-live-search="true" required>
                                                    <option selected>Selecione o responsável</option>
                                                    @foreach ($users as $user)
                                                    <option value="{{ $user->id }}"
                                                        {{$ministry->leaderId->id == $user->id  ? 'selected' : ''}}>
                                                        {{ $user->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                            <button type="submit" class="btn btn-primary">Atualizar Dados da Célula</button>
                        </form>

                </div>
            </div>
        </div>
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
