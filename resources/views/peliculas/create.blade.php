<x-app-layout>
    <form action="{{ route('peliculas.store') }}" method="POST">
        @csrf
        <label for="titulo">Titulo</label>
        <input type="text" name="titulo" id="titulo" required />
        <button type="submit">Crear película</button>
    </form>
</x-app-layout>
