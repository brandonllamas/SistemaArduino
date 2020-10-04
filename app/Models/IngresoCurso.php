<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IngresoCurso extends Model
{
    protected $fillable = [
        'nombreCurso', 'Capacidad ','Estado_Curso',
    ];
    public function users(){
        //relacion de base de datos      aqui actualizamos tambien las fechas
        return $this->belongsToMany('APP\User')->withTimestamps();
    }
}
