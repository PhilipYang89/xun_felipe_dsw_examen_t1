<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mensajes</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <style>
        a {
            text-decoration: none;
            text-transform: uppercase;
        }
        a:hover {
            text-decoration: underline;
        }
        .alert-success {
            color: green;
            text-transform: uppercase;
            font-weight: bold;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Prueba superada</h1>
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <a href="/messages/create" class="btn">Registrar Nuevo Mensaje</a>
        @if($messages->isEmpty())
        <p>No hay mensajes en la base de datos</p>
        @else
        <ul>
            @foreach($messages as $message)
            <li>{{ $message->text }}
            @if($message->imagen_url)
                <img src="{{ $message->imagen_url }}" style="width: 50px; height: 50px; margin-right: 10px;">
            @else
                <p>"Sin Imagen"</p> {{-- Si no hay imagen se muestra esto --}}
            @endif</li>
            @endforeach
        </ul>
        @endif
    </div>
</body>

</html>