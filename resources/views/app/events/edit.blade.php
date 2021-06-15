@extends('app.master')

@section('css')

   <link rel="stylesheet" href="{{ url('backend/vendor/datatables/css/jquery.dataTables.min.css')}}"/>
   <link rel="stylesheet" href="{{ url('backend/vendor/bootstrap-select/dist/css/bootstrap-select.min.css')}}"/>
   <link rel="stylesheet" href="{{ url('backend/css/style.css')}}"/>

@endsection

@section('content')
    <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <!-- row -->
			<div class="container-fluid">
                <div class="row page-titles mx-0">
                    <div class="align-self-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('app.celulas')}}">Células e Pequenos Grupos</a></li>
                            <li class="breadcrumb-item active"><a href="javascript:void(0)">Nome da Célula</a></li>
                        </ol>
                    </div>
                </div>
				<div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Células / Pequenos Grupos</h4>
                            </div>
                                <div class="card-body">
                                    <form method="POST">
    <!-------------------------------------------------------- Nav tabs -------------------------------->
                                    <div class="default-tab">
                                        <ul class="nav nav-tabs" role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link active" data-toggle="tab" href="#cell"><i class="la la-file-text mr-2"></i> Dados da Célula</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" data-toggle="tab" href="#days"><i class="la la-calendar-o mr-2"></i> Dias/Horários</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link " data-toggle="tab" href="#address"><i class="la la-home mr-2"></i> Endereço</a>
                                            </li>
                                        </ul>
                                        <div class="tab-content">
    <!------------------------------------------------- ABA DADOS DA CELULA --------------------------------------------------->
                                            <div class="tab-pane fade show active" id="cell" role="tabpanel">
                                                <form>
                                                    <div class="card">
                                                        <div class="card-header">
                                                            <h4 class="card-title">Dados da Célula</h4>
                                                        </div>
                                                        <div class="card-body">
                                                            <div class="basic-form">
                                                                <div class="form-row">
                                                                    <div class="form-group col-md-12">
                                                                        <div class="d-block my-3">
                                                                            <h4 class="mb-3">Tipo de Cadastro</h4>
                                                                            <div class="custom-control custom-radio mb-2">
                                                                                <label class="radio-inline mr-3"><input type="radio" name="register_type" checked> Ativa</label>
                                                                                <label class="radio-inline mr-3"><input type="radio" name="register_type"> Inativa</label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group col-md-12">
                                                                        <label>Descrição da Célula</label>
                                                                        <input name="name" type="text" class="form-control" required>
                                                                    </div>
                                                                    <div class="form-group col-md-6">
                                                                        <label>Data da Fundação</label>
                                                                        <input class="form-control" name="date_of_foundation" type="text" data-mask="00/00/0000">
                                                                    </div>
                                                                    <div class="form-group col-md-6">
                                                                        <label>Data da última atualização</label>
                                                                        <input class="form-control" name="date_last_update" type="text" placeholder="10/11/2019" disabled>
                                                                    </div>
                                                                    <div class="form-group col-md-6">
                                                                        <label>Dirigente</label>
                                                                        <select name="leader" class="form-control default-select" required>
                                                                            <option selected>Selecione...</option>
                                                                            <option value="">Gilson Tavares</option>
                                                                            <option value="">Mariano da Silva</option>
                                                                        </select>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                            </div>
    <!------------------------------------------------- ABA DIAS/HORARIOS --------------------------------------------------->
                                            <div class="tab-pane fade" id="days">
                                                <div class="card">
                                                    <div class="card-header">
                                                        <h4 class="card-title">Dias/Horários</h4>
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="basic-form">
                                                            <div class="form-row">
                                                                <div class="form-group col-md-6">
                                                                    <label>Horário da Reunião</label>
                                                                    <input class="form-control" name="time" type="text" data-mask="00:00">
                                                                </div>
                                                                <div class="form-group col-md-6">
                                                                    <label>Frenquência</label>
                                                                    <select name="frequency" class="form-control default-select">
                                                                        <option selected>Selecione...</option>
                                                                        <option value="">Semanal</option>
                                                                        <option value="">Quinzenal</option>
                                                                        <option value="">Mensal</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="form-row">
                                                                <div class="form-group col-md-12">
                                                                    <h4 class="card-title">Reuniões</h4>
                                                                    <div class="form-check form-check-inline">
                                                                        <label class="form-check-label">
                                                                            <input type="checkbox" class="form-check-input" value="">Domingo
                                                                        </label>
                                                                    </div>
                                                                    <div class="form-check form-check-inline">
                                                                        <label class="form-check-label">
                                                                            <input type="checkbox" class="form-check-input" value="" checked>Segunda-Feira
                                                                        </label>
                                                                    </div>
                                                                    <div class="form-check form-check-inline">
                                                                        <label class="form-check-label">
                                                                            <input type="checkbox" class="form-check-input" value="">Terça-Feira
                                                                        </label>
                                                                    </div>
                                                                    <div class="form-check form-check-inline">
                                                                        <label class="form-check-label">
                                                                            <input type="checkbox" class="form-check-input" value="">Quarta-Feira
                                                                        </label>
                                                                    </div>
                                                                    <div class="form-check form-check-inline">
                                                                        <label class="form-check-label">
                                                                            <input type="checkbox" class="form-check-input" value="">Quinta-Feira
                                                                        </label>
                                                                    </div>
                                                                    <div class="form-check form-check-inline">
                                                                        <label class="form-check-label">
                                                                            <input type="checkbox" class="form-check-input" value="">Sexta-Feira
                                                                        </label>
                                                                    </div>
                                                                    <div class="form-check form-check-inline">
                                                                        <label class="form-check-label">
                                                                            <input type="checkbox" class="form-check-input" value="">Sábado
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                                </div>
                                                                <div class="form-row">
                                                                    <div class="form-group col-md-6">
                                                                        <label>Anfitrião</label>
                                                                        <select name="host" class="form-control default-select" required>
                                                                            <option selected>Selecione...</option>
                                                                            <option value="">Gilson Tavares</option>
                                                                            <option value="">Mariano da Silva</option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="form-group col-md-6">
                                                                        <label>Local</label>
                                                                        <select name="local" class="form-control default-select">
                                                                            <option selected>Selecione...</option>
                                                                            <option value="">Espaço Público</option>
                                                                            <option value="">Igreja</option>
                                                                            <option value="">Faculdade</option>
                                                                            <option value="">Residência</option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="form-group col-md-12">
                                                                        <div class="form-check form-check-inline">
                                                                            <label class="form-check-label">
                                                                                <input type="checkbox" class="form-check-input" value="">A reunião é realizada na residência do anfitrião.
                                                                            </label>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                        </div>
                                                    </div>
                                                </div>
                                                </div>
    <!------------------------------------------------- ABA ENDEREÇO --------------------------------------------------->
                                            <div class="tab-pane fade" id="address">
                                                    <div class="card">
                                                        <div class="card-header">
                                                                <h4 class="card-title">Endereço</h4>
                                                        </div>
                                                        <div class="card-body">
                                                            <div class="basic-form">
                                                                    <div class="form-row">
                                                                        <div class="form-group col-md-6">
                                                                            <label>CEP</label>
                                                                            <input type="text" name="zipcode" class="form-control" data-mask="00000-000" id="zip">
                                                                        </div>
                                                                        <div class="form-group col-md-6">
                                                                            <label>UF</label>
                                                                            <input type="text" name="state" class="form-control" data-mask="AA" id="state">
                                                                        </div>
                                                                        <div class="form-group col-md-6">
                                                                            <label>Cidade</label>
                                                                            <input type="text" name="city" class="form-control" id="city">
                                                                        </div>
                                                                        <div class="form-group col-md-6">
                                                                            <label>Bairro</label>
                                                                            <input type="text" name="neighborhood" class="form-control" id="neighborhood">
                                                                        </div>
                                                                        <div class="form-group col-md-12">
                                                                            <label>Endereço</label>
                                                                            <input name="street" type="text" class="form-control">
                                                                        </div>
                                                                        <div class="form-group col-md-6">
                                                                            <label>Número</label>
                                                                            <input type="text" name="street_number" class="form-control" data-mask="000000" id="street_number">
                                                                        </div>
                                                                        <div class="form-group col-md-6">
                                                                            <label>Complemento</label>
                                                                            <input type="text" name="complement" class="form-control" id="complement">
                                                                        </div>
                                                                    </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <button type="submit" class="btn btn-primary">Atualizar Dados da Célula</button>
                                    </form>
                                    </div></div>
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
