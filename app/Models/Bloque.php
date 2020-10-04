<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bloque extends Model
{

    protected $fillable = [
        'id','NombreBloque',

    ];
    public function Curso(){ //$libro->categoria->nombre
        return $this->hasMany(Curso::class); //Pertenece a una categoría.
    }
}
