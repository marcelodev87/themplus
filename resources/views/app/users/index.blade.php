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
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Lista de Membros</h4>
                        <div class=" align-self-end">
                            <button type="button" class="btn btn-primary mb-2" data-toggle="modal"
                                data-target="#userModal">+ Cadastrar Novo Membro</button>
                        </div>

                    </div>
                    <!------------------------------------------------------ TABELA ---------------------------------------------->
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example3" class="display text-center" style="min-width: 845px">
                                <thead>
                                    <tr>
                                        <th>Nome</th>
                                        <th>Congregação</th>
                                        <th>Sexo</th>
                                        <th>Telefone</th>
                                        <th>Email</th>
                                        <th>Situação</th>
                                        <th>Data de Nascimento</th>
                                        <th>Ação</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user )
                                    <tr>
                                        <td><a href="{{ route('app.membros.edit', $user->id)}}"
                                                class="text-primary font-weight-bold">
                                                {{ $user->name }}</a></td>
                                        <td>Matriz</td>
                                        <td><span
                                                class="badge {{ $user->genre == ('Masculino') ? 'badge-info' : 'badge-danger' }} light">{{ $user->genre }}</span>
                                        </td>
                                        <td>{{ $user->cell }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td><span
                                                class="badge {{ $user->situation == ('Ativo') ? 'badge-success' : 'badge-danger' }} light">{{ $user->situation }}</span>
                                        </td>
                                        <td>{{ $user->date_of_birth }}</td>
                                        <td>
                                            <div class="d-flex">
                                                <a href="{{ route('app.membros.edit', $user->id)}}"
                                                    class="btn btn-secondary shadow btn-xs mr-1"><i
                                                        class="fa fa-pencil"></i> Editar</a>
                                                <a href="#" class="btn btn-danger shadow btn-xs"><i
                                                        class="fa fa-trash"></i> Excluir</a>
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
<!--------------------------------------------------- MODAL MEMBRO ---------------------------------------------------------->
<div class="modal fade" id="userModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Cadastro de Membro</h5>
                <button type="button" class="close"
                    data-dismiss="modal"><span>&times;</span></button>
            </div>
            <div class="card">
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
            </div>
            <div class="modal-body">
                <form action="{{ route('app.membros.store')}}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Dados Pessoais</h4>
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
                                                        value="member"
                                                        {{ (old('register_type') == 'member' ? 'checked' : '')}}
                                                        checked> Membro</label>
                                                <label class="radio-inline mr-3"><input
                                                        type="radio" name="register_type"
                                                        value="visitor"
                                                        {{ (old('register_type') == 'visitor' ? 'checked' : '')}}>
                                                    Visitante</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label>Nome Completo</label>
                                        <input name="name" type="text" class="form-control"
                                            value="{{ old('name')}}">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Data de Nascimento</label>
                                        <input class="form-control mask-date"
                                            name="date_of_birth" type="text"
                                            data-mask="00/00/0000"
                                            value="{{ old('date_of_birth')}}">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>CPF</label>
                                        <input class="form-control mask-doc" name="document"
                                            type="text" data-mask="000.000.000-00"
                                            value="{{ old('document')}}">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Celular</label>
                                        <input class="form-control mask-cell" name="cell"
                                            type="text" value="{{ old('cell')}}">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Email</label>
                                        <input class="form-control" name="email" type="email"
                                            value="{{ old('email')}}">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Sexo</label>
                                        <select name="genre" class="form-control default-select"
                                            required>
                                            <option value=""
                                                {{ (old('genre') == null ? 'selected' : '')}}>
                                                Selecione...</option>
                                            <option value="male"
                                                {{ (old('genre') == 'male' ? 'selected' : '')}}>
                                                Masculino</option>
                                            <option value="female"
                                                {{ (old('genre') == 'female' ? 'selected' : '')}}>
                                                Feminino</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Estado Civil</label>
                                        <select name="civil_status"
                                            class="form-control default-select">
                                            <option {{ (old('civil_status') == '' ? 'selected' : '')}}>Selecione...</option>
                                            <option value="married"
                                                {{ (old('civil_status') == 'married' ? 'selected' : '')}}>
                                                Casado</option>
                                            <option value="separated"
                                                {{ (old('civil_status') == 'separated' ? 'selected' : '')}}>
                                                Separado</option>
                                            <option value="single"
                                                {{ (old('civil_status') == 'single' ? 'selected' : '')}}>
                                                Solteiro</option>
                                            <option value="divorced"
                                                {{ (old('civil_status') == 'divorced' ? 'selected' : '')}}>
                                                Divorciado</option>
                                            <option value="widower"
                                                {{ (old('civil_status') == 'widower' ? 'selected' : '')}}>
                                                Viúvo</option>
                                        </select>
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
                                        <input type="text" class="form-control mask-zipcode"
                                            name="zipcode" id="zipcode" size="10" maxlength="9">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>UF</label>
                                        <input type="text" name="state" class="form-control"
                                            id="state">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Cidade</label>
                                        <input type="text" name="city" class="form-control"
                                            id="city">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Bairro</label>
                                        <input type="text" name="neighborhood"
                                            class="form-control" id="neighborhood">
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label>Endereço</label>
                                        <input name="street" type="text" class="form-control"
                                            id="street">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Número</label>
                                        <input type="text" name="street_number"
                                            class="form-control" data-mask="000000"
                                            id="street_number">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Complemento</label>
                                        <input type="text" name="complement"
                                            class="form-control" id="complement">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success">Cadastrar Membro</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger light"
                    data-dismiss="modal">Sair</button>
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

<!-- Apex Chart -->
<script src="{{ url('backend/vendor/apexchart/apexchart.js')}}"></script>

<!-- Datatable -->
<script src="{{ url('backend/vendor/datatables/js/jquery.dataTables.min.js')}}"></script>
<script src="{{ url('backend/js/plugins-init/datatables.init.js')}}"></script>

<script src="{{ url('backend/js/deznav-init.js')}}"></script>

<script type="text/javascript">
    @if (count($errors)>0)
        $('#userModal').modal('show');
  @endif

</script>

@endsection
