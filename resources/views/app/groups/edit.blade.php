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
    @if (session()->exists('message'))
    <div class="alert alert-{{ session()->get('color') }} solid alert-right-icon alert-dismissible fade show">
        <span><i class="mdi mdi-account-search"></i></span>
        <button type="button" class="close h-100" data-dismiss="alert" aria-label="Close"><span><i
                    class="mdi mdi-close"></i></span>
        </button> {{ session()->get('message') }}
    </div>
    @endif

    @if ($errors->all())
    @foreach ($errors->all() as $error)
    <div class="alert alert-danger solid alert-right-icon alert-dismissible fade show">
        {{-- <div class="alert alert-{{ session()->get('color') }} solid alert-right-icon alert-dismissible fade show">
        --}}
        <span><i class="mdi mdi-check"></i></span>
        <button type="button" class="close h-100" data-dismiss="alert" aria-label="Close"><span><i
                    class="mdi mdi-close"></i></span>
        </button> {{ $error }}
    </div>
    @endforeach
    @endif
    <!-- row -->
    <div class="container-fluid">
        <div class="row page-titles mx-0">
            <div class="align-self-end">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('app.celulas')}}">Células e Pequenos Grupos</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">{{ $group->name}}</a></li>
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
                                        <a class="nav-link active" data-toggle="tab" href="#cell"><i
                                                class="la la-file-text mr-2"></i> Dados da Célula</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" href="#days"><i
                                                class="la la-calendar-o mr-2"></i> Dias/Horários</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link " data-toggle="tab" href="#address"><i
                                                class="la la-home mr-2"></i> Endereço</a>
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
                                                                        <label class="radio-inline mr-3"><input
                                                                                type="radio" name="register_type"
                                                                                checked> Ativa</label>
                                                                        <label class="radio-inline mr-3"><input
                                                                                type="radio" name="register_type">
                                                                            Inativa</label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group col-md-12">
                                                                <label>Descrição da Célula</label>
                                                                <input name="name" type="text" class="form-control"
                                                                    value="{{ old('name') ?? $group->name}}" required>
                                                            </div>
                                                            <div class="form-group col-md-6">
                                                                <label>Data da Fundação</label>
                                                                <input class="form-control" name="date_of_foundation"
                                                                    type="text" data-mask="00/00/0000"
                                                                    value="{{ old('date_of_foundation') ?? $group->date_of_foundation}}">
                                                            </div>
                                                            <div class="form-group col-md-6">
                                                                <label>Data da última atualização</label>
                                                                <input class="form-control" name="date_last_update"
                                                                    type="text" data-mask="00/00/0000"
                                                                    value="{{ old('date_last_update') ?? $group->date_last_update}}"
                                                                    disabled>
                                                            </div>
                                                            <div class="form-group col-md-6">
                                                                <label>Dirigente</label>
                                                                <select name="leader" class="form-control selectpicker"
                                                                    data-live-search="true" required>
                                                                    <option>Selecione...</option>
                                                                    @foreach ($users as $user)
                                                                    <option value="{{ $user->id }}"
                                                                        {{ $user->id == $group->host ? 'selected' : ''}}>
                                                                        {{ $user->name }}</option>
                                                                    @endforeach
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
                                                            <label>Anfitrião</label>
                                                            <select name="host" class="form-control selectpicker"
                                                                data-live-search="true" required>
                                                                <option>Selecione...</option>
                                                                @foreach ($users as $user)
                                                                <option value="{{ $user->id }}"
                                                                    {{ $user->id == $group->host ? 'selected' : ''}}>
                                                                    {{ $user->name }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label>Local</label>
                                                            <select name="location" class="form-control default-select">
                                                                <option {{ (old('location') == '' ? 'selected' : '')}}>Selecione o tipo de endereço...</option>
                                                                <option value="public" {{ (old('location') == 'public' ? 'selected' : ($group->location == 'public' ? 'selected' : ''))}}>Espaço Público</option>
                                                                <option value="church" {{ (old('location') == 'church' ? 'selected' : ($group->location == 'church' ? 'selected' : ''))}}>Igreja</option>
                                                                <option value="college" {{ (old('location') == 'college' ? 'selected' : ($group->location == 'college' ? 'selected' : ''))}}>Faculdade</option>
                                                                <option value="house" {{ (old('location') == 'house' ? 'selected' : ($group->location == 'house' ? 'selected' : ''))}}>Residência</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="form-group col-md-6">
                                                            <label>Horário da Reunião</label>
                                                            <div class="input-group clockpicker" data-placement="bottom" data-align="top" data-autoclose="true">
                                                                <input type="text" name="time" class="form-control" placeholder="Clique para inserir a hora" value="{{ old('time') ?? $group->time}}">
                                                                <span class="input-group-append"><span class="input-group-text">
                                                                    <i class="fa fa-clock-o"></i></span></span>
                                                            </div>
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label>Frenquência</label>
                                                            <select name="frequency" class="form-control default-select">
                                                                <option value="" {{ (old('frequency') == '' ? 'selected' : ($group->frequency == '' ? 'selected' : ''))}}>Selecione a freqência das reuniões...</option>
                                                                <option value="7" {{ (old('frequency') == '7' ? 'selected' : ($group->frequency == '7' ? 'selected' : ''))}}>Semanal</option>
                                                                <option value="15" {{ (old('frequency') == '15' ? 'selected' : ($group->frequency == '15' ? 'selected' : ''))}}>Quinzenal</option>
                                                                <option value="30" {{ (old('frequency') == '30' ? 'selected' : ($group->frequency == '30' ? 'selected' : ''))}}>Mensal</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="form-group col-md-12">
                                                            <h4 class="card-title">Reuniões</h4>
                                                            <div class="form-check form-check-inline">
                                                                <label class="form-check-label">
                                                                    <input type="checkbox" name="sunday" class="form-check-input" value="1"
                                                                    {{ (old('sunday') == '1' ? 'checked' : ($group->sunday == '1' ? 'checked' : ''))}}>Domingo
                                                                </label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <label class="form-check-label">
                                                                    <input type="checkbox" name="monday" class="form-check-input" value="1"
                                                                    {{ (old('monday') == '1' ? 'checked' : ($group->monday == '1' ? 'checked' : ''))}}>Segunda-Feira
                                                                </label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <label class="form-check-label">
                                                                    <input type="checkbox" name="tuesday" class="form-check-input" value="1"
                                                                    {{ (old('tuesday') == '1' ? 'checked' : ($group->tuesday == '1' ? 'checked' : ''))}}>Terça-Feira
                                                                </label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <label class="form-check-label">
                                                                    <input type="checkbox" name="wednesday" class="form-check-input" value="1"
                                                                    {{ (old('wednesday') == '1' ? 'checked' : ($group->wednesday == '1' ? 'checked' : ''))}}>Quarta-Feira
                                                                </label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <label class="form-check-label">
                                                                    <input type="checkbox" name="thursday" class="form-check-input" value="1"
                                                                        {{ (old('thursday') == '1' ? 'checked' : ($group->thursday == '1' ? 'checked' : ''))}}>Quinta-Feira
                                                                </label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <label class="form-check-label">
                                                                    <input type="checkbox" name="friday" class="form-check-input" value="1"
                                                                    {{ (old('friday') == '1' ? 'checked' : ($group->friday == '1' ? 'checked' : ''))}}>Sexta-Feira
                                                                </label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <label class="form-check-label">
                                                                    <input type="checkbox" name="saturday" class="form-check-input" value="1"
                                                                    {{ (old('saturday') == '1' ? 'checked' : ($group->saturday == '1' ? 'checked' : ''))}}>Sábado
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

                                                        <div class="form-group col-md-12">
                                                            <div class="form-check form-check-inline">
                                                                <label class="form-check-label">
                                                                    <input type="checkbox" class="form-check-input"
                                                                        value="">A reunião é realizada na residência do
                                                                    anfitrião.
                                                                </label>
                                                            </div>
                                                        </div>
                                                        <div class="form-group col-md-2">
                                                            <label>CEP</label>
                                                            <input type="text" name="zipcode" class="form-control"
                                                                data-mask="00000-000" id="zipcode"
                                                                value="{{ old('zipcode',$group->zipcode ?? null)}}">
                                                        </div>
                                                        <div class="form-group col-md-2">
                                                            <label>UF</label>
                                                            <input type="text" name="state" class="form-control"
                                                                data-mask="AA" id="state"
                                                                value="{{ old('state',$group->state ?? null)}}">
                                                        </div>
                                                        <div class="form-group col-md-4">
                                                            <label>Cidade</label>
                                                            <input type="text" name="city" class="form-control"
                                                                id="city"
                                                                value="{{ old('city', $group->city ?? null)}}">
                                                        </div>
                                                        <div class="form-group col-md-4">
                                                            <label>Bairro</label>
                                                            <input type="text" name="neighborhood" class="form-control"
                                                                id="neighborhood"
                                                                value="{{ old('neighborhood', $group->neighborhood ?? null)}}">
                                                        </div>
                                                        <div class="form-group col-md-12">
                                                            <label>Endereço</label>
                                                            <input name="street" type="text" class="form-control"
                                                                id="street"
                                                                value="{{ old('street', $group->street ?? null)}}">
                                                        </div>
                                                        <div class="form-group col-md-2">
                                                            <label>Número</label>
                                                            <input type="text" name="number" class="form-control"
                                                                data-mask="000000" id="number"
                                                                value="{{ old('number', $group->number ?? null)}}">
                                                        </div>
                                                        <div class="form-group col-md-2">
                                                            <label>Complemento</label>
                                                            <input type="text" name="complement" class="form-control"
                                                                id="complement"
                                                                value="{{ old('complement', $group->complement ?? null)}}">
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <h1>COLOCAR MAPA DE LOCALIZAÇÃO DO ENDEREÇO</h1>
                                                        <p>https://www.youtube.com/watch?v=FkibP9Wnreo</p>
                                                    </div>
                                                </div>
                                            </div>
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
<!-- Clockpicker  -->
<script src="{{ url('backend/vendor/clockpicker/js/bootstrap-clockpicker.min.js')}}"></script>
<!-- Apex Chart -->
<script src="{{ url('backend/vendor/apexchart/apexchart.js')}}"></script>
<!-- Clockpicker init -->
<script src="{{ url('backend/js/plugins-init/clock-picker-init.js')}}"></script>

<!-- Datatable -->
<script src="{{ url('backend/vendor/datatables/js/jquery.dataTables.min.js')}}"></script>
<script src="{{ url('backend/js/plugins-init/datatables.init.js')}}"></script>

<script src="{{ url('backend/js/deznav-init.js')}}"></script>

@endsection
