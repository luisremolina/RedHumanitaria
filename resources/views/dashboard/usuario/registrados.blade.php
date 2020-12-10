@extends('layouts.app')

@section('content')
    <div class="container">
     
        <div class="row">
           <div class="col-4">
              <a class="btn btn-primary mr-3" href="{{ route('usuarios') }}" >Nuevo Usuario</a>
              <a class="btn btn-success mr-3" href="{{ route('informeUsuarios') }}" target="_blank">Descargar PDF</a>
          </div>
          <form action="{{ route('buscar-usuario') }}" method="get">
            @csrf
            <div class="d-flex">
              <input style="width: 200px" type="search" class="form-control" name="search" placeholder="Buscar Usuario" aria-label="Nombre" aria-describedby="addon-wrapping">
              <button type="submit" class="btn"> <i class="fa fa-search"></i> </button>
            </div>
          </form>
        </div>
      
      

      <hr>
      <div class="row justify-content-center">
          <h5 class="mb-4">USUARIOS REGISTRADOS</h5>
            <div class="col-12 table-responsive">
              <table class="table">
                <thead class="thead-dark">
                  <tr>
                    <th>#</th>
                    <th>Dni</th>
                    <th>Nombres</th>
                    <th>Sexo</th>
                    <th>Telefono</th>
                    <th>Edad</th>
                    <th>Email</th>
                    <th>Admin</th>
                    <th>Opciones</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($usuarios as $usu)
                  <tr>
                  <th scope="row">{{$usu->id}}</th>
                    <td>{{$usu->dni}}</td>
                    <td>{{$usu->nombres}}</td>
                    <td>{{$usu->sexo}}</td>
                    <td>{{$usu->telefono}}</td>
                    <td>{{$usu->edad}}</td>
                    <td>{{$usu->email}}</td>
                    <td>@if ($usu->admin == 0)
                      <span class="badge badge-secondary">No admin</span>
                    @else
                    <span class="badge badge-success">Admin</span>
                    @endif
                   </td>
                    <td>
                      <a href="{{ route('editar', $usu->id ) }}"><button type="button" class="btn btn-primary btn-sm">Editar</button></a>
                      <a href="{{ route('usuarios.eliminar', $usu->id ) }}"><button type="button" class="btn btn-danger btn-sm">Eliminar</button></a>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>            
            </div>
        </div>
        {{ $usuarios->links() }}
    </div>
    
@endsection
