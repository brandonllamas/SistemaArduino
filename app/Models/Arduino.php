<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Arduino extends Model
{
    use HasFactory;

    public function recibir($user,$pass){

        echo "NOMBRE MANDADO=".$user."       PASS=".$pass.";";

    }
}
