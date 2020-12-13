@extends('layouts.app')

@section('content')
    <div class="container">
    <a href="{{ route('kit')}}" class="btn btn-primary"> Nuevo Kit </a>

        <div class="row justify-content-center">
          <h5 class="mb-4">REGISTROS DE KIT</h5>
            <div class="col-12 table-responsive">
              <table class="table">
                <thead class="thead-dark">
                  <tr>
                    <th>Id kit</th>
                    <th>Nombre </th>
                    <th>Elementos kit</th>
                    <th>Descripcion</th>
                    <th>Fecha Ingreso</th>
                    <th>Opciones</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($kit as $k)
                  <tr>
                  <th scope="row">{{$k->id}}</th>
                    <td>{{$k->nombre}}</td>
                    <td>{{$k->elementos_kit}}</td>
                    <td>{{$k->descripcion}}</td>
                    <td>{{$k->created_at}}</td>
                    <td>
                      <a href="{{ route('kit.editar', $k->id ) }}"><button type="button" class="btn btn-primary btn-sm">Editar</button></a>
                      
                      <form action="{{ route('kit.eliminar', $k->id ) }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                      </form>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>  

            </div>
        </div>
        {{ $kit->links() }}
    </div>
@endsection