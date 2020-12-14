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
              <form action="{{ route('kit.guardar') }}" method="POST">
                @csrf
                
                <div class="form-group">
                  <label for="nombre_kit">Nombre kit</label>
                  <input required type="text" name="name" class="form-control" maxlength="30" id="nombre_kit" placeholder="Nombre kit">
                </div>

                <div class="form-group">
                  <label for="elementos_kit">Elementos del kit</label>
                  <textarea required name="elementos_kit" class="form-control" id="elementos_kit" cols="30" rows="3" maxlength="150" placeholder="Elementos del kit"></textarea>
                </div>
               
                <div class="form-group">
                  <label for="descripcion">Descripcion</label>
                  <textarea required class="form-control" name="descripcion"  id="descripcion" placeholder="Descripcion del kit" cols="30" rows="5" maxlength="150"></textarea>
                </div>
                
                <div class="form-group">
                  <button type="submit" class="btn btn-primary">Guardar</button>
                  <a href=" {{ route('kit.registrados' ) }} " class="btn btn-secondary">Ver Registrados</a>
                </div>
              </form>
              
            </div>
        </div>
    </div>
@endsection
