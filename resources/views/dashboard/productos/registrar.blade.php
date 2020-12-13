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
                  <input required type="text" name="nombre_producto" class="form-control" id="nombre_producto" placeholder="Nombre del producto">
                </div>
                <div class="form-group">
                  <label for="stock"> Stock </label>
                  <input required type="number" name="stock" class="form-control" id="stock" placeholder="Stock del producto" min="1" max="6000">
                </div>
                <div class="form-group">
                  <label for="precio">Precio</label>
                  <input required type="number" name="precio" class="form-control" id="precio" placeholder="Precio">
                </div>
                <div class="form-group">
                  <label for="descripcion_corta">Descripcion corta</label>
                  <textarea required class="form-control" name="descripcion_corta"  id="descripcion_corta" placeholder="Descripcion Corta del producto" cols="30" rows="5"></textarea>
                </div>
                <div class="form-group">
                    <label for="descripcion_larga">Descripcion larga</label>
                    <textarea required class="form-control" name="descripcion_larga"  id="descripcion_larga" placeholder="Descripcion larga del producto" cols="30" rows="5"></textarea>
                  </div>
                  <div class="form-group">
                    <label for="imagen">URL Imagen</label>
                    <input required type="file" name="file" class="form-control" id="file" accept="image/*" >
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