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
  {{-- nombres','apellidos','cc','email','telefono','valor','mensaje']; --}}

    <table class="table">
        <thead class="thead-dark">
          <tr>
                <th>#</th>
                <th>Nombres </th>
                <th>Apellidos</th>
                <th>cc</th>
                <th>Email</th>
                <th>Telefono</th>
                <th>Valor</th>
                <th>Mensaje</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($productos as $k)
            <tr>
             <th scope="row">{{$k->id}}</th>
              <td>{{$k->nombres}}</td>
              <td>{{$k->apellidos}}</td>
              <td>{{$k->cc}}</td>
              <td>{{$k->email}}</td>
              <td>{{$k->telefono}}</td>
              <td>{{$k->valor}}</td>
              <td>{{$k->mensaje}}</td>
              @endforeach
        </tbody>
      </table>
      
 
</body>
</html>