<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <title>pruebas</title>
</head>
<body>

    <table class="table">
        <thead class="thead-dark">
          <tr>
                <th>#</th>
                <th>Nombre </th>
                <th>Stock</th>
                <th>Precio Anterior</th>
                <th>Precio Actual</th>
                <th>Fecha Ingreso</th>
                <th>Descripcion</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($productos as $k)
            <tr>
             <th scope="row">{{$k->id}}</th>
              <td>{{$k->nombre}}</td>
              <td>{{$k->stock}}</td>
              <td>{{$k->precioAnterior}}</td>
              <td>{{$k->precioActual}}</td>
              <td>{{$k->created_at}}</td>
              <td>{{$k->descripcionCorta}}</td>
              @endforeach
        </tbody>
      </table>
      
 
</body>
</html>