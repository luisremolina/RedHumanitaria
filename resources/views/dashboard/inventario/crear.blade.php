@extends('layouts.app')

@section('content')

    <div class="container">
      <form action="{{ route('inventario.guardar') }}" method="POST">
        @csrf
        <div class="form-group">
          <label for="nombre_inventario">Nombre Inventario</label>
          <select class="form-control" name="nombre_inventario" >

              @foreach ($inv as $i)
                 <option name="nombre" value="{{$i->id}}"> {{$i->nombre}} </option>
              @endforeach

          </select>
        </div>
        <div class="form-group">
          <label for="Entrada">Cantidad</label>
          <input min="1" required name="entrada" type="number" class="form-control" id="Entrada" placeholder="Cantidad entrada">
        </div>

        <div class="form-group">
          <label for="descripcion">Descripcion</label>
          <textarea required class="form-control" name="descripcion"  id="descripcion" placeholder="Descripcion  del producto" cols="30" rows="5"></textarea>
        </div>
        
        <div class="form-group">
          <button type="submit" class="btn btn-primary">Guardar</button>
          <a href="{{ route('inventario.registrados' ) }}" class="btn btn-secondary">Ver Registrados</a>
        </div>
      </form>
    </div>

@endsection
