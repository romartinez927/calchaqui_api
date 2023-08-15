<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <li>Nombre: {{ $paciente->nombre }}</li>
    <li>Apellido: {{ $paciente->apellido }}</li>
    <li>Dni: {{ $paciente->dni }}</li>
    <li>Muestras: {{ $paciente->muestras }}</li>
    <li>Tipo de Muestra: {{ $paciente->muestras?->first()?->tipo_muestra_id }}</li>
</body>
</html>