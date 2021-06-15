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
        @if ($errors->all())
        @foreach ($errors->all() as $error)
        @message(['color' => 'orange'])
        <p class="icon-asterisk">{{ $error }}</p>
        @endmessage
        @endforeach
        @endif
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Igreja / Congregações</h4>
                        <div class=" align-self-end">
                            <button type="button" class="btn btn-primary mb-2" data-toggle="modal"
                                data-target=".bd-example-modal-lg1"> + Cadastrar Nova Congregação</button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example3" class="display" style="min-width: 845px">
                                <thead>
                                    <tr>
                                        <th>#Id</th>
                                        <th>Nome</th>
                                        <th>Dirigente Local</th>
                                        <th>Data de Criação</th>
                                        <th>Ação</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($churchs as $church)
                                    <tr>
                                        <td> {{ $church->id }}</td>
                                        <td><a href="{{ route('app.igreja.edit', $church->id)}}"
                                                class="text-primary font-weight-bold">{{ $church->name }}</a></td>
                                        <td><a target="blank"
                                                href="{{ route('app.membros.edit', $church->leaderId->id)}}"
                                                class="text-dark font-weight-bold">{{ $church->leaderId->name }}</td>
                                        <td>{{ $church->date_of_foundation }}</td>
                                        <td>
                                            <div class="d-flex">
                                                <a href="{{ route('app.igreja.edit', $church->id)}}"
                                                    class="btn btn-secondary shadow btn-xs mr-1"><i
                                                        class="fa fa-pencil"></i> Editar </a>
                                                <button type="button" class="btn btn-info shadow btn-xs btnChurchModal"
                                                    data-church_id="{{ $church->id }}"
                                                    data-route="{{ route('app.modal.church', $church->id)}}">
                                                    <i class="fa fa-desktop"></i> Visualizar
                                                </button>

                                                </a>

                                            </div>
                                        </td>
                                    </tr>

                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<!------------------------------------------------------ MODAL NOVA CONGREGAÇÃO ---------------------------------------------->

<div class="modal fade bd-example-modal-lg1" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Cadastro de Congregação</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
            </div>
            <div class="modal-body">
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
                                        <label>Descrição da Congregação - <span class="text-info">Ex.: Filial São Paulo 01</span></label>
                                        <input name="name" type="text" class="form-control" value="{{ old('name')}}"
                                            required>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Data da Fundação</label>
                                        <input class="form-control" name="date_of_foundation" type="text"
                                            data-mask="00/00/0000" value="{{ old('date_of_foundation')}}">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>CNPJ</label>
                                        <input class="form-control mask-cnpj" id="document" name="document" type="text"
                                            value="{{ old('document')}}">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Dirigente</label>
                                        <select name="leader" class="form-control selectpicker" data-live-search="true"
                                            required>
                                            <option selected>Digite o nome do Responsável</option>
                                            @foreach ($users as $user)
                                            <option value="{{ $user->id}}">{{ $user->name}}</option>
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
                                    <input type="text" name="zipcode" class="form-control mask-zipcode" id="zipcode"
                                        value="{{ old('zipcode')}}" size="10" maxlength="9">
                                </div>
                                <div class="form-group col-md-6">
                                    <label>UF</label>
                                    <input type="text" name="state" class="form-control" id="state"
                                        value="{{ old('state')}}">
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Cidade</label>
                                    <input type="text" name="city" class="form-control" id="city"
                                        value="{{ old('city')}}">
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Bairro</label>
                                    <input type="text" name="neighborhood" class="form-control" id="neighborhood"
                                        value="{{ old('neighborhood')}}">
                                </div>
                                <div class="form-group col-md-12">
                                    <label>Endereço</label>
                                    <input name="street" type="text" class="form-control" value="{{ old('street')}}"
                                        id="street">
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Número</label>
                                    <input type="text" name="number" class="form-control" data-mask="000000" id="number"
                                        value="{{ old('number')}}">
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Complemento</label>
                                    <input type="text" name="complement" class="form-control" id="complement"
                                        value="{{ old('complement')}}">
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-info">Cadastrar Congregação</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger light" data-dismiss="modal">Fechar</button>
            </div>
        </div>
    </div>
</div>

<!------------------------------------------------------ MODAL SHOW ---------------------------------------------->

<div class="modal fade" id="churchModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Dados da Congregação</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
            </div>
            <div class="modal-body">

                <div class="card">
                    <div class="card-header">
                        <h4 id="name" class="card-title"></h4>
                    </div>
                    <div class="card-body">
                        <h1></h1>
                        <p><strong>Líder:</strong> <span id="leader"> </span></p>
                        <p><strong>Data de Fundação:</strong> <span id="date_of_foundation">Data de Fundação: </span>
                        </p>
                        <hr>
                        <p><strong>Endereço:</strong> <span id="street"> </span>,
                            <span id="number"> </span></p>
                        <p><strong>Complemento: </strong><span id="complement"> </span></p>
                        <p><strong>Bairro:</strong> <span id="neighborhood"> </span></p>
                        <p><strong>Cidade:</strong> <span id="city"> </span></p>
                        <p><strong>UF:</strong> <span id="state"> </span></p>
                        <p><strong>CEP:</strong> <span id="zipcode"> </span></p>
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger light" data-dismiss="modal">Fechar</button>
            </div>
        </div>
    </div>
</div>

<!---------------  MODAL SHOW ---------------------------------->

<!--********************************** Content body end ***********************************-->
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

<script>
    $(function () {

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
      });
    });

    $('.btnChurchModal').click(function(){

        let route = $(this).attr('data-route');
        let church_id = $(this).attr('data-church-id');

        $.ajax({
            url: route,
            method: 'POST',
            data:{_method:'POST', church: church_id},
            dataType: 'json',
            success:function(response){

                if(response){

                    $('#churchModal #name').html(response.name);
                    $('#churchModal #leader').html(response.leader);
                    $('#churchModal #date_of_foundation').html(response.date_of_foundation);
                    $('#churchModal #street').html(response.street);
                    $('#churchModal #number').html(response.number);
                    $('#churchModal #complement').html(response.complement);
                    $('#churchModal #neighborhood').html(response.neighborhood);
                    $('#churchModal #city').html(response.city);
                    $('#churchModal #state').html(response.state);
                    $('#churchModal #zipcode').html(response.zipcode);
                    $('#churchModal').modal('show');
                }

            }
        });
    });
</script>
@endsection
