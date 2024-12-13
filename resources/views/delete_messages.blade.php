<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar Mensajes</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <style>
        .btn-danger {
            color: red;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Eliminar Mensajes</h1>
        <form action="/messages/delete" method="POST">
            @csrf
            <div class="form-group">
                <label for="message_ids">Selecciona los mensajes a eliminar:</label>
                <select name="message_ids[]" id="message_ids" multiple required>
                    @foreach($messages as $message)
                    <option value="{{ $message->id }}">{{
                        $message->text }}</option>
                    @endforeach
                </select>
                {{-- Para eliminar múltiples mensajes, aunque no muy intuitivamente, habría que mantener pulsado shift --}}
            </div>
            <button type="submit" class="btn-danger">Eliminar Mensajes Seleccionados?</button>
        </form>
        <a href="/messages">Volver a la lista de mensajes</a>
    </div>
</body>

</html>