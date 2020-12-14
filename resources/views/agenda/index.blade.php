@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row mb-5">
            <div class="col">
                     <a class="btn btn-warning" href="{{ route('agenda.regis')}}">VER TODAS LAS CITAS REGISTRADAS</a>
            </div>
        </div>
        <div class="row">
            <div class="col">
                     <div id='calendar'></div>
            </div>
        </div>
    </div>

    <div class="modal fade" data-backdrop="static" tabindex="-1" id="agenda_modal">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Agendar</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <form id="formulario_agenda" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="fecha">Fecha</label>
                                <input type="date" class="form-control" id="txtfecha" name="txtfecha" >
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="hora_inicial">Hora Inicial</label>
                                <input type="time" class="form-control" id="hora_inicial" name="hora_inicial" >
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="tiempo">Tiempo Estimado</label>
                                <select required name="tiempo" id="tiempo" class="form-control">
                                    <option value="1">Media Hora </option>
                                    <option value="2">Una hora </option>
                                    <option value="3">Dos horas </option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="user">Usuario</label>
                                <select required name="users" id="users" class="form-control">
                                    <option value="0">Seleccione </option>
                                    @foreach ($usuarios as $user)
                                     <option value="{{$user->id}}">{{$user->nombres}} </option> 
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="descripcion">Descripcion</label>
                                <textarea required class="form-control" name="txtdescripcion" id="txtdescripcion" cols="30" rows="10"></textarea>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
              <button onclick="guardar()" type="button" class="btn btn-success">Guardar</button>
            </div>
          </div>
        </div>
      </div>
@endsection

@section('links')
<link href='{{asset('web/fullcalendar/core/main.css')}}' rel='stylesheet' />
<link href='{{asset('web/fullcalendar/daygrid/main.css')}}' rel='stylesheet' />
<link href='{{asset('web/fullcalendar/timegrid/main.css')}}' rel='stylesheet' />
<link href='{{asset('web/fullcalendar/bootstrap/main.css')}}' rel='stylesheet' />
@endsection

@section('scripts')
<script src='{{asset('web/fullcalendar/core/main.js')}}'></script>
<script src='{{asset('web/fullcalendar/interaction/main.js')}}'></script>
<script src='{{asset('web/fullcalendar/daygrid/main.js')}}'></script>
<script src='{{asset('web/fullcalendar/timegrid/main.js')}}'></script>
<script src='{{asset('web/fullcalendar/core/locales/es.js')}}'></script>
<script src='{{asset('web/fullcalendar/bootstrap/main.js')}}'></script>
<script src='{{asset('web/moment.min.js')}}'></script>

<script>
var calendar = null;
$(function(){
            var calendarEl = document.getElementById('calendar');

            calendar = new FullCalendar.Calendar(calendarEl, {
            locale: 'es',
            plugins: [ 'interaction', 'dayGrid', 'timeGrid', 'bootstrap' ],
            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'dayGridMonth,timeGridWeek,timeGridDay'
            },
            navLinks: true, // can click day/week names to navigate views
            selectable: true,
            selectMirror: true,
            select: function(arg) {
                
                let m = moment(arg.start).format("YYYY-MM-DD");
                let hora_inicial = moment(arg.start).format("HH:mm:ss");
                $("#txtfecha").val(m);
                $("#hora_inicial").val(hora_inicial);
                $("#agenda_modal").modal();
                calendar.unselect()
            },
            // eventClick: function(info) {
            //     alert("evento" + info.event.start);
            //     console.log(info.event.extendedProps);
            //     alert('Coordinates: ' + info.jsEvent.pageX + ',' + info.jsEvent.pageY);
            //     alert('View: ' + info.view.type);

            //     change the border color just for fun
            //     info.el.style.borderColor = 'red';
            // },
            editable: true,
            events: "/agenda/listar",
            

        });
            calendar.render();
    })
    function limpiar(){
        $("#agenda_modal").modal('hide');
        $("#txtfecha").val("");
        // $("#tiempo").val("");
        $("#hora_inicial").val("");
        $("#users").val("");
        $("#txtdescripcion").val("");
    }

    function guardar(){

        var descripcion = document.getElementById('txtdescripcion').value;
       
        if(descripcion.length == 0) {
            alert('No has escrito nada en la descripcion');
            return;
        }
         var usuario = document.getElementById('users').value;
        if(usuario == 0) {
            alert('Porfavor selecciona un usuario');
            return;
        }
        
        var fd = new FormData(document.getElementById("formulario_agenda"))
        let fecha = $("#txtfecha").val();
        let tiempo2 = $("#tiempo").val();
        let hora = $("#hora_inicial").val();

        let hora_inicial = moment(fecha+" "+hora).format("HH:mm:ss");
        let hora_final = 0;
        if (tiempo2 == 1){
          hora_final = moment(fecha+" "+hora).add(30, 'm').format("HH:mm:ss");
        }
        if (tiempo2 == 2){
          hora_final = moment(fecha+" "+hora).add(60, 'm').format("HH:mm:ss");
        }
        if (tiempo2 == 3){
          hora_final = moment(fecha+" "+hora).add(120, 'm').format("HH:mm:ss");
        }

        fd.append("hora_inicial", hora_inicial);
        fd.append("hora_final", hora_final);

        $.ajax({
            url: "/agenda/guardar",
            type: "POST",
            data: fd,
            processData: false,  // tell jQuery not to process the data
            contentType: false   // tell jQuery not to set contentType
        }).done(function(respuesta){
            if (respuesta && respuesta.ok) {
                calendar.refetchEvents();
                alert("Se registro en la agenda");
                limpiar();
            }else{
                alert("Ya hay una cita seleccionada para esta fecha");
            }
        });

    }
</script>
@endsection

