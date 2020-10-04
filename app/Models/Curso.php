<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{

    protected $fillable = [
        'id','nombreCurso', 'Capacidad','Estado_Curso',
    ];

    public function bloque(){ //$libro->categoria->nombre
        return $this->belongsToMany('App\Models\Bloque')->withTimestamps();; //Pertenece a una categoría.
    }

}
