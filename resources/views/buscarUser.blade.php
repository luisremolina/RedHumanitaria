<form method="GET" action="{{ route('usuarios.buscar') }}">
    @csrf
        <div class="form-group row">
            <label for="dni" class="col-md-4 col-form-label text-md-right">{{ __('DNI') }}</label>

            <div class="col-md-5">
                <input required id="dni" type="text" class="form-control" name="dni" autofocus>

            </div>
            <div><button type="submit" class="btn"><i class="fa fa-search"></i></button></div>
        </div>
</form>