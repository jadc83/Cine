<?php

namespace App\Http\Controllers;

use App\Models\Pelicula;
use Illuminate\Http\Request;

class PeliculaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $peliculas= Pelicula::all();
        return view('peliculas.index', ['peliculas' => $peliculas]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('peliculas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'titulo' => 'required|string|max:255|unique:peliculas,titulo',
        ]);
        $pelicula = new Pelicula();
        $pelicula->titulo = $validated['titulo'];
        $pelicula->save();
        session()->flash('exito', 'Pelicula creada correctamente.');
        return redirect()->route('peliculas.index');
}


    /**
     * Display the specified resource.
     */
    public function show(Pelicula $pelicula)
    {
        return view('peliculas.show', ['pelicula' => $pelicula]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pelicula $pelicula)
    {
        return view('peliculas.edit', ['pelicula' => $pelicula]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pelicula $pelicula)
    {
        $validated = $request->validate([
            'titulo' => 'required|string|max:255',
        ]);

        $pelicula->titulo = $validated['titulo'];
        $pelicula->save();
        session()->flash('exito', 'Pelicula actualizada correctamente.');

        return redirect()->route('peliculas.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pelicula $pelicula)
    {
        foreach ($pelicula->proyecciones as $proyeccion) {
            if ($proyeccion->entradas->count() > 0) {
                session()->flash('error', 'No se puede eliminar la película porque ya se vendieron entradas.');
                return redirect()->route('peliculas.index');
            }
        }
        $pelicula->proyecciones()->delete();
        $pelicula->delete();
        return redirect()->route('peliculas.index');
    }
}
