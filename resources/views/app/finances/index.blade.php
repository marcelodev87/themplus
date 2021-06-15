@extends('app.master')

@section('css')
<!-- Datatable -->
<link rel="stylesheet" href="{{ url('backend/vendor/datatables/css/jquery.dataTables.min.css')}}" />

<!-- Custom Stylesheet -->
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
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Relatório de Movimentações</h4>
                        <div class=" align-self-end">
                            <button type="button" class="btn btn-success mb-2" data-toggle="modal"
                                data-target=".bd-example-modal-lg1">+ Cadastrar Receita</button>
                            <button type="button" class="btn btn-danger mb-2" data-toggle="modal"
                                data-target=".bd-example-modal-lg2">+ Cadastrar Despesa</button>
                        </div>

                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example3" class="display" style="min-width: 845px">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>Conta</th>
                                        <th>Categoria</th>
                                        <th>Descrição</th>
                                        <th>Valor</th>
                                        <th>Data</th>
                                        <th>Comprovante</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><img class="rounded-circle" width="35"
                                                src="{{ asset('backend/images/profile/small/pic1.jpg')}}" alt=""></td>
                                        <td>Caixa</td>
                                        <td>Dízimos</td>
                                        <td>Dízimo do João</td>
                                        <td>R$ 200,00</td>
                                        <td>23/07/2020</td>
                                        <td><i class=ti-clip></i></td>
                                        <td>
                                            <div class="d-flex">
                                                <a href="#" class="btn btn-primary shadow btn-xs sharp mr-1"><i
                                                        class="fa fa-pencil"></i></a>
                                                <a href="#" class="btn btn-danger shadow btn-xs sharp"><i
                                                        class="fa fa-trash"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><img class="rounded-circle" width="35"
                                                src="{{ asset('backend/images/profile/small/pic1.jpg')}}" alt=""></td>
                                        <td>Caixa</td>
                                        <td>Despesas</td>
                                        <td>Energia Elétrica</td>
                                        <td>R$ 200,00</td>
                                        <td>23/07/2020</td>
                                        <td><i class=ti-clip></i></td>
                                        <td>
                                            <div class="d-flex">
                                                <a href="#" class="btn btn-primary shadow btn-xs sharp mr-1"><i
                                                        class="fa fa-pencil"></i></a>
                                                <a href="#" class="btn btn-danger shadow btn-xs sharp"><i
                                                        class="fa fa-trash"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><img class="rounded-circle" width="35"
                                                src="{{ asset('backend/images/profile/small/pic1.jpg')}}" alt=""></td>
                                        <td>Caixa</td>
                                        <td>Dízimos</td>
                                        <td>Dízimo do João</td>
                                        <td>R$ 200,00</td>
                                        <td>23/07/2020</td>
                                        <td><i class=ti-clip></i></td>
                                        <td>
                                            <div class="d-flex">
                                                <a href="#" class="btn btn-primary shadow btn-xs sharp mr-1"><i
                                                        class="fa fa-pencil"></i></a>
                                                <a href="#" class="btn btn-danger shadow btn-xs sharp"><i
                                                        class="fa fa-trash"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><img class="rounded-circle" width="35"
                                                src="{{ asset('backend/images/profile/small/pic1.jpg')}}" alt=""></td>
                                        <td>Caixa</td>
                                        <td>Despesas</td>
                                        <td>Energia Elétrica</td>
                                        <td>R$ 200,00</td>
                                        <td>23/07/2020</td>
                                        <td><i class=ti-clip></i></td>
                                        <td>
                                            <div class="d-flex">
                                                <a href="#" class="btn btn-primary shadow btn-xs sharp mr-1"><i
                                                        class="fa fa-pencil"></i></a>
                                                <a href="#" class="btn btn-danger shadow btn-xs sharp"><i
                                                        class="fa fa-trash"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><img class="rounded-circle" width="35"
                                                src="{{ asset('backend/images/profile/small/pic1.jpg')}}" alt=""></td>
                                        <td>Caixa</td>
                                        <td>Dízimos</td>
                                        <td>Dízimo do João</td>
                                        <td>R$ 200,00</td>
                                        <td>23/07/2020</td>
                                        <td><i class=ti-clip></i></td>
                                        <td>
                                            <div class="d-flex">
                                                <a href="#" class="btn btn-primary shadow btn-xs sharp mr-1"><i
                                                        class="fa fa-pencil"></i></a>
                                                <a href="#" class="btn btn-danger shadow btn-xs sharp"><i
                                                        class="fa fa-trash"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><img class="rounded-circle" width="35"
                                                src="{{ asset('backend/images/profile/small/pic1.jpg')}}" alt=""></td>
                                        <td>Caixa</td>
                                        <td>Dízimos</td>
                                        <td>Dízimo do João</td>
                                        <td>R$ 200,00</td>
                                        <td>23/07/2020</td>
                                        <td><i class=ti-clip></i></td>
                                        <td>
                                            <div class="d-flex">
                                                <a href="#" class="btn btn-primary shadow btn-xs sharp mr-1"><i
                                                        class="fa fa-pencil"></i></a>
                                                <a href="#" class="btn btn-danger shadow btn-xs sharp"><i
                                                        class="fa fa-trash"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><img class="rounded-circle" width="35"
                                                src="{{ asset('backend/images/profile/small/pic1.jpg')}}" alt=""></td>
                                        <td>Caixa</td>
                                        <td>Despesas</td>
                                        <td>Energia Elétrica</td>
                                        <td>R$ 200,00</td>
                                        <td>23/07/2020</td>
                                        <td><i class=ti-clip></i></td>
                                        <td>
                                            <div class="d-flex">
                                                <a href="#" class="btn btn-primary shadow btn-xs sharp mr-1"><i
                                                        class="fa fa-pencil"></i></a>
                                                <a href="#" class="btn btn-danger shadow btn-xs sharp"><i
                                                        class="fa fa-trash"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><img class="rounded-circle" width="35"
                                                src="{{ asset('backend/images/profile/small/pic1.jpg')}}" alt=""></td>
                                        <td>Caixa</td>
                                        <td>Dízimos</td>
                                        <td>Dízimo do João</td>
                                        <td>R$ 200,00</td>
                                        <td>23/07/2020</td>
                                        <td><i class=ti-clip></i></td>
                                        <td>
                                            <div class="d-flex">
                                                <a href="#" class="btn btn-primary shadow btn-xs sharp mr-1"><i
                                                        class="fa fa-pencil"></i></a>
                                                <a href="#" class="btn btn-danger shadow btn-xs sharp"><i
                                                        class="fa fa-trash"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><img class="rounded-circle" width="35"
                                                src="{{ asset('backend/images/profile/small/pic1.jpg')}}" alt=""></td>
                                        <td>Banco Itaú</td>
                                        <td>Despesas</td>
                                        <td>Cartão de Crédito</td>
                                        <td>R$ 250,00</td>
                                        <td>23/07/2020</td>
                                        <td><i class=ti-clip></i></td>
                                        <td>
                                            <div class="d-flex">
                                                <a href="#" class="btn btn-primary shadow btn-xs sharp mr-1"><i
                                                        class="fa fa-pencil"></i></a>
                                                <a href="#" class="btn btn-danger shadow btn-xs sharp"><i
                                                        class="fa fa-trash"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><img class="rounded-circle" width="35"
                                                src="{{ asset('backend/images/profile/small/pic1.jpg')}}" alt=""></td>
                                        <td>Banco Itaú</td>
                                        <td>Despesas</td>
                                        <td>Aluguel</td>
                                        <td>R$ 2000,00</td>
                                        <td>23/07/2020</td>
                                        <td><i class=ti-clip></i></td>
                                        <td>
                                            <div class="d-flex">
                                                <a href="#" class="btn btn-primary shadow btn-xs sharp mr-1"><i
                                                        class="fa fa-pencil"></i></a>
                                                <a href="#" class="btn btn-danger shadow btn-xs sharp"><i
                                                        class="fa fa-trash"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><img class="rounded-circle" width="35"
                                                src="{{ asset('backend/images/profile/small/pic1.jpg')}}" alt=""></td>
                                        <td>Caixa</td>
                                        <td>Despesas</td>
                                        <td>Energia Elétrica</td>
                                        <td>R$ 200,00</td>
                                        <td>23/07/2020</td>
                                        <td><i class=ti-clip></i></td>
                                        <td>
                                            <div class="d-flex">
                                                <a href="#" class="btn btn-primary shadow btn-xs sharp mr-1"><i
                                                        class="fa fa-pencil"></i></a>
                                                <a href="#" class="btn btn-danger shadow btn-xs sharp"><i
                                                        class="fa fa-trash"></i></a>
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

