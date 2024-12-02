<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelicula extends Model
{
    public function proyecciones(){
        return $this->hasMany(Proyeccion::class);
    }
    /** @use HasFactory<\Database\Factories\PeliculaFactory> */
    use HasFactory;
}
