@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
              <form action="{{ route('kit.actualizar', $kit->id ) }}" method="POST">
                @csrf
                <div class="form-group">
                  <label for="descripcion">Nombre del Kit</label>
                <input required placeholder="Nombre del Kit" class="form-control" type="text" maxlength="30" name="name" value="{{$kit->nombre}}">
                </div>
                <div class="form-group">
                  <label for="elementos_kit">Elementos del kit</label>
                  <textarea name="elementos_kit" class="form-control" id="elementos_kit" cols="30" rows="3" maxlength="150">{{$kit->elementos_kit}}
                  </textarea>
                </div>
               
                <div class="form-group">
                  <label for="descripcion">Descripcion</label>
                  <textarea class="form-control" name="descripcion" placeholder="Descripcion corta del kit" cols="30" rows="5" maxlength="150">{{$kit->descripcion}}
                  </textarea>
                </div>
                
                <div class="form-group">
                  <button type="submit" class="btn btn-primary">Actualizar</button>
                  <a href=" {{ route('kit.registrados' ) }} " class="btn btn-secondary">Ver Registrados</a>
                </div>
              </form>
              
            </div>
        </div>
    </div>
@endsection