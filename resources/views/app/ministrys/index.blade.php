@extends('app.master')

@section('css')

<link rel="stylesheet" href="{{ url('backend/vendor/summernote/summernote.css')}}" />
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
        <span><i class="mdi mdi-check"></i></span>
        <button type="button" class="close h-100" data-dismiss="alert" aria-label="Close"><span><i
                    class="mdi mdi-close"></i></span>
        </button> {{ session()->get('message') }}
    </div>
    @endif
    <!-- row -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Ministérios</h4>
                        <div class=" align-self-end">
                            <button type="button" class="btn btn-primary mb-2" data-toggle="modal"
                                data-target="#modalMin">+ Cadastrar Novo Ministério</button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example3" class="display" style="min-width: 845px">
                                <thead>
                                    <tr>
                                        <th>Nome</th>
                                        <th>Líder</th>
                                        <th>Status</th>
                                        <th>Data de Criação</th>
                                        <th>Data da última Alteração</th>
                                        <th>Ação</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($ministries as $ministry)
                                    <tr>
                                        <td><a href="{{ route('app.ministerios.edit', $ministry->id)}}"
                                                class="text-primary font-weight-bold">{{ $ministry->name }}</a></td>
                                        <td><a target="blank"
                                                href="{{ route('app.membros.edit', $ministry->leaderId->id)}}"
                                                class="text-dark font-weight-bold">{{ $ministry->leaderId->name }}</td>
                                        <td><span
                                                class="badge {{ $ministry->situation == ('Ativo') ? 'badge-success' : 'badge-danger' }} light">{{ $ministry->situation }}</span>
                                        </td>
                                        <td>{{ $ministry->date_of_foundation }}</td>
                                        <td>{{ $ministry->updated_at }}</td>
                                        <td>
                                            <div class="d-flex">
                                                <a href=" {{route('app.ministerios.edit', $ministry->id)}}"
                                                    class="btn btn-secondary shadow btn-xs mr-1"><i
                                                        class="fa fa-pencil"></i> Editar</a>
                                                <button type="button" class="btn btn-info shadow btn-xs btnEventModal"
                                                    data-toggle="modal" data-target-id="{{ $ministry->id }}"
                                                    data-target-name="{{ $ministry->name }}" data-target="#eventModal">
                                                    <i class="fa fa-calendar"></i> Novo Evento
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

</div>
<!------------------------------------------------------ MODAL MINISTÉRIOS ---------------------------------------------->

<div class="modal fade" id="modalMin" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Cadastro de Ministério</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
            </div>
            <div class="card">
                @if ($errors->all())
                @foreach ($errors->all() as $error)
                <div class="alert alert-danger solid alert-right-icon alert-dismissible fade show">
                    <span><i class="mdi mdi-alert"></i></span>{{ $error }}
                    <button type="button" class="close h-100" data-dismiss="alert" aria-label="Close"><span><i
                                class="mdi mdi-close"></i></span>
                    </button>
                </div>
                @endforeach
                @endif
            </div>
            <div class="modal-body">
                <form action="{{ route('app.ministerios.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="situation" value="1">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Dados do Ministério</h4>
                        </div>
                        <div class="card-body">
                            <div class="basic-form">
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label>Descrição do Ministério * - <span class="text-info">Ex.: Ministério
                                                Infantil<span></label>
                                        <input name="name" type="text" class="form-control" value="{{ old('name')}}"
                                            required>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Data da Fundação *</label>
                                        <input class="form-control mask-date" name="date_of_foundation" type="text"
                                            data-mask="00/00/0000" value="{{ old('date_of_foundation')}}" required>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Lider/Responsável *</label>
                                        <select name="leader" class="form-control selectpicker" data-live-search="true"
                                            required>
                                            <option value="" selected>Digite o nome do Responsável..</option>
                                            @foreach ($users as $user)
                                            <option value="{{ $user->id}}">{{ $user->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-info">Cadastrar Ministério</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger light" data-dismiss="modal">Fechar</button>
            </div>
        </div>
    </div>
</div>

<!------------------------------------------------------ MODAL EVENT ---------------------------------------------->

<div class="modal fade" id="eventModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Cadastro de Novo Evento</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
            </div>
            <div class="card">
                @if ($errors->all())
                @foreach ($errors->all() as $error)
                <div class="alert alert-danger solid alert-right-icon alert-dismissible fade show">
                    <span><i class="mdi mdi-alert"></i></span>{{ $error }}
                    <button type="button" class="close h-100" data-dismiss="alert" aria-label="Close"><span><i
                                class="mdi mdi-close"></i></span>
                    </button>
                </div>
                @endforeach
                @endif
            </div>
            <div class="modal-body">
                <form action="" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card">
                        <div class="card-header">
                            <h4 id="ministry_name" class="card-title"></h4>
                        </div>
                        <div class="card-body">
                            <div class="form-group col-md-12">
                                <input name="id" id="ministry_id" type="hidden" class="form-control">
                            </div>
                            <div class="form-group col-md-12">
                                <label>Nome do Evento</label>
                                <input class="form-control" name="name" type="text" value="{{ old('name')}}" placeholder="Ex.: Culto de Ação de Graças" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label>Data do Evento</label>
                                <input class="form-control" name="date_of_event" type="date"
                                    value="{{ old('date_of_event')}}" required>
                            </div>
                            <div class="form-group col-md-12">
                                <label>Local do Evento</label>
                                <input class="form-control" name="location" type="text" value="{{ old('location')}}" placeholder="Ex.: Templo, Pátio da Igreja, Praça Pública"
                                    required>
                            </div>
                            <div class="form-group col-md-12">
                                <label>Descrição do Evento</label>
                                <textarea id="summernote" name="description">{{ old('description')}}</textarea>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-info">Cadastrar Evento</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger light" data-dismiss="modal">Fechar</button>
            </div>
        </div>
    </div>
</div>

<!---------------  MODAL EVENT ---------------------------------->
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

<!-- Datepiker -->
<script src="{{url('backend/vendor/pickadate/picker.date.js')}}"></script>

<!-- Summernote -->
<script src="{{ url('backend/vendor/summernote/js/summernote.min.js')}}"></script>
<!-- Summernote init -->
<script src="{{url('backend/js/plugins-init/summernote-init.js')}}"></script>

<script src="{{ url('backend/js/scripts.js')}}"></script>

<script src="{{ url('backend/js/deznav-init.js')}}"></script>
<script type="text/javascript">
    @if (count($errors)>0)
        $('#modalMin').modal('show');
  @endif

</script>
<script>
    $(document).ready(function () {
        // summernote active
        $('#summernote').summernote();

        // EVENT MODAL FUNCTION
        $("#eventModal").on("show.bs.modal", function (e) {
            var id = $(e.relatedTarget).data('target-id');
            var name = $(e.relatedTarget).data('target-name');
            $('#ministry_id').val(id);
            $('#ministry_name').html(name);

        });
    });

</script>
@endsection
