<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
      //mandamos esos datos
      protected $fillable = [
        'name', 'slug', 'descripcion','fullAcces',
    ];

    public function users(){
        //relacion de base de datos      aqui actualizamos tambien las fechas
        return $this->belongsToMany('APP\User')->withTimestamps();
    }
}
