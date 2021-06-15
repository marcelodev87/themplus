@extends('app.master')

@section('css')
    <link rel="stylesheet" href="{{ url('backend/vendor/fullcalendar/css/main.min.css')}}"/>
    <link rel="stylesheet" href="{{ url('backend/vendor/chartist/css/chartist.min.css')}}"/>
    <link rel="stylesheet" href="{{ url('backend/vendor/bootstrap-select/dist/css/bootstrap-select.min.css')}}"/>
    <link rel="stylesheet" href="{{ url('backend/css/style.css')}}"/>
@endsection

@section('content')

<div class="content-body">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-6 col-lg-12">
                <button type="button" class="btn btn-primary mb-2" data-toggle="modal" data-target=".bd-example-modal-lg2">+ Cadastrar Evento</button>
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
                                                                <option selected>Choose...</option>
                                                                <option>Option 1</option>
                                                                <option>Option 2</option>
                                                                <option>Option 3</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label>Valor</label>
                                                            <input name="expenses_value" type="text" class="form-control" placeholder="00,00">
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label>Data</label>
                                                            <input name="expenses_date" type="date" class="form-control" placeholder="00/00/0000">
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label>Conta</label>
                                                            <select name="expenses_account" id="" class="form-control default-select">
                                                                <option selected>Choose...</option>
                                                                <option>Option 1</option>
                                                                <option>Option 2</option>
                                                                <option>Option 3</option>
                                                            </select>
                                                        </div>

                                                        <div class="form-group col-md-12">
                                                            <label for="exampleFormControlFile1">Anexar Comprovante</label>
                                                            <input name="expenses_file" type="file" class="form-control-file" >
                                                        </div>

                                                        <div class="form-group col-md-12">
                                                            <label>Descrição</label>
                                                            <textarea name="expenses_description" class="form-control" rows="5">Adicione uma descrição</textarea>
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
            </div>
        </div>
        <div class="row">
            <div class="col-xl-6 col-xxl-6 col-lg-6">
                <div class="card">
                    <div class="card-header border-0 pb-0">
                        <h4 class="card-title">Eventos de Abril 2021</h4>
                    </div>
                    <div class="card-body">
                        <div id="DZ_W_TimeLine11" class="widget-timeline dz-scroll style-1 height370">
                            <ul class="timeline">
                                <li>
                                    <div class="timeline-badge primary"></div>
                                    <a class="timeline-panel text-muted" href="#">
                                        <span>25/04/2021</span>
                                        <h6 class="mb-0">19h - <strong class="text-primary">Culto das Mulheres</strong></h6>
                                    </a>
                                </li>
                                <li>
                                    <div class="timeline-badge info">
                                    </div>
                                    <a class="timeline-panel text-muted" href="#">
                                        <span>21/04/2021</span>
                                        <h6 class="mb-0">19h - <strong class="text-info">Acampadentro Adolescentes</strong></h6>
                                        <p class="mb-0">Necessário realizar inscrição</p>
                                    </a>
                                </li>
                                <li>
                                    <div class="timeline-badge danger">
                                    </div>
                                    <a class="timeline-panel text-muted" href="#">
                                        <span>18/04/2021</span>
                                        <h6 class="mb-0">08h - <strong class="text-warning">Aula de Batismo</strong></h6>
                                    </a>
                                </li>
                                <li>
                                    <div class="timeline-badge success">
                                    </div>
                                    <a class="timeline-panel text-muted" href="#">
                                        <span>15/04/2021</span>
                                        <h6 class="mb-0">Culto dos Adolescentes</h6>
                                    </a>
                                </li>
                                <li>
                                    <div class="timeline-badge warning">
                                    </div>
                                    <a class="timeline-panel text-muted" href="#">
                                        <span>14/04/2021</span>
                                        <h6 class="mb-0">Reunião de Líderes</h6>
                                    </a>
                                </li>
                                <li>
                                    <div class="timeline-badge dark">
                                    </div>
                                    <a class="timeline-panel text-muted" href="#">
                                        <span>13/04/2021</span>
                                        <h6 class="mb-0">Café de Pastores</h6>
                                    </a>
                                </li>
                                <li>
                                    <div class="timeline-badge primary"></div>
                                    <a class="timeline-panel text-muted" href="#">
                                        <span>25/04/2021</span>
                                        <h6 class="mb-0">19h - <strong class="text-primary">Culto das Mulheres</strong></h6>
                                    </a>
                                </li>
                                <li>
                                    <div class="timeline-badge info">
                                    </div>
                                    <a class="timeline-panel text-muted" href="#">
                                        <span>21/04/2021</span>
                                        <h6 class="mb-0">19h - <strong class="text-info">Acampadentro Adolescentes</strong></h6>
                                        <p class="mb-0">Necessário realizar inscrição</p>
                                    </a>
                                </li>
                                <li>
                                    <div class="timeline-badge danger">
                                    </div>
                                    <a class="timeline-panel text-muted" href="#">
                                        <span>18/04/2021</span>
                                        <h6 class="mb-0">08h - <strong class="text-warning">Aula de Batismo</strong></h6>
                                    </a>
                                </li>
                                <li>
                                    <div class="timeline-badge success">
                                    </div>
                                    <a class="timeline-panel text-muted" href="#">
                                        <span>15/04/2021</span>
                                        <h6 class="mb-0">Culto dos Adolescentes</h6>
                                    </a>
                                </li>
                                <li>
                                    <div class="timeline-badge warning">
                                    </div>
                                    <a class="timeline-panel text-muted" href="#">
                                        <span>14/04/2021</span>
                                        <h6 class="mb-0">Reunião de Líderes</h6>
                                    </a>
                                </li>
                                <li>
                                    <div class="timeline-badge dark">
                                    </div>
                                    <a class="timeline-panel text-muted" href="#">
                                        <span>13/04/2021</span>
                                        <h6 class="mb-0">Café de Pastores</h6>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-3 col-xxl-4">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-intro-title">Calendar</h4>

                        <div class="">
                            <div id="external-events" class="my-3">
                                <p>Drag and drop your event or click in the calendar</p>
                                <div class="external-event btn-primary light" data-class="bg-primary"><i class="fa fa-move"></i><span>New Theme Release</span></div>
                                <div class="external-event btn-warning light" data-class="bg-warning"><i class="fa fa-move"></i>My Event
                                </div>
                                <div class="external-event btn-danger light" data-class="bg-danger"><i class="fa fa-move"></i>Meet manager</div>
                                <div class="external-event btn-info light" data-class="bg-info"><i class="fa fa-move"></i>Create New theme</div>
                                <div class="external-event btn-dark light" data-class="bg-dark"><i class="fa fa-move"></i>Project Launch</div>
                                <div class="external-event btn-secondary light" data-class="bg-secondary"><i class="fa fa-move"></i>Meeting</div>
                            </div>
                            <!-- checkbox -->
                            <div class="checkbox custom-control checkbox-event custom-checkbox pt-3 pb-5">
                                <input type="checkbox" class="custom-control-input" id="drop-remove">
                                <label class="custom-control-label" for="drop-remove">Remove After Drop</label>
                            </div>
                            <a href="javascript:void()" data-toggle="modal" data-target="#add-category" class="btn btn-primary btn-event w-100">
                                <span class="align-middle"><i class="ti-plus"></i></span> Create New
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-9 col-xxl-8">
                <div class="card">
                    <div class="card-body">
                        <div id="calendar" class="app-fullcalendar"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>