</div>
<!---------------------------------------- MODAL RECEITAS ---------------------------------------------------->

<div class="modal fade bd-example-modal-lg1" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Receitas</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
            </div>
            <div class="modal-body">
                <div class="card">
                    <div class="card-body">
                        <div class="basic-form">
                            <form>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label>Categoria</label>
                                        <select name="revenue_categorys" id="" class="form-control default-select">
                                            <option selected>Selecione...</option>
                                            <option>Dízimos</option>
                                            <option>Ofertas</option>
                                            <option>Campanha</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Valor</label>
                                        <input name="revenue_valeu" type="text" class="form-control" placeholder="0,00">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Data</label>
                                        <input name="revenue_date" type="date" class="form-control"
                                            placeholder="00/00/0000">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Conta</label>
                                        <select name="revenue_account" id="" class="form-control default-select">
                                            <option selected>Selecione...</option>
                                            <option>Option 1</option>
                                            <option>Option 2</option>
                                            <option>Option 3</option>
                                        </select>
                                    </div>

                                    <div class="form-group col-md-12">
                                        <label for="exampleFormControlFile1">Anexar Comprovante</label>
                                        <input name="revenue_file" type="file" class="form-control-file">
                                    </div>

                                    <div class="form-group col-md-12">
                                        <label>Descrição</label>
                                        <textarea name="revenue_description" class="form-control"
                                            rows="5">Adicione uma descrição</textarea>
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-success">Cadastrar Receita</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger light" data-dismiss="modal">Sair</button>
            </div>
        </div>
    </div>
