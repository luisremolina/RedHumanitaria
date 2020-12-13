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
            <th>Dni</th>
            <th>Nombres</th>
            <th>Valor donado</th>
            <th>Telefono</th>
            <th>Edad</th>
            <th>Email</th>
            <th>Fecha de donacion</th>
            
          </tr>
        </thead>
        <tbody>
            @foreach ($donacion as $k)
            <tr>
             <th scope="row">{{$k->id}}</th>
              <td>{{$k->cc}}</td>
              <td>{{$k->nombres . " ". $k->apellidos}}</td>
              <td>{{$k->valor}}</td>
              <td>{{$k->telefono}}</td>
              <td>{{$k->edad}}</td>
              <td>{{$k->email}}</td>
              <td>{{$k->created_at}}</td>
              
              @endforeach
        </tbody>
      </table>
      
 
</body>
</html>