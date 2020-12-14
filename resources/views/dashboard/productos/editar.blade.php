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
              <form action="{{ route('producto.actualizar', $producto->id ) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                  <label  for="nombre_producto">Nombre producto</label>
                <input required type="text" name="nombre_producto" class="form-control" maxlength="30" id="nombre_producto" value="{{ $producto->nombre}}">
                </div>
                <div class="form-group">
                  <label for="stock"> Stock </label>
                  <input required type="number" name="stock" class="form-control" id="stock" min="0" max="10000" value="{{ $producto->stock}}">
                </div>
                <div class="form-group">
                  <label for="precio">Precio</label>
                  <input required type="number" name="precio" class="form-control" id="precio" min="1" max="100000"value="{{ $producto->precioActual}}">
                </div>
                <div class="form-group">
                  <label for="descripcion_corta">Especificaciones</label>
                  <textarea class="form-control" name="descripcion_corta"  id="descripcion_corta" cols="30" rows="5">{{ $producto->descripcionCorta}}</textarea>
                </div>
                <div class="form-group">
                    <label for="descripcion_larga">Características</label>
                    <textarea class="form-control" name="descripcion_larga"  id="descripcion_larga" cols="30" rows="5">{{ $producto->descripcionLarga}}</textarea>
                  </div>

                  <div class="form-group">
                    <label for="imagen">URL Imagen</label>
                    {{-- <input required type="text" name="imagen" class="form-control" id="file" value="{{ $producto->imagen}}"> --}}
                    <input  type="file" accept="image/*" src="" name="file" class="form-control" id="file">
                  </div>

                  
                   

                  {{-- aa --}}
                
                <div class="form-group">
                  <button type="submit" class="btn btn-primary">Actualizar</button>
                  <a href=" {{ route('producto.registrados' ) }} " class="btn btn-secondary">Volver</a>
                </div>
              </form>
              
            </div>
        </div>
    </div>

    <script>
      

        // $("#miImagen").attr('src', 'miruta/' + td[4].innerText)
    </script>
@endsection