@endsection

@section('javascript')

    <!-- Required vendors -->
    <script src="{{ url('backend/vendor/global/global.min.js')}}"></script>
    <script src="{{ url('backend/vendor/bootstrap-select/dist/js/bootstrap-select.min.js')}}"></script>
    <script src="{{ url('backend/vendor/chart.js/Chart.bundle.min.js')}}"></script>
    <script src="{{ url('backend/js/custom.min.js')}}"></script>
    <script src="{{ url('backend/vendor/moment/moment.min.js')}}"></script>
    <script src="{{ url('backend/vendor/fullcalendar/js/main.min.js')}}"></script>

    <!-- Apex Chart -->
    <script src="{{ url('backend/vendor/apexchart/apexchart.js')}}"></script>

    <!-- Chartist -->
    <script src="{{ url('backend/vendor/chartist/js/chartist.min.js')}}"></script>
    <script src="{{ url('backend/vendor/chartist-plugin-tooltips/js/chartist-plugin-tooltip.min.js')}}"></script>

    <!-- Flot -->
    <script src="{{ url('backend/vendor/flot/jquery.flot.js')}}"></script>
    <script src="{{ url('backend/vendor/flot/jquery.flot.pie.js')}}"></script>
    <script src="{{ url('backend/vendor/flot/jquery.flot.resize.js')}}"></script>
    <script src="{{ url('backend/vendor/flot-spline/jquery.flot.spline.min.js')}}"></script>

    <!-- Chart sparkline plugin files -->
    <script src="{{ url('backend/vendor/jquery-sparkline/jquery.sparkline.min.js')}}"></script>
    <script src="{{ url('backend/js/plugins-init/sparkline-init.js')}}"></script>

    <!-- Chart piety plugin files -->
    <script src="{{ url('backend/vendor/peity/jquery.peity.min.js')}}"></script>
    <script src="{{ url('backend/js/plugins-init/piety-init.js')}}"></script>

    <!-- Init file -->
    <script src="{{ url('backend/js/plugins-init/widgets-script-init.js')}}"></script>

    <script src="{{ url('backend/js/deznav-init.js')}}"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {

          /* initialize the external events
          -----------------------------------------------------------------*/

          var containerEl = document.getElementById('external-events');
          new FullCalendar.Draggable(containerEl, {
            itemSelector: '.external-event',
            eventData: function(eventEl) {
              return {
                title: eventEl.innerText.trim()
              }
            }

          });

          //// the individual way to do it
          // var containerEl = document.getElementById('external-events-list');
          // var eventEls = Array.prototype.slice.call(
          //   containerEl.querySelectorAll('.fc-event')
          // );
          // eventEls.forEach(function(eventEl) {
          //   new FullCalendar.Draggable(eventEl, {
          //     eventData: {
          //       title: eventEl.innerText.trim(),
          //     }
          //   });
          // });

          /* initialize the calendar
          -----------------------------------------------------------------*/

          var calendarEl = document.getElementById('calendar');
          var calendar = new FullCalendar.Calendar(calendarEl, {
            headerToolbar: {
              left: 'prev,next today',
              center: 'title',
              right: 'dayGridMonth,timeGridWeek,timeGridDay'
            },

            selectable: true,
            selectMirror: true,
            select: function(arg) {
              var title = prompt('Event Title:');
              if (title) {
                calendar.addEvent({
                  title: title,
                  start: arg.start,
                  end: arg.end,
                  allDay: arg.allDay
                })
              }
              calendar.unselect()
            },

            editable: true,
            droppable: true, // this allows things to be dropped onto the calendar
            drop: function(arg) {
              // is the "remove after drop" checkbox checked?
              if (document.getElementById('drop-remove').checked) {
                // if so, remove the element from the "Draggable Events" list
                arg.draggedEl.parentNode.removeChild(arg.draggedEl);
              }
            },
            initialDate: '2021-02-13',
                weekNumbers: true,
                navLinks: true, // can click day/week names to navigate views
                editable: true,
                selectable: true,
                nowIndicator: true,
             events: [
                  {
                    title: 'All Day Event',
                    start: '2021-02-01'
                  },
                  {
                    title: 'Long Event',
                    start: '2021-02-07',
                    end: '2021-02-10',
                    className: "bg-danger"
                  },
                  {
                    groupId: 999,
                    title: 'Repeating Event',
                    start: '2021-02-09T16:00:00'
                  },
                  {
                    groupId: 999,
                    title: 'Repeating Event',
                    start: '2021-02-16T16:00:00'
                  },
                  {
                    title: 'Conference',
                    start: '2021-02-11',
                    end: '2021-02-13',
                    className: "bg-danger"
                  },
                  {
                    title: 'Meeting',
                    start: '2021-02-12T10:30:00',
                    end: '2021-02-12T12:30:00',
                    className:"bg-info"
                  },
                  {
                    title: 'Lunch',
                    start: '2021-02-12T12:00:00'
                  },
                  {
                    title: 'Meeting',
                    start: '2021-04-12T14:30:00'
                  },
                  {
                    title: 'Happy Hour',
                    start: '2021-07-12T17:30:00'
                  },
                  {
                    title: 'Dinner',
                    start: '2021-02-12T20:00:00',
                    className: "bg-warning"
                  },
                  {
                    title: 'Birthday Party',
                    start: '2021-02-13T07:00:00',
                    className: "bg-secondary"
                  },
                  {
                    title: 'Click for Google',
                    url: 'http://google.com/',
                    start: '2021-02-28'
                  }
                ]
          });
          calendar.render();

        });
      </script>

@endsection
