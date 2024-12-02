<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sala extends Model
{

    public function proyeccion(){
        return $this->belongsTo(Proyeccion::class);
    }
    /** @use HasFactory<\Database\Factories\SalaFactory> */
    use HasFactory;
}
