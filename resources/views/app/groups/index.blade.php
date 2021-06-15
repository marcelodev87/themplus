@extends('app.master')

@section('css')

<!-- Clockpicker -->
<link rel="stylesheet" href="{{ url('backend/vendor/clockpicker/css/bootstrap-clockpicker.min.css')}}">
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
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Células / Pequenos Grupos</h4>
                        <div class=" align-self-end">
                            <button type="button" class="btn btn-primary mb-2" data-toggle="modal"
                                data-target="#groupModal">+ Cadastrar Nova Célula</button>
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
                                        <th>Situação</th>
                                        <th>Data de Criação</th>
                                        <th>Data da Alteração</th>
                                        <th>Ação</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($groups as $group)
                                    <tr>
                                        <td><a href="{{ route('app.celulas.edit', $group->id)}}"
                                                class="text-primary font-weight-bold">{{ $group->name }}</a></td>
                                        <td><a target="blank" href="{{ route('app.membros.edit', $group->leader)}}"
                                                class="text-dark font-weight-bold">{{ $group->groupsLeaderId->name }}</td>
                                        <td><a target="blank" href="{{ route('app.membros.edit', $group->host)}}"
                                                class="text-dark font-weight-bold">{{ $group->hostId->name }}</td>
                                        <td><span
                                                class="badge {{ $group->situation == ('Ativo') ? 'badge-success' : 'badge-danger' }} light">{{ $group->situation }}</span>
                                        </td>
                                        <td>{{ $group->date_of_foundation }}</td>
                                        <td>{{ $group->updated_at }}</td>
                                        <td>
                                            <div class="d-flex">
                                                <a href=" {{route('app.celulas.edit', $group->id)}}"
                                                    class="btn btn-secondary shadow btn-xs mr-1"><i
                                                        class="fa fa-pencil"></i> Editar</a>
                                                <button type="button" class="btn btn-info shadow btn-xs btnInfoModal"
                                                    data-group_id="{{ $group->id }}"
                                                    data-route="{{ route('app.modal.group', $group->id)}}">
                                                    <i class="fa fa-desktop"></i> Visualizar
                                                </button>

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
    <!------------------------------------------------------ MODAL SHOW ---------------------------------------------->

