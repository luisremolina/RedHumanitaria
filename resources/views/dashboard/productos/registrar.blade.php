@extends('layouts.app')

@section('content')
<div class="col-8">
  
  @if (count($errors) > 0)
      <div class="alert alert-danger">
          <ul>
              @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach
          </ul>
      </div>
  @endif
</div>
    

<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
              <form action="{{ route('producto.guardar') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                  <label for="nombre_producto">Nombre producto</label>
                  <input required type="text" max="30" name="nombre_producto" class="form-control" id="nombre_producto" placeholder="Nombre del producto">
                </div>
                <div class="form-group">
                  <label for="stock"> Stock </label>
                  <input required type="number" max="99999" name="stock" class="form-control" id="stock" placeholder="Stock del producto" min="1">
                </div>
                <div class="form-group">
                  <label for="precio">Precio</label>
                  <input required type="number" max="9999999" min="1" name="precio" class="form-control" id="precio" placeholder="Precio">
                </div>
                <div class="form-group">
                  <label for="descripcion_corta">Especificaciones</label>
                  <textarea required class="form-control" max="150" name="descripcion_corta"  id="descripcion_corta" placeholder="Descripcion Corta del producto" cols="30" rows="5"></textarea>
                </div>
                <div class="form-group">
                    <label for="descripcion_larga">Caracteristicas</label>
                    <textarea required class="form-control" max="300" name="descripcion_larga"  id="descripcion_larga" placeholder="Descripcion larga del producto" cols="30" rows="5"></textarea>
                  </div>
                  <div class="form-group">
                    <label for="imagen">URL Imagen</label>
                    <input required type="file" name="file" class="form-control" id="file" accept="image/*">
                    @error('file')
                <small>{{$message}}</small>
                    @enderror
                  </div>
                <div class="form-group">
                  <button type="submit" class="btn btn-primary">Guardar</button>
                  <a href=" {{ route('producto.registrados' ) }} " class="btn btn-secondary">Ver Registrados</a>
                </div>
              </form>
              
            </div>
        </div>
    </div>
@endsection