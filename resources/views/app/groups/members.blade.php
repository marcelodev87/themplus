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
                        <h4 class="card-title">NOME DA CELULA</h4>
                        <div class=" align-self-end">
                            <button type="button" class="btn btn-primary mb-2" data-toggle="modal"
                                data-target=".bd-example-modal-lg1">+ Adicionar Novo Membro</button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example3" class="display" style="min-width: 845px">
                                <thead>
                                    <tr>
                                        <th>Nome</th>
                                        <th>Email</th>
                                        <th>Telefone</th>
                                        <th>Ação</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>João Toledo</td>
                                        <td>joa@joao.com</td>
                                        <td>(21)2121-2121</td>
                                        <td>
                                            <div class="d-flex">
                                                <a href="#" class="btn btn-primary shadow btn-xs sharp mr-1"><i
                                                        class="fa fa-pencil"></i></a>
                                                <a href="#" class="btn btn-info shadow btn-xs sharp"><i
                                                        class="fa fa-address-card"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Gilberto Souza</td>
                                        <td>gil@gil.com</td>
                                        <td>(21)2121-2121</td>
                                        <td>
                                            <div class="d-flex">
                                                <a href="#" class="btn btn-primary shadow btn-xs sharp mr-1"><i
                                                        class="fa fa-pencil"></i></a>
                                                <a href="#" class="btn btn-info shadow btn-xs sharp"><i
                                                        class="fa fa-address-card"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Joana Meireles</td>
                                        <td>joana@joana.com</td>
                                        <td>(21)2121-2121</td>
                                        <td>
                                            <div class="d-flex">
                                                <a href="#" class="btn btn-primary shadow btn-xs sharp mr-1"><i
                                                        class="fa fa-pencil"></i></a>
                                                <a href="#" class="btn btn-info shadow btn-xs sharp"><i
                                                        class="fa fa-address-card"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Haroldo Silva</td>
                                        <td>haroldo@haroldo.com</td>
                                        <td>(21)2121-2121</td>
                                        <td>
                                            <div class="d-flex">
                                                <a href="#" class="btn btn-primary shadow btn-xs sharp mr-1"><i
                                                        class="fa fa-pencil"></i></a>
                                                <a href="#" class="btn btn-info shadow btn-xs sharp"><i
                                                        class="fa fa-address-card"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Levi</td>
                                        <td>levi@levi.com</td>
                                        <td>(21)2121-2121</td>
                                        <td>
                                            <div class="d-flex">
                                                <a href="#" class="btn btn-primary shadow btn-xs sharp mr-1"><i
                                                        class="fa fa-pencil"></i></a>
                                                <a href="#" class="btn btn-info shadow btn-xs sharp"><i
                                                        class="fa fa-address-card"></i></a>
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
                    <h5 class="modal-title">Adicionar Membro</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Dados do Membro</h4>
                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label>Nome do membro</label>
                                            <select name="user" class="form-control default-select" required>
                                                <option selected>Selecione...</option>
                                                <option value="">Gilson Tavares</option>
                                                <option value="">Mariano da Silva</option>
                                            </select>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-info">Cadastrar Membro</button>
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
