<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Query\Builder;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\DB;

class Admin extends Model
{
    use HasFactory;

    //Editar usuario
    public function editar($id)
    {
        $user = \App\Models\User::findOrFail($id);
        return view('User.admin.Action.Actualizar', compact('user'));
    }

    public function UpdateUser(Request $request, $id)
    {
        $notaActualizada = \App\Models\User::find($id);
        $notaActualizada->name = $request->name;
        $notaActualizada->email = $request->email;
        $notaActualizada->cedula = $request->cedula;
        $notaActualizada->IdCarnet = $request->IdCarnet;

        $notaActualizada->save();
        return $notaActualizada;



    }






    //agregamos profesores
    public function createTeacher(Request $request)
    {


                    // user doesn't exist
                    $user = new \App\Models\User;
                    $user->name = $request->name;
                    $user->cedula = $request->cedula;
                    $user->email = $request->email;
                    $user->IdCarnet = $request->IdCarnet;
                    $user->password = Hash::make($request->password);
                    $user->save();
                    $user->roles()->sync(3);
        return $user;
    }

    //ver profesores
    public function IndexProfesores(Request $request)
    {

        if($request->ajax()){

            $profesores=DB::table('users')
            ->join('role_user', 'role_user.user_id', '=', 'users.id')
            ->where('role_user.role_id','=',3)
            ->get();

            return $profesores;
        }else{
            return view('User.admin.indexRoot');
        }

    }
    public function eliminarProfesor($id)
    {
        $profesorEliminar = \App\Models\User::findOrFail($id);
        $profesorEliminar->delete();
    }


    //cursos

    public function IndexBloques()
    {
        $bloques = \App\Models\Bloque::all();
        return view('User.admin.Action.Cursos.Bloques', compact('bloques'));
    }

    public function eliminarBloque($id)
    {
        $BloqueEliminar = \App\Models\Bloque::findOrFail($id);
        $BloqueEliminar->delete();

        return back()->with('mensaje', 'Bloque Eliminada');
    }

    public function CrearBloque(Request $request)
    {
        $request->validate([
            'id' => 'required',
            'Nombre' => 'required'
        ]);
        $bloqueId = Bloque::where('id', '=',  $request->id)->first();
        $bloqueNombre = Bloque::where('NombreBloque', '=',  $request->Nombre)->first();
        if ($bloqueId === null) {
            if ($bloqueNombre === null) {

                // user doesn't exist
                $bloque = new \App\Models\Bloque;
                $bloque->id = $request->id;
                $bloque->NombreBloque = $request->Nombre;
                $bloque->save();

                return back()->with('mensaje', 'Profesor agregado');
            } else {

                return back()->with('mensajeErr', 'Ya hay un bloque con ese  nombre');
            }
        } else {
            return back()->with('mensajeErr', 'Ya hay un bloque con ese id');
        }
    }

    public function VerCursos($idBloque)
    {



        $records = DB::table('cursos')
            ->join('bloque_curso', 'bloque_curso.curso_id', '=', 'cursos.id')

            ->where('bloque_curso.bloque_id', '=', $idBloque)
            ->get();

        return view('User.admin.Action.Cursos.Cursos', compact('records', 'idBloque'));
    }

    public function AgregarCurso(Request $request)
    {


        $request->validate([
            'id' => 'required',
            'nombreCurso' => 'required',
            'Capacidad' => 'required',
            'Estado' => 'required'
        ]);
        $idCurso = Curso::where('id', '=', $request->id)->first();

        if ($idCurso === null) {

            // user doesn't exist
            $Curso = new \APP\Models\Curso();
            $Curso->id = $request->id;
            $Curso->nombreCurso = $request->nombreCurso;
            $Curso->Capacidad = $request->Capacidad;

            if ($request->get('Estado') == 'Libre') {
                $Curso->Estado_Curso = 'Libre';
            }
            if ($request->get('Estado') == 'Clases') {
                $Curso->Estado_Curso = 'Clases';
            }
            if ($request->get('Estado') == 'Ocupado') {
                $Curso->Estado_Curso = 'Ocupado';
            }
            if ($request->get('Estado') == 'No_Disponible') {
                $Curso->Estado_Curso = 'No_Disponible';
            }
            $Curso->save();
            $id = $request->bloqueId;
            $Curso->bloque()->sync($id);


            return back()->with('mensaje', 'ya se agrego');
        } else {
            return back()->with('mensajeErr', 'Ya hay un Curso con ese id');
        }
    }

    public function EliminarCurso($id)
    {

        $idCurso=DB::table('cursos')
        ->join('bloque_curso', 'bloque_curso.curso_id', '=', 'cursos.id')
        ->where('bloque_curso.id', '=', $id)
        ->delete();

        return back()->with('mensaje', 'Se limino el curso');
    }

       //agregamos Estudiantes
       public function crearEstudiante(Request $request)
       {

           $userIDTarjeta = User::where('IdCarnet', '=',  $request->IdCarnet)->first();
           $userMail = User::where('email', '=',  $request->email)->first();
           $userCedula = User::where('cedula', '=',  $request->cedula)->first();
           if ($userMail === null) {
               if ($userCedula === null) {
                   if ($userIDTarjeta == null) {
                       // user doesn't exist
                       $user = new \App\Models\User;
                       $user->name = $request->name;
                       $user->cedula = $request->cedula;
                       $user->email = $request->email;
                       $user->IdCarnet = $request->IdCarnet;
                       $user->password = Hash::make($request->password);
                       $user->save();
                       $user->roles()->sync(2);
                       return $user;
                   } else {

                       return'Ya hay un usuario con esta tarjeta';
                   }
               } else {
                   return 'Ya hay un usuario con esta cedula';
               }
           } else {

               return back()->with('mensajeErr', 'Ya hay un usuario con este correo');
           }
       }

       public function IndexEstudiantes(Request $request)
       {
        if($request->ajax()){
            $user=\App\Models\User::all();
            $Estudiantes=DB::table('users')
            ->join('role_user', 'role_user.user_id', '=', 'users.id')
            ->where('role_user.role_id','=',2)
            ->get();

            return $Estudiantes;
        }else{
            return view('User.admin.indexRoot');
        }

       }
       public function obtenerEstudiante(Request $request,$carnet){
        if($request->ajax()){
            $Estudiantes=DB::table('users')
            ->join('role_user', 'role_user.user_id', '=', 'users.id')
            ->where('users.IdCarnet','=',$carnet)
            ->get();


            return $Estudiantes;
        }else{
            return view('User.admin.indexRoot');
        }
       }
       public function verListaCursos(Request $request){
        if($request->ajax()){
            $cursos=\App\Models\Curso::all();
            return $cursos;
        }else{
            return view('User.admin.indexRoot');
        }

       }

       public function InfoCurso(Request $request,$idCurso,$fecha){
        if($request->ajax()){
            $ingreso=DB::table('ingreso_cursos')
            ->where('curso_id', '=', $idCurso)
            ->where('Fecha','=',$fecha)
            ->get();
            return $ingreso ;
        }else{
            return view('User.admin.indexRoot');
        }

       }

}
