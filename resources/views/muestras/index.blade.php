@forelse ($muestras as $muestra)
    <li>{{ $muestra->nombre_muestra }}</li>
@empty
    <p>No muestras</p>
@endforelse