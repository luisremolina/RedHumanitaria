<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>subir images</title>
</head>
<body>
<form action="{{route('image.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="imagen">URL Imagen</label>
            <input type="file" name="file" class="form-control" id="file" accept="image/*" >
            @error('file')
        <small>{{$message}}</small>
            @enderror
          </div>
          <button type="submit">subir</button>

    </form>
</body>
</html>