<div class="modal fade" id="infoModal" tabindex="-1" role="dialog" aria-hidden="true">
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
                        <p><strong>Líder:</strong> <span id="leaderx"> </span></p>
                        <p><strong>Anfitrião:</strong> <span id="hostx"> </span></p>
                        <p><strong>Data de Fundação:</strong> <span id="date_of_foundationx">Data de Fundação: </span>
                        </p>
                        <hr>
                        <p><strong>Endereço:</strong> <span id="streetx"> </span>,
                            <span id="numberx"> </span></p>
                        <p><strong>Complemento: </strong><span id="complementx"> </span></p>
                        <p><strong>Bairro:</strong> <span id="neighborhoodx"> </span></p>
                        <p><strong>Cidade:</strong> <span id="cityx"> </span></p>
                        <p><strong>UF:</strong> <span id="statex"> </span></p>
                        <p><strong>CEP:</strong> <span id="zipcodex"> </span></p>
                        <hr>
                        <p><strong>Reuniões:</strong> <span id="sundayx"> </span><span id="mondayx"> </span><span id="tuesdayx"> </span>
                            <span id="wednesdayx"> </span><span id="thurdayx"> </span><span id="fridayx"> </span><span id="saturdayx"> </span></p>
                        <p><strong>Frequência: </strong><span id="frequencyx"> </span></p>
                        <p><strong>Local: </strong><span id="locationx"> </span></p>
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
    <!------------------------------------------------------ MODAL CÉLULA ---------------------------------------------->

    <div class="modal fade" id="groupModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Cadastro de Célula</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('app.celulas.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
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
                                                    <label class="radio-inline mr-3"><input type="radio"
                                                            name="situation" value="1"
                                                            {{ (old('situation') == '1' ? 'checked' : '')}}>
                                                        Ativa</label>
                                                    <label class="radio-inline mr-3"><input type="radio"
                                                            name="situation" value="0"
                                                            {{ (old('situation') == '0' ? 'checked' : '')}}>
                                                        Inativa</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label>Descrição da Célula</label>
                                            <input name="name" type="text" class="form-control" value="{{ old('name')}}"
                                                required>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Data da Fundação</label>
                                            <input class="form-control" name="date_of_foundation" type="text"
                                                data-mask="00/00/0000" value="{{ old('date_of_foundation')}}">
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label>Dirigente</label>
                                            <select name="leader" class="form-control selectpicker"
                                                data-live-search="true" required>
                                                <option value="" {{ (old('leader') == '' ? 'selected' : '')}}>Digite o
                                                    nome do Responsável..</option>
                                                @foreach ($users as $user)
                                                <option value="{{ $user->id}}"
                                                    {{ (old('leader') == $user->id ? 'selected' : '')}}>{{ $user->name}}
                                                </option>
                                                @endforeach
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
                                            <div class="input-group clockpicker" data-placement="bottom"
                                                data-align="top" data-autoclose="true">
                                                <input type="text" name="time" class="form-control"
                                                    placeholder="Clique para inserir a hora" value="{{ old('time')}}">
                                                <span class="input-group-append"><span class="input-group-text">
                                                        <i class="fa fa-clock-o"></i></span></span>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Frenquência</label>
                                            <select name="frequency" class="form-control default-select">
                                                <option value="" {{ (old('frequency') == '' ? 'selected' : '')}}>
                                                    Selecione a freqência das reuniões...</option>
                                                <option value="7" {{ (old('frequency') == '7' ? 'selected' : '')}}>
                                                    Semanal</option>
                                                <option value="15" {{ (old('frequency') == '15' ? 'selected' : '')}}>
                                                    Quinzenal</option>
                                                <option value="30" {{ (old('frequency') == '30' ? 'selected' : '')}}>
                                                    Mensal</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <h4 class="card-title">Reuniões</h4>
                                            <div class="form-check form-check-inline">
                                                <label class="form-check-label">
                                                    <input type="checkbox" name="sunday" class="form-check-input"
                                                        value="1" {{ (old('sunday') == '1' ? 'checked' : '')}}>Domingo
                                                </label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <label class="form-check-label">
                                                    <input type="checkbox" name="monday" class="form-check-input"
                                                        value="1"
                                                        {{ (old('monday') == '1' ? 'checked' : '')}}>Segunda-Feira
                                                </label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <label class="form-check-label">
                                                    <input type="checkbox" name="tuesday" class="form-check-input"
                                                        value="1"
                                                        {{ (old('tuesday') == '1' ? 'checked' : '')}}>Terça-Feira
                                                </label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <label class="form-check-label">
                                                    <input type="checkbox" name="wednesday" class="form-check-input"
                                                        value="1"
                                                        {{ (old('wednesday') == '1' ? 'checked' : '')}}>Quarta-Feira
                                                </label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <label class="form-check-label">
                                                    <input type="checkbox" name="thursday" class="form-check-input"
                                                        value="1"
                                                        {{ (old('thursday') == '1' ? 'checked' : '')}}>Quinta-Feira
                                                </label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <label class="form-check-label">
                                                    <input type="checkbox" name="friday" class="form-check-input"
                                                        value="1"
                                                        {{ (old('friday') == '1' ? 'checked' : '')}}>Sexta-Feira
                                                </label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <label class="form-check-label">
                                                    <input type="checkbox" name="saturday" class="form-check-input"
                                                        value="1" {{ (old('saturday') == '1' ? 'checked' : '')}}>Sábado
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label>Anfitrião</label>
                                            <select name="host" class="form-control selectpicker"
                                                data-live-search="true" required>
                                                <option value="" selected>Digite o nome do Anfitrião..</option>
                                                @foreach ($users as $user)
                                                <option value="{{ $user->id}}">{{ $user->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Local</label>
                                            <select name="location" class="form-control default-select">
                                                <option {{ (old('location') == '' ? 'selected' : '')}}>Selecione o tipo
                                                    de endereço...</option>
                                                <option value="public"
                                                    {{ (old('location') == 'public' ? 'selected' : '')}}>Espaço Público
                                                </option>
                                                <option value="church"
                                                    {{ (old('location') == 'church' ? 'selected' : '')}}>Igreja</option>
                                                <option value="college"
                                                    {{ (old('location') == 'college' ? 'selected' : '')}}>Faculdade
                                                </option>
                                                <option value="house"
                                                    {{ (old('location') == 'house' ? 'selected' : '')}}>Residência
                                                </option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <div class="form-check form-check-inline">
                                                <label class="form-check-label">
                                                    <input type="checkbox" name="hoster" class="form-check-input"
                                                        value="1" {{ (old('hoster') == '1' ? 'checked' : '')}}>
                                                    A reunião é realizada na residência do anfitrião.
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

<!-- Clockpicker  -->
<script src="{{ url('backend/vendor/clockpicker/js/bootstrap-clockpicker.min.js')}}"></script>

<!-- Apex Chart -->
<script src="{{ url('backend/vendor/apexchart/apexchart.js')}}"></script>

<!-- Datatable -->
<script src="{{ url('backend/vendor/datatables/js/jquery.dataTables.min.js')}}"></script>
<script src="{{ url('backend/js/plugins-init/datatables.init.js')}}"></script>

<!-- Clockpicker init -->
<script src="{{ url('backend/js/plugins-init/clock-picker-init.js')}}"></script>

<script src="{{ url('backend/js/deznav-init.js')}}"></script>
<script>
    $(function () {

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
      });
    });

    $('.btnInfoModal').click(function(){

        let route = $(this).attr('data-route');
        let group_id = $(this).attr('data-group-id');

        $.ajax({
            url: route,
            method: 'POST',
            data:{_method:'POST', group: group_id},
            dataType: 'json',
            success:function(response){

                if(response){

                    $('#infoModal #namex').html(response.name);
                    $('#infoModal #hostx').html(response.host);
                    $('#infoModal #leaderx').html(response.leader);

                    //===================== INFO ==========================
                    $('#infoModal #frequencyx').html(response.frequency);
                    $('#infoModal #timex').html(response.time);
                    $('#infoModal #sundayx').html(response.sunday);
                    $('#infoModal #mondayx').html(response.monday);
                    $('#infoModal #tuesdayx').html(response.tuesday);
                    $('#infoModal #wednesdayx').html(response.wednesday);
                    $('#infoModal #thursdayx').html(response.thursday);
                    $('#infoModal #fridayx').html(response.friday);
                    $('#infoModal #saturdayx').html(response.saturday);
                    $('#infoModal #locationx').html(response.location);

                    //===================== ADDRESS ==========================
                    $('#infoModal #streetx').html(response.street);
                    $('#infoModal #numberx').html(response.number);
                    $('#infoModal #complementx').html(response.complement);
                    $('#infoModal #neighborhoodx').html(response.neighborhood);
                    $('#infoModal #cityx').html(response.city);
                    $('#infoModal #statex').html(response.state);
                    $('#infoModal #zipcodex').html(response.zipcode);

                    $('#infoModal').modal('show');
                }

            }
        });
    });
</script>
<script type="text/javascript">
    @if (count($errors)>0)
        $('#groupModal').modal('show');
  @endif

</script>


@endsection
