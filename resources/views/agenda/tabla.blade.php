@extends('layouts.app')
@section('content')
  <div class="container">
      <div class="row">
          <div class="col">
            <table class="table">
                <thead class="thead-dark">
                  <tr>
                    <th>#</th>            
                    <th>ID de usuario</th>
                    <th>Fecha</th>
                    <th>Hora inicio</th>
                    <th>Hora fin</th>
                    <th>Descripcion</th>
                    <th>Opciones</th>
        
                   
                  </tr>
                </thead>
                <tbody>
                    @foreach ($agenda as $k)
                    <tr>
                     <th scope="row">{{$k->id}}</th>
        
                      <td>{{$k->usuario_id}}</td>
                      <td>{{$k->fecha}}</td>
                      <td>{{$k->hora_inicial}}</td>
                      <td>{{$k->hora_final}}</td>
                      <td>{{$k->descripcion}}</td>
                      <td>
                          <a class="btn btn-danger" href="{{route('borrar.cita', $k->id)}}">Eliminar</a>
                      </td>
                      @endforeach
                </tbody>
              </table>
          </div>
      </div>
  </div>
@endsection