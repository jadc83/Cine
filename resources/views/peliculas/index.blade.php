<x-app-layout>
    @foreach ($peliculas as $pelicula)
        <?php
        $total = 0;
        ?>
        {{ $pelicula->titulo }}
        @foreach ($pelicula->proyecciones as $proyeccion)
            <?php
            $total += $proyeccion->entradas->count();
            ?>
        @endforeach
        {{ $total }}
    @endforeach
</x-app-layout>
