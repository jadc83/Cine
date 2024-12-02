<x-app-layout>
    <div class="container mx-auto py-8">
        @if (session('exito'))
            <div class="bg-green-500 text-white p-4 rounded mb-4">
                {{ session('exito') }}
            </div>
        @endif

        @if (session('error'))
            <div class="bg-red-500 text-white p-4 rounded mb-4">
                {{ session('error') }}
            </div>
        @endif

        <h1 class="text-3xl font-bold text-center mb-8">Lista de Películas</h1>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @foreach ($peliculas as $pelicula)
                @php
                    $total = 0;
                @endphp

                <div class="bg-white shadow-md rounded-lg overflow-hidden">
                    <div class="bg-gray-800 text-white p-4">
                        <h2 class="text-lg font-semibold">{{ $pelicula->titulo }}</h2>
                    </div>

                    <div class="bg-gray-100 text-center p-4">
                        <a href="{{ route('peliculas.show', $pelicula->id) }}"
                            class="text-white bg-blue-500 hover:bg-blue-600 px-4 py-2 rounded-full transition">
                            Ver detalles
                        </a>
                        <a href="{{ route('peliculas.edit', $pelicula->id) }}"
                            class="text-white bg-blue-500 hover:bg-blue-600 px-4 py-2 rounded-full transition">
                            Editar
                        </a>
                    </div>
                    <form action="{{ route('peliculas.destroy', $pelicula->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded">Eliminar</button>
                    </form>
                </div>
            @endforeach
        </div>
        <a href="{{ route('peliculas.create') }}"
            class="inline-block bg-blue-500 text-white px-6 py-2 rounded-full hover:bg-blue-600 mt-2">
            Crear película
        </a>
    </div>
</x-app-layout>
