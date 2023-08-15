<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Pacientes</h1>
    @forelse ($pacientes as $paciente)
        <ul>
            <li>Nombre: {{ $paciente->nombre }}</li>
            <li>Apellido: {{ $paciente->apellido }}</li>
            <li>Dni: {{ $paciente->dni }}</li>
            <li>Muestra: {{ $paciente->muestras->first()-> }}</li>
        </ul>
    @empty
        <p>No hay pacientes en la base de datos</p>
    @endforelse
</body>
</html>