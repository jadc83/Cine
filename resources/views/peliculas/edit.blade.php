<x-app-layout>
    <form action="{{ route('peliculas.update', $pelicula) }}" method="POST">
        @csrf
        @method('PUT');
        <label for="titulo">Titulo</label>
        <input type="text" value="{{ old('titulo', $pelicula->titulo) }}" name="titulo" id="titulo"/>
        <button type="submit">Editar película</button>
    </form>
</x-app-layout>
