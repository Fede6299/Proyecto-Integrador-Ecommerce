<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <main>
        <p>El usuario {{$data['nombre']}} {{$data['apellido']}} desea ponerse en contacto con nosotros
            
        </p>
        <p>informacion de contacto</p>
        <ol>
            <li>Telefono: {{$data['telefono']}}</li>
            <li>Email: {{$data['email']}}</li>
            
        </ol>
        <h3>comentarios:</h3>
        <p>{{$data['comentario']}}</p>
    </main>
</body>
</html>