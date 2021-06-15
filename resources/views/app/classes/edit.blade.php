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
    <!-- row -->
    <div class="container-fluid">
        <div class="row">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Escola Bíblica - Turmas</h4>
                </div>
                <div class="card-body">
                    <div class="card-header">
                        <h4 class="card-title">Dados da Turma</h4>
                    </div>
                    <div class="basic-form">
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label>Descrição da Turma</label>
                                <input name="name" type="text" class="form-control" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label>Data da Fundação</label>
                                <input class="form-control" name="date_of_foundation" type="text"
                                    data-mask="00/00/0000">
                            </div>
                            <div class="form-group col-md-6">
                                <label>Data de Término</label>
                                <input class="form-control" name="date_of_end" type="text" data-mask="00/00/0000">
                            </div>
                            <div class="form-group col-md-6">
                                <label>Professor</label>
                                <select name="leader" class="form-control default-select" required>
                                    <option selected>Selecione...</option>
                                    <option value="">Gilson Tavares</option>
                                    <option value="">Mariano da Silva</option>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label>Categoria</label>
                                <select name="category" class="form-control default-select" required>
                                    <option selected>Selecione...</option>
                                    <option value="">Infantil</option>
                                    <option value="">Adulto</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-info">Cadastrar Turma</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!------------------------------------------------------ MODAL TURMA ---------------------------------------------->

    <div class="modal fade bd-example-modal-lg1" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Cadastro da Turma</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Dados da Turma</h4>
                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <label>Descrição da Turma</label>
                                            <input name="name" type="text" class="form-control" required>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Data da Fundação</label>
                                            <input class="form-control" name="date_of_foundation" type="text"
                                                data-mask="00/00/0000">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Data de Término</label>
                                            <input class="form-control" name="date_of_end" type="text"
                                                data-mask="00/00/0000">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Professor</label>
                                            <select name="leader" class="form-control default-select" required>
                                                <option selected>Selecione...</option>
                                                <option value="">Gilson Tavares</option>
                                                <option value="">Mariano da Silva</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Categoria</label>
                                            <select name="category" class="form-control default-select" required>
                                                <option selected>Selecione...</option>
                                                <option value="">Infantil</option>
                                                <option value="">Adulto</option>
                                            </select>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-info">Cadastrar Turma</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger light" data-dismiss="modal">Sair</button>
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
