<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Creación de Mensaje</title>
</head>

<body>
    <h1>Crear Nuevo Mensaje</h1>
    <form action="/messages" method="POST">
        @csrf
        <div class="form-group">
            <label for="text">Mensaje:</label>
            <textarea name="text" id="text" rows="2" required></textarea>
        </div>
        <div class="form-group">
            <label for="imagen_url">URL de la Imagen:</label>
            <input type="url" name="imagen_url" id="imagen_url" placeholder="ejemplo.com/imagen.png"> 
            {{-- Por motivo que desconozco no guarda la imagen en la BBDD... --}}
        </div>
        <button type="submit">Guardar Mensaje</button>
    </form>

    <a href="/messages">Volver a la lista de mensajes</a>
</body>

</html>