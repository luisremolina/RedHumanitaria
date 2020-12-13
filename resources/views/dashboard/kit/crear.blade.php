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
<<<<<<< HEAD
                  <label for="nombre_kit">Nombre kit</label>
                  <input required type="text" name="nombre_kit" class="form-control" id="nombre_kit" placeholder="Nombre kit">
=======
                  <label for="descripcion">Nombre del Kit</label>
                  <input required placeholder="Nombre del Kit" class="form-control" type="text" name="name">
>>>>>>> version2
                </div>

                <div class="form-group">
                  <label for="elementos_kit">Elementos del kit</label>
<<<<<<< HEAD
                  <textarea required name="elementos_kit" class="form-control" id="elementos_kit" cols="30" rows="3" placeholder="Elementos del kit"></textarea>
=======
                  <textarea name="elementos_kit" class="form-control" id="elementos_kit" cols="30" rows="3" placeholder="Elementos del kit"></textarea>
                </div>
                <div class="form-group">
                  <label for="cantidad">Cantidad</label>
                  <input required type="number" name="cantidad" class="form-control" id="cantidad" placeholder="Cantidad">
>>>>>>> cc28bbd06e2199780bf5ea19c79b2770e1dd4607
                </div>
               
                <div class="form-group">
                  <label for="descripcion">Descripcion</label>
                  <textarea required class="form-control" name="descripcion"  id="descripcion" placeholder="Descripcion del kit" cols="30" rows="5"></textarea>
<<<<<<< HEAD
=======
                </div>
                <div class="form-group">
                  <label for="descripcion">Inventario</label>
                  <select class="form-control" name="inventario_id" id="descripcion">
                    @foreach ($inventario as $inv)
                  <option value="{{$inv->id}}">{{$inv->nombre}}</option>    
                    @endforeach
                  </select>
>>>>>>> cc28bbd06e2199780bf5ea19c79b2770e1dd4607
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
