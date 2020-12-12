@extends('layouts.app')

@section('content')

    <div class="container">
      <form action=" {{ route('actualizar.inventario', $inventario->id ) }} " method="POST">
        @csrf
        <div class="form-group">
          <label for="nombre_inventario">nombre inventario</label>
          <input  readonly=»readonly» type="text" id="nombre_inventario" class="form-control" name="nombre" value="{{$inventario->nombre}}">
        </div>
        <div class="form-group">
          <label for="stock">Stock</label>
          <input type="text" readonly=»readonly» name="existencia_inicial" class="form-control" id="existencia_inicial" value="{{$inventario->stock}}">
        </div>
        <div class="form-group">
          <label for="Entrada">Entrada</label>
          <input name="entrada" type="number" min="0" required class="form-control" id="Entrada" value="0">
        </div>
        <div class="form-group">
          <label for="salida">Salida</label>
          <input name="salida" type="number" min="0" required class="form-control" id="salida" value="0">
        </div>
        <div class="form-group">
          <button type="submit" class="btn btn-primary">Actualizar</button>
          <a href="{{ route('inventario.registrados' ) }}" class="btn btn-secondary">Ver Registrados</a>
        </div>
      </form>
    </div>

@endsection