</div>
<!---------------------------------------- MODAL DESPESAS ---------------------------------------------------->
<div class="modal fade bd-example-modal-lg2" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Despesas</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
            </div>
            <div class="modal-body">
                <div class="card">
                    <div class="card-body">
                        <div class="basic-form">
                            <form>

                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label>Categoria</label>
                                        <select name="expenses_categorys" id="" class="form-control default-select">
                                            <option selected>Selecione...</option>
                                            <option>Option 1</option>
                                            <option>Option 2</option>
                                            <option>Option 3</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Valor</label>
                                        <input name="expenses_value" type="text" class="form-control"
                                            placeholder="0,00">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Data</label>
                                        <input name="expenses_date" type="date" class="form-control"
                                            placeholder="00/00/0000">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Conta</label>
                                        <select name="expenses_account" id="" class="form-control default-select">
                                            <option selected>Selecione...</option>
                                            <option>Option 1</option>
                                            <option>Option 2</option>
                                            <option>Option 3</option>
                                        </select>
                                    </div>

                                    <div class="form-group col-md-12">
                                        <label for="exampleFormControlFile1">Anexar Comprovante</label>
                                        <input name="expenses_file" type="file" class="form-control-file">
                                    </div>

                                    <div class="form-group col-md-12">
                                        <label>Descrição</label>
                                        <textarea name="expenses_description" class="form-control"
                                            rows="5">Adicione uma descrição</textarea>
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-danger">Cadastrar Despesas</button>
                            </form>
                        </div>
                    </div>
                </div>
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
<!-- Datatable -->


@endsection

@section('javascript')




<!-- Required vendors -->
<script src="{{ url('backend/vendor/global/global.min.js')}}"></script>
<script src="{{ url('backend/vendor/bootstrap-select/dist/js/bootstrap-select.min.js')}}"></script>
{{-- <script src="{{ url('backend/vendor/chart.js/Chart.bundle.min.js')}}"></script> --}}
<script src="{{ url('backend/js/custom.min.js')}}"></script>

<!-- Apex Chart -->
{{-- <script src="{{ url('backend/vendor/apexchart/apexchart.js')}}"></script> --}}

<!-- Datatable -->
<script src="{{ url('backend/vendor/datatables/js/jquery.dataTables.min.js')}}"></script>
<script src="{{ url('backend/js/plugins-init/datatables.init.js')}}"></script>

<script src="{{ url('backend/js/deznav-init.js')}}"></script>
@endsection
