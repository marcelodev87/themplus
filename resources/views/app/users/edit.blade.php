@extends('app.master')

@section('css')

<link rel="stylesheet" href="{{ url('backend/vendor/datatables/css/jquery.dataTables.min.css')}}" />
<link rel="stylesheet" href="{{ url('backend/vendor/summernote/summernote.css')}}" />
<link rel="stylesheet" href="{{ url('backend/vendor/bootstrap-select/dist/css/bootstrap-select.min.css')}}" />
<link rel="stylesheet" href="{{ url('backend/css/style.css')}}" />

@endsection

@section('content')
<!--**********************************
            Content body start justify-content-sm-end
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
        {{-- <div class="alert alert-{{ session()->get('color') }} solid alert-right-icon alert-dismissible fade show"> --}}
        <span><i class="mdi mdi-check"></i></span>
        <button type="button" class="close h-100" data-dismiss="alert"
            aria-label="Close"><span><i class="mdi mdi-close"></i></span>
        </button> {{ $error }}
    </div>
    @endforeach
    @endif
    <!-- row -->
    <div class="container-fluid">
        <div class="row page-titles mx-0">
            <div class="align-self-end">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('app.membros')}}">Membros</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">{{ $user->name}}</a></li>
                </ol>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Dados Membro</h4>
                        <div class="align-self-end">
                            <button type="button" class="btn btn-primary mb-2" data-toggle="modal"
                                data-target=".bd-example-modal-lg2">+ Histórico</button>
                            <button type="button" class="btn btn-success mb-2" data-toggle="modal"
                                data-target=".bd-example-modal-lg3">+ Dízimo/Oferta</button>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('app.membros.update', [$user->id ])}}"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <input type="hidden" name="id" value="{{ $user->id}}">
                            <!-------------------------------------------------------- Nav tabs -------------------------------->
                            <div class="default-tab">
                                <ul class="nav nav-tabs" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" data-toggle="tab" href="#profile"><i
                                                class="la la-user mr-2"></i> Dados Pessoais</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link " data-toggle="tab" href="#address"><i
                                                class="la la-home mr-2"></i> Endereço</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" href="#contact"><i
                                                class="la la-phone mr-2"></i> Contatos</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" href="#ministry"><i
                                                class="la la-address-card mr-2"></i> Dados Ministeriais</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" href="#family"><i
                                                class="la la-users mr-2"></i> Família</a>
                                    </li>
                                </ul>
                                <div class="tab-content">
                                    <!------------------------------------------------- ABA PERFIL --------------------------------------------------->
                                    <div class="tab-pane fade show active" id="profile" role="tabpanel">
                                        <div class="card">
                                            <div class="card-header">
                                                <h4 class="card-title">Dados Pessoais</h4>
                                            </div>
                                            <div class="card-body">
                                                <div class="basic-form">
                                                    <div class="form-row">
                                                        <div class="form-group col-md-4">
                                                            <div class="profile-info">
                                                                <div class="profile-photo">
                                                                    <img src="{{ url(asset('backend/images/profile/profile.png'))}}"
                                                                        class="img-fluid rounded-circle" alt="">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group col-md-4">
                                                            <div class="d-block my-4">
                                                                <h4 class="mb-3">Tipo de Cadastro</h4>
                                                                <div class="custom-control custom-radio mb-2">
                                                                    <input id="member" name="register_type" type="radio"
                                                                        value="member" class="custom-control-input"
                                                                        {{ (old('register_type') == 'member' ? 'checked' : ($user->register_type == 'member' ? 'checked' : ''))}}>
                                                                    <label class="custom-control-label"
                                                                        for="member">Membro</label>
                                                                </div>
                                                                <div class="custom-control custom-radio mb-2">
                                                                    <input id="visitor" name="register_type"
                                                                        value="visitor" type="radio"
                                                                        class="custom-control-input"
                                                                        {{ (old('register_type') == 'visitor' ? 'checked' : ($user->register_type == 'visitor' ? 'checked' : ''))}}>
                                                                    <label class="custom-control-label"
                                                                        for="visitor">Visitante</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group col-md-4">
                                                            <div class="d-block my-4">
                                                                <h4 class="mb-3">Situação</h4>
                                                                <div class="custom-control custom-radio mb-2">
                                                                    <input id="active" name="situation" type="radio"
                                                                        value="1" class="custom-control-input"
                                                                        {{ (old('situation') == 'Ativo' ? 'checked' : ($user->situation == 'Ativo' ? 'checked' : ''))}}>
                                                                    <label class="custom-control-label"
                                                                        for="active">Ativo</label>
                                                                </div>
                                                                <div class="custom-control custom-radio mb-2">
                                                                    <input id="inactive" name="situation" type="radio"
                                                                        value="0" class="custom-control-input"
                                                                        {{ (old('situation') == 'Inativo' ? 'checked' : ($user->situation == 'Inativo' ? 'checked' : ''))}}>
                                                                    <label class="custom-control-label"
                                                                        for="inactive">Inativo</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group col-md-4">
                                                            <div class="input-group mb-3">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text">Foto de Perfil</span>
                                                                </div>
                                                                <div class="custom-file">
                                                                    <input type="file" class="custom-file-input"
                                                                        name="cover">
                                                                    <label class="custom-file-label">Anexar foto</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group col-md-12">
                                                            <label>Nome Completo</label>
                                                            <input name="name" type="text" class="form-control"
                                                                value="{{ old('name') ?? $user->name }}" required>
                                                        </div>
                                                        <div class="form-group col-md-3">
                                                            <label>Data de Nascimento</label>
                                                            <input class="form-control" name="date_of_birth" type="text"
                                                                data-mask="00/00/0000"
                                                                value="{{ old('date_of_birth') ?? $user->date_of_birth}}">
                                                        </div>
                                                        <div class="form-group col-md-3">
                                                            <label>CPF</label>
                                                            <input class="form-control" name="document" type="text"
                                                                data-mask="000.000.000-00"
                                                                value="{{ old('document') ?? $user->document}}">
                                                        </div>
                                                        <div class="form-group col-md-3">
                                                            <label>RG</label>
                                                            <input class="form-control" name="document_secondary"
                                                                type="text"
                                                                value="{{ old('document_secondary') ?? $user->document_secondary}}">
                                                        </div>
                                                        <div class="form-group col-md-3">
                                                            <label>Orgão Expedidor</label>
                                                            <input class="form-control"
                                                                name="document_secondary_complement" type="text"
                                                                value="{{ old('document_secondary_complement') ?? $user->document_secondary_complement}}">
                                                        </div>
                                                        <div class="form-group col-md-3">
                                                            <label>Naturalidade</label>
                                                            <input class="form-control" name="place_of_birth"
                                                                type="text"
                                                                value="{{ old('place_of_birth') ?? $user->place_of_birth}}">
                                                        </div>
                                                        <div class="form-group col-md-3">
                                                            <label>Estado Civil</label>
                                                            <select name="civil_status"
                                                                class="form-control default-select">
                                                                <option value="married"
                                                                    {{ (old('civil_status') == 'married' ? 'selected' : ($user->civil_status == 'married' ? 'selected' : ''))}}>
                                                                    Casado</option>
                                                                <option value="separated"
                                                                    {{ (old('civil_status') == 'separated' ? 'selected' : ($user->civil_status == 'separated' ? 'selected' : ''))}}>
                                                                    Separado</option>
                                                                <option value="single"
                                                                    {{ (old('civil_status') == 'single' ? 'selected' : ($user->civil_status == 'single' ? 'selected' : ''))}}>
                                                                    Solteiro</option>
                                                                <option value="divorced"
                                                                    {{ (old('civil_status') == 'divorced' ? 'selected' : ($user->civil_status == 'divorced' ? 'selected' : ''))}}>
                                                                    Divorciado</option>
                                                                <option value="widower"
                                                                    {{ (old('civil_status') == 'widower' ? 'selected' : ($user->civil_status == 'widower' ? 'selected' : ''))}}>
                                                                    Viúvo</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group col-md-3">
                                                            <label>Escolaridade</label>
                                                            <select name="schooling"
                                                                class="form-control default-select">
                                                                <option value=""
                                                                    {{ (old('schooling') == null ? 'selected' : ($user->schooling == null ? 'selected' : ''))}}>
                                                                    Selecione...</option>
                                                                <option value="1"
                                                                    {{ (old('schooling') == '1' ? 'selected' : ($user->schooling == '1' ? 'selected' : ''))}}>
                                                                    Ensino Superior Incompleto</option>
                                                                <option value="2"
                                                                    {{ (old('schooling') == '2' ? 'selected' : ($user->schooling == '2' ? 'selected' : ''))}}>
                                                                    Ensino Superior Completo</option>
                                                                <option value="3"
                                                                    {{ (old('schooling') == '3' ? 'selected' : ($user->schooling == '3' ? 'selected' : ''))}}>
                                                                    Ensino Médio Incompleto</option>
                                                                <option value="4"
                                                                    {{ (old('schooling') == '4' ? 'selected' : ($user->schooling == '4' ? 'selected' : ''))}}>
                                                                    Ensino Superior Completo</option>
                                                                <option value="5"
                                                                    {{ (old('schooling') == '5' ? 'selected' : ($user->schooling == '5' ? 'selected' : ''))}}>
                                                                    Ensino Fundamental Incompleto</option>
                                                                <option value="6"
                                                                    {{ (old('schooling') == '6' ? 'selected' : ($user->schooling == '6' ? 'selected' : ''))}}>
                                                                    Ensino Fundamental Completo</option>
                                                                <option value="7"
                                                                    {{ (old('schooling') == '7' ? 'selected' : ($user->schooling == '7' ? 'selected' : ''))}}>
                                                                    Básico</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group col-md-3">
                                                            <label>Profissão</label>
                                                            <input class="form-control" name="occupation" type="text"
                                                                value="{{ old('occupation',$user->occupation ?? null)}}">
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
                                                        <div class="form-group col-md-2">
                                                            <label>CEP</label>
                                                            <input type="text" name="zipcode" class="form-control"
                                                                data-mask="00000-000" id="zipcode"
                                                                value="{{ old('zipcode',$address->zipcode ?? null)}}">
                                                        </div>
                                                        <div class="form-group col-md-2">
                                                            <label>UF</label>
                                                            <input type="text" name="state" class="form-control"
                                                                data-mask="AA" id="state"
                                                                value="{{ old('state',$address->state ?? null)}}">
                                                        </div>
                                                        <div class="form-group col-md-4">
                                                            <label>Cidade</label>
                                                            <input type="text" name="city" class="form-control"
                                                                id="city"
                                                                value="{{ old('city', $address->city ?? null)}}">
                                                        </div>
                                                        <div class="form-group col-md-4">
                                                            <label>Bairro</label>
                                                            <input type="text" name="neighborhood" class="form-control"
                                                                id="neighborhood"
                                                                value="{{ old('neighborhood', $address->neighborhood ?? null)}}">
                                                        </div>
                                                        <div class="form-group col-md-12">
                                                            <label>Endereço</label>
                                                            <input name="street" type="text" class="form-control"
                                                                id="street" value="{{ old('street', $address->street ?? null)}}">
                                                        </div>
                                                        <div class="form-group col-md-2">
                                                            <label>Número</label>
                                                            <input type="text" name="number" class="form-control"
                                                                data-mask="000000" id="number"
                                                                value="{{ old('number', $address->number ?? null)}}">
                                                        </div>
                                                        <div class="form-group col-md-2">
                                                            <label>Complemento</label>
                                                            <input type="text" name="complement" class="form-control"
                                                                id="complement"
                                                                value="{{ old('complement', $address->complement ?? null)}}">
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
                                    <!------------------------------------------------- ABA CONTATOS --------------------------------------------------->
                                    <div class="tab-pane fade" id="contact">
                                        <div class="pt-4">
                                            <div class="card">
                                                <div class="card-header">
                                                    <h4 class="card-title">Contatos</h4>
                                                </div>
                                                <div class="card-body">
                                                    <div class="basic-form">
                                                        <div class="form-row">
                                                            <div class="form-group col-md-4">
                                                                <label>Telefone Fixo</label>
                                                                <input name="telephone" type="text" class="form-control"
                                                                    data-mask="(00)00000-0000"
                                                                    value="{{ old('telephone') ?? $user->telephone}}">
                                                            </div>
                                                            <div class="form-group col-md-4">
                                                                <label>Celular</label>
                                                                <input class="form-control" name="cell" type="text"
                                                                    data-mask="(00)00000-0000"
                                                                    value="{{ old('cell') ?? $user->cell}}">
                                                            </div>
                                                            <div class="form-group col-md-4">
                                                                <label>Telefone Comercial</label>
                                                                <input name="telephone_commercial" type="text"
                                                                    class="form-control" data-mask="(00)00000-0000"
                                                                    value="{{ old('telephone_commercial') ?? $user->telephone_commercial}}">
                                                            </div>
                                                            <div class="form-group col-md-12">
                                                                <label>Email</label>
                                                                <input class="form-control" name="email" type="email"
                                                                    value="{{ old('email') ?? $user->email}}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!------------------------------------------------- ABA MINISTÉRIOS --------------------------------------------------->
                                    <div class="tab-pane fade" id="ministry">
                                        <div class="pt-4">
                                            <div class="card">
                                                <div class="card-header">
                                                    <h4 class="card-title">Dados Ministeriais</h4>
                                                </div>
                                                <div class="card-body">
                                                    <div class="basic-form">
                                                        <div class="form-row">
                                                            <div class="form-group col-md-6">
                                                                <label>Congregação</label>
                                                                <select name="church"
                                                                    class="form-control default-select selectpicker"
                                                                    data-live-search="true">
                                                                    <option value="" selected>Selecione a Congregação
                                                                    </option>
                                                                    @foreach ($churchs as $church)
                                                                    <option value="{{ $church->id }}"
                                                                        {{ $church->id == $user->church ? 'selected' : ''}}>
                                                                        {{ $church->name }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <div class="form-group col-md-6">
                                                                <label>Data de Batismo</label>
                                                                <input class="form-control" name="date_of_baptism"
                                                                    type="text" data-mask="00/00/0000"
                                                                    value="{{ old('date_of_baptism') ?? $user->date_of_baptism}}">
                                                            </div>
                                                            <div class="form-group col-md-4">
                                                                <label>Membro desde</label>
                                                                <input class="form-control" name="date_of_register"
                                                                    type="text" data-mask="00/00/0000"
                                                                    value="{{ old('date_of_register') ?? $user->date_of_register}}">
                                                            </div>
                                                            <div class="form-group col-md-4">
                                                                <label>Motivo</label>
                                                                <select name="reason_of_register"
                                                                    class="form-control default-select">
                                                                    <option value=""
                                                                        {{ (old('reason_of_register') == '' ? 'selected' : ($user->reason_of_register == '' ? 'selected' : ''))}}>
                                                                        Selecione...</option>
                                                                    <option value="Aclamação"
                                                                        {{ (old('reason_of_register') == 'Aclamação' ? 'selected' : ($user->reason_of_register == 'Aclamação' ? 'selected' : ''))}}>
                                                                        Aclamação</option>
                                                                    <option value="Batismo"
                                                                        {{ (old('reason_of_register') == 'Batismo' ? 'selected' : ($user->reason_of_register == 'Batismo' ? 'selected' : ''))}}>
                                                                        Batismo</option>
                                                                    <option value="Transferência"
                                                                        {{ (old('reason_of_register') == 'Transferência' ? 'selected' : ($user->reason_of_register == 'Transferência' ? 'selected' : ''))}}>
                                                                        Transferência</option>
                                                                </select>
                                                            </div>
                                                            <div class="form-group col-md-4">
                                                                <label>Igreja de Origem</label>
                                                                <input class="form-control" name="previous_church"
                                                                    type="text"
                                                                    value="{{ old('previous_church') ?? $user->previous_church}}">
                                                            </div>

                                                            <div class="form-group col-md-4">
                                                                <label>Data de Saída/Transferência</label>
                                                                <input class="form-control" name="date_of_exit"
                                                                    type="text" data-mask="00/00/0000"
                                                                    value="{{ old('date_of_exit') ?? $user->date_of_exit}}">
                                                            </div>
                                                            <div class="form-group col-md-4">
                                                                <label>Motivo</label>
                                                                <select name="reason_of_exit"
                                                                    class="form-control default-select">
                                                                    <option value=""
                                                                        {{ (old('reason_of_exit') == '' ? 'selected' : ($user->reason_of_exit == '' ? 'selected' : ''))}}>
                                                                        Selecione...</option>
                                                                    <option value="Ausência"
                                                                        {{ (old('reason_of_exit') == 'Ausência' ? 'selected' : ($user->reason_of_exit == 'Ausência' ? 'selected' : ''))}}>
                                                                        Ausência</option>
                                                                    <option value="Exclusão"
                                                                        {{ (old('reason_of_exit') == 'Exclusão' ? 'selected' : ($user->reason_of_exit == 'Exclusão' ? 'selected' : ''))}}>
                                                                        Exclusão</option>
                                                                    <option value="Solicitação"
                                                                        {{ (old('reason_of_exit') == 'Solicitação' ? 'selected' : ($user->reason_of_exit == 'Solicitação' ? 'selected' : ''))}}>
                                                                        Solicitação</option>
                                                                    <option value="Transferência"
                                                                        {{ (old('reason_of_exit') == 'Transferência' ? 'selected' : ($user->reason_of_exit == 'Transferência' ? 'selected' : ''))}}>
                                                                        Transferência</option>
                                                                </select>
                                                            </div>
                                                            <div class="form-group col-md-4">
                                                                <label>Igreja de Destino</label>
                                                                <input class="form-control" name="destiny_church"
                                                                    type="text"
                                                                    value="{{ old('destiny_church') ?? $user->destiny_church}}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card">
                                                <div class="card-header">
                                                    <h4 class="card-title">Ministérios</h4>
                                                </div>
                                                <div class="card-body">
                                                    <div class="form-group col-md-12">
                                                        @foreach ($ministries as $ministry)
                                                        <div class="form-check form-check-inline col-md-4">
                                                            <label class="form-check-label">
                                                                <input type="checkbox" class="form-check-input"
                                                                    name="ministries[]" value="{{ $ministry->id }}"
                                                                    {{ $ministries_users->contains('pivot.ministries_id', $ministry->id) ? 'checked' : '' }}>
                                                                {{ $ministry->name }}
                                                            </label>
                                                        </div>
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card">
                                                <div class="card-header">
                                                    <h4 class="card-title">Cargos Ministeriais</h4>
                                                </div>
                                                <div class="card-body">
                                                    <div class="form-group col-md-12">
                                                        <div class="form-check form-check-inline">
                                                            <label class="form-check-label">
                                                                <input type="checkbox" class="form-check-input"
                                                                    value="">Pastor(a)
                                                            </label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <label class="form-check-label">
                                                                <input type="checkbox" class="form-check-input"
                                                                    value="">Obreiro(a)
                                                            </label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <label class="form-check-label">
                                                                <input type="checkbox" class="form-check-input" value=""
                                                                    checked>Diácono(a)
                                                            </label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <label class="form-check-label">
                                                                <input type="checkbox" class="form-check-input"
                                                                    value="">Bispo(a)
                                                            </label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <label class="form-check-label">
                                                                <input type="checkbox" class="form-check-input"
                                                                    value="">Presbítero
                                                            </label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <label class="form-check-label">
                                                                <input type="checkbox" class="form-check-input"
                                                                    value="">Apóstolo
                                                            </label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <label class="form-check-label">
                                                                <input type="checkbox" class="form-check-input" value=""
                                                                    checked>Líder de Célula
                                                            </label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <label class="form-check-label">
                                                                <input type="checkbox" class="form-check-input" value=""
                                                                    checked>Líder de Ministério
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card">
                                                <div class="card-header">
                                                    <h4 class="card-title">Células</h4>
                                                </div>
                                                <div class="card-body">
                                                    <div class="form-group col-md-12">
                                                        @foreach ($groups as $group)
                                                        <div class="form-check form-check-inline col-md-4">
                                                            <label class="form-check-label">
                                                                <input type="checkbox" class="form-check-input"
                                                                    name="group[]" value="{{ $group->id }}">
                                                                {{ $group->name }}
                                                            </label>
                                                        </div>
                                                        @endforeach
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!------------------------------------------------- ABA FAMÍLIA --------------------------------------------------->
                                    <div class="tab-pane fade" id="family">
                                        <div class="pt-4">
                                            <div class="card">
                                                <div class="card-header">
                                                    <h4 class="card-title">Família</h4>
                                                </div>

                                                <div class="card-body">
                                                    <div class="basic-form">
                                                        <button type="button" class="btn btn-info mb-2"
                                                            data-toggle="modal" data-target=".bd-example-modal-lg1">+
                                                            Vincular Novo Membro da Família</button>
                                                        <hr>
                                                        <div class="table-responsive">
                                                            <table class="table table-responsive-md">
                                                                <thead>
                                                                    <tr>
                                                                        <th style="width:80px;"><strong>#</strong></th>
                                                                        <th><strong>Nome</strong></th>
                                                                        <th><strong>Parentesco</strong></th>
                                                                        <th></th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr>
                                                                        <td><strong>01</strong></td>
                                                                        <td>Mr. Bobby</td>
                                                                        <td><span
                                                                                class="badge light badge-success">Irmão</span>
                                                                        </td>
                                                                        <td>
                                                                            <div class="dropdown">
                                                                                <button type="button"
                                                                                    class="btn btn-success light sharp"
                                                                                    data-toggle="dropdown">
                                                                                    <svg width="20px" height="20px"
                                                                                        viewBox="0 0 24 24"
                                                                                        version="1.1">
                                                                                        <g stroke="none"
                                                                                            stroke-width="1" fill="none"
                                                                                            fill-rule="evenodd">
                                                                                            <rect x="0" y="0" width="24"
                                                                                                height="24" />
                                                                                            <circle fill="#000000"
                                                                                                cx="5" cy="12" r="2" />
                                                                                            <circle fill="#000000"
                                                                                                cx="12" cy="12" r="2" />
                                                                                            <circle fill="#000000"
                                                                                                cx="19" cy="12" r="2" />
                                                                                        </g>
                                                                                    </svg>
                                                                                </button>
                                                                                <div class="dropdown-menu">
                                                                                    <a class="dropdown-item"
                                                                                        href="#">Edit</a>
                                                                                    <a class="dropdown-item"
                                                                                        href="#">Delete</a>
                                                                                </div>
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td><strong>02</strong></td>
                                                                        <td>Mrs. Bobby</td>
                                                                        <td><span
                                                                                class="badge light badge-danger">Mãe</span>
                                                                        </td>
                                                                        <td>
                                                                            <div class="dropdown">
                                                                                <button type="button"
                                                                                    class="btn btn-danger light sharp"
                                                                                    data-toggle="dropdown">
                                                                                    <svg width="20px" height="20px"
                                                                                        viewBox="0 0 24 24"
                                                                                        version="1.1">
                                                                                        <g stroke="none"
                                                                                            stroke-width="1" fill="none"
                                                                                            fill-rule="evenodd">
                                                                                            <rect x="0" y="0" width="24"
                                                                                                height="24" />
                                                                                            <circle fill="#000000"
                                                                                                cx="5" cy="12" r="2" />
                                                                                            <circle fill="#000000"
                                                                                                cx="12" cy="12" r="2" />
                                                                                            <circle fill="#000000"
                                                                                                cx="19" cy="12" r="2" />
                                                                                        </g>
                                                                                    </svg>
                                                                                </button>
                                                                                <div class="dropdown-menu">
                                                                                    <a class="dropdown-item"
                                                                                        href="#">Edit</a>
                                                                                    <a class="dropdown-item"
                                                                                        href="#">Delete</a>
                                                                                </div>
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td><strong>03</strong></td>
                                                                        <td>Mr. Bobby</td>
                                                                        <td><span
                                                                                class="badge light badge-warning">Pai</span>
                                                                        </td>
                                                                        <td>
                                                                            <div class="dropdown">
                                                                                <button type="button"
                                                                                    class="btn btn-warning light sharp"
                                                                                    data-toggle="dropdown">
                                                                                    <svg width="20px" height="20px"
                                                                                        viewBox="0 0 24 24"
                                                                                        version="1.1">
                                                                                        <g stroke="none"
                                                                                            stroke-width="1" fill="none"
                                                                                            fill-rule="evenodd">
                                                                                            <rect x="0" y="0" width="24"
                                                                                                height="24" />
                                                                                            <circle fill="#000000"
                                                                                                cx="5" cy="12" r="2" />
                                                                                            <circle fill="#000000"
                                                                                                cx="12" cy="12" r="2" />
                                                                                            <circle fill="#000000"
                                                                                                cx="19" cy="12" r="2" />
                                                                                        </g>
                                                                                    </svg>
                                                                                </button>
                                                                                <div class="dropdown-menu">
                                                                                    <a class="dropdown-item"
                                                                                        href="#">Edit</a>
                                                                                    <a class="dropdown-item"
                                                                                        href="#">Delete</a>
                                                                                </div>
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
                            </div>
                            <button type="submit" class="btn btn-primary">Atualizar Dados do Membro</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!------------------------------------------------- LISTAGEM DÍZIMOS --------------------------------------------------->
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Contribuições do Membro</h4>
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
                                        <td>25/07/2020</td>
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
                                        <td>23/10/2020</td>
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
                                        <td>30/07/2020</td>
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
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!------------------------------------------------------ MODAL MEMBRO DA FAMÍLIA ---------------------------------------------->

        <div class="modal fade bd-example-modal-lg1" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Vincular Membro da Família</h5>
                        <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Dados do Parente</h4>
                                </div>
                                <div class="card-body">
                                    <div class="basic-form">
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label>Nome</label>
                                                <select name="parent_name" class="form-control selectpicker"
                                                    data-live-search="true">
                                                    <option value="" selected>Selecione...</option>

                                                    @foreach ($parents as $parent)
                                                    <option value="{{ $parent->id }}">{{ $parent->name }}</option>
                                                    @endforeach

                                                </select>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>Parentesco</label>
                                                <select name="kinship" class="form-control default-select">
                                                    <option value="" selected>Selecione...</option>
                                                    <option value="">Esposo(a)</option>
                                                    <option value="">Companheiro(a)</option>
                                                    <option value="">Pai</option>
                                                    <option value="">Mãe</option>
                                                    <option value="">Filho(a)</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-info">Vincular Membro</button>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger light" data-dismiss="modal">Sair</button>
                    </div>
                </div>
            </div>
        </div>
        <!------------------------------------------------------ MODAL MEMBRO DA FAMÍLIA ---------------------------------------------->

        <!------------------------------------------------------ MODAL HISTÓRICO ---------------------------------------------->

        <div class="modal fade bd-example-modal-lg2" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Histórico do membro</h5>
                        <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="form-row">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">DIGITE AS INFORMAÇÕES NO CAMPO ABAIXO</h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="summernote"></div>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-info">Adicionar anotação</button>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger light" data-dismiss="modal">Sair</button>
                    </div>
                </div>
            </div>
        </div>
        <!------------------------------------------------------ MODAL HISTÓRICO ---------------------------------------------->

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
<script src="{{ url('backend/js/scripts.js')}}"></script>

<!-- Required vendors -->
<script src="{{ url('backend/vendor/global/global.min.js')}}"></script>
<script src="{{ url('backend/vendor/bootstrap-select/dist/js/bootstrap-select.min.js')}}"></script>
<script src="{{ url('backend/vendor/chart.js/Chart.bundle.min.js')}}"></script>
<script src="{{ url('backend/js/custom.min.js')}}"></script>
{{--
<!-- Summernote -->
<script src="{{ url('backend/vendor/summernote/js/summernote.min.js')}}"></script>
<!-- Summernote init -->
<script src="{{ url('backend/js/plugins-init/summernote-init.js')}}"></script> --}}

<!-- Apex Chart -->
<script src="{{ url('backend/vendor/apexchart/apexchart.js')}}"></script>

<!-- Datatable -->
<script src="{{ url('backend/vendor/datatables/js/jquery.dataTables.min.js')}}"></script>
<script src="{{ url('backend/js/plugins-init/datatables.init.js')}}"></script>




<script src="{{ url('backend/js/deznav-init.js')}}"></script>

@endsection
