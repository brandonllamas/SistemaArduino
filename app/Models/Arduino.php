<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Arduino extends Model
{
    use HasFactory;

    public function recibir($idCurso,$Temperatura,$Tarjeta){

        $curso=Curso::find($idCurso);
        if($curso==null){
            echo "ERROR";
        }else{
            $alumno=DB::table('users')
            ->select('id')
            ->where('IdCarnet','=',$Tarjeta)
            ->get();

            if($alumno->isEmpty()){
                echo "ERROR";
            }else{
                $carbon = new \Carbon\Carbon();
                $date = $carbon->now();
                $nuevoIngreso= new \App\Models\IngresoCurso();
                $nuevoIngreso->curso_id=$idCurso;
                $nuevoIngreso->Usuario_id=$Tarjeta;
                $nuevoIngreso->Temperatura=$Temperatura;
                $nuevoIngreso->Ingreso=true;
                $nuevoIngreso->Salio =false;
                $nuevoIngreso->Fecha=$date;
                $nuevoIngreso->save();

               echo "Terminado";

            }

        }


    }

    public function prueba($idCurso){
        $curso=Curso::find($idCurso);
        if($curso==null){
            echo "ERROR";
        }else{
            echo "si existe";
        }

    }
}
