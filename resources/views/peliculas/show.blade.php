<x-app-layout>
    <div class="container mx-auto py-8">
        <div class="w-3/4 mx-auto bg-white shadow-md rounded-lg">
            <div class="bg-gray-800 text-white p-6 text-center">
                <h1 class="text-3xl font-bold">{{ $pelicula->titulo }}</h1>
            </div>

            <div class="p-6">
                @php
                    $total = 0;
                @endphp

                @foreach ($pelicula->proyecciones as $proyeccion)
                    @php
                        $total += $proyeccion->entradas->count();
                    @endphp
                @endforeach

                <p class="text-gray-700 text-lg mt-4">
                    Total de entradas vendidas:
                    <span class="text-green-600 font-semibold">{{ $total }}</span>
                </p>
            </div>

            <div class="bg-gray-100 text-center p-4">
                <a href="{{ route('peliculas.index') }}" class="text-white bg-blue-500 hover:bg-blue-600 px-6 py-2 rounded-full transition">
                    Volver a la lista de películas
                </a>
            </div>
        </div>
    </div>
</x-app-layout>
