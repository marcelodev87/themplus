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
				<div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Células / Pequenos Grupos</h4>
                                <div class=" align-self-end">
                                    <button type="button" class="btn btn-primary mb-2" data-toggle="modal" data-target=".bd-example-modal-lg1">+ Cadastrar Nova Célula</button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="example3" class="display" style="min-width: 845px">
                                        <thead>
                                            <tr>
                                                <th>Nome</th>
                                                <th>Responsável</th>
                                                <th>Anfitrião</th>
                                                <th>Líder da Rede</th>
                                                <th>Data de Criação</th>
                                                <th>Ação</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Efraim</td>
                                                <td>João Toledo</td>
                                                <td>João Toledo</td>
                                                <td>João Toledo</td>
                                                <td>30/06/2021</td>
                                                <td>
													<div class="d-flex">
														<a href="#" class="btn btn-primary shadow btn-xs sharp mr-1"><i class="fa fa-pencil"></i></a>
														<a href="#" class="btn btn-info shadow btn-xs sharp"><i class="fa fa-address-card"></i></a>
													</div>
												</td>
                                            </tr>
                                            <tr>
                                                <td>Judá</td>
                                                <td>Maria Toledo</td>
                                                <td>Gilberto Souza</td>
                                                <td>João Toledo</td>
                                                <td>01/02/2021</td>
                                                <td>
													<div class="d-flex">
														<a href="#" class="btn btn-primary shadow btn-xs sharp mr-1"><i class="fa fa-pencil"></i></a>
														<a href="#" class="btn btn-info shadow btn-xs sharp"><i class="fa fa-address-card"></i></a>
													</div>
												</td>
                                            </tr>
                                            <tr>
                                                <td>Novos Convertidos</td>
                                                <td>Joana Meireles</td>
                                                <td>Jéssica Santos</td>
                                                <td>Wilson Morais</td>
                                                <td>01/02/2021</td>
                                                <td>
													<div class="d-flex">
														<a href="#" class="btn btn-primary shadow btn-xs sharp mr-1"><i class="fa fa-pencil"></i></a>
														<a href="#" class="btn btn-info shadow btn-xs sharp"><i class="fa fa-address-card"></i></a>
													</div>
												</td>
                                            </tr>
                                            <tr>
                                                <td>Liderança</td>
                                                <td>Haroldo Silva</td>
                                                <td>Arnaldo Alencar</td>
                                                <td>Wilson Morais</td>
                                                <td>01/02/2021</td>
                                                <td>
													<div class="d-flex">
														<a href="#" class="btn btn-primary shadow btn-xs sharp mr-1"><i class="fa fa-pencil"></i></a>
														<a href="#" class="btn btn-info shadow btn-xs sharp"><i class="fa fa-address-card"></i></a>
													</div>
												</td>
                                            </tr>
                                            <tr>
                                                <td>Levi</td>
                                                <td>João Carlos Dias</td>
                                                <td>Maria da Concenição</td>
                                                <td>Junior Medeiros</td>
                                                <td>01/02/2021</td>
                                                <td>
													<div class="d-flex">
														<a href="#" class="btn btn-primary shadow btn-xs sharp mr-1"><i class="fa fa-pencil"></i></a>
														<a href="#" class="btn btn-info shadow btn-xs sharp"><i class="fa fa-address-card"></i></a>
													</div>
												</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

				</div>
            </div>
<!------------------------------------------------------ MODAL CÉLULA ---------------------------------------------->

            <div class="modal fade bd-example-modal-lg1" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Cadastro de Célula</h5>
                                <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                        </div>
                        <div class="modal-body">
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
<!------------------------------------------------------ ENDEREÇO ---------------------------------------------->
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
                                <button type="submit" class="btn btn-info">Cadastrar Célula</button>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger light" data-dismiss="modal">Sair</button>
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
