<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Query\Builder;
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

        $user = \App\Models\User::findOrFail($id);
        $request->validate([
            'name' => 'required',
            'cedula' => 'required',
            'email' => 'required',
            'IdCarnet' => 'required',
            'password' => 'required'
        ]);
        $CorreoUsuario=$user->email;
        $CedulaUserActualizar = $user->cedula;
        $TarjetaUsuario=$user->IdCarnet;

        $userIDTarjeta = User::where('IdCarnet', '=',  $request->IdCarnet)->first();
        $userMail = User::where('email', '=',  $request->email)->first();
        $userCedula = User::where('cedula', '=',  $request->cedula)->first();

        $notaActualizada = \App\Models\User::find($id);
        $notaActualizada->name = $request->name;

        if($CorreoUsuario==$request->email){
            $notaActualizada->email = $request->email;

        }elseif($userMail === null){
            $notaActualizada->email = $request->email;
        }else{
            return back()->with('mensajeErr', 'Ya hay un usuario con este correo');
        }

        if($CedulaUserActualizar==$request->cedula){
            $notaActualizada->cedula = $request->cedula;
        }elseif($userCedula === null){
            $notaActualizada->cedula = $request->cedula;
        }else{
            return back()->with('mensajeErr', 'Ya hay un usuario con esta cedula');
        }

        if($TarjetaUsuario==$request->IdCarnet){
            $notaActualizada->IdCarnet = $request->IdCarnet;
        }elseif($userIDTarjeta === null){
            $notaActualizada->IdCarnet = $request->IdCarnet;
        }else{
            return back()->with('mensajeErr', 'Ya hay un usuario con esta tarjeta');
        }
        $notaActualizada->save();
        if($user->roles->first()->name=='Estudiante'){
            $user = \App\Models\User::all();
            return view('User.admin.Action.Estudiantes', compact('user'));
        }elseif($user->roles->first()->name=='Profesor'){
            $user = \App\Models\User::all();
            return view('User.admin.Action.Profesor', compact('user'));
        }



    }






    //agregamos profesores
    public function createTeacher(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'cedula' => 'required',
            'email' => 'required',
            'IdCarnet' => 'required',
            'password' => 'required'
        ]);
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
                    $user->roles()->sync(3);
                    return back()->with('mensaje', 'Profesor agregado');
                } else {

                    return back()->with('mensajeErr', 'Ya hay un usuario con esta tarjeta');
                }
            } else {
                return back()->with('mensajeErr', 'Ya hay un usuario con esta cedula');
            }
        } else {

            return back()->with('mensajeErr', 'Ya hay un usuario con este correo');
        }
    }

    //ver profesores
    public function IndexProfesores()
    {

        $user = \App\Models\User::all();

        return view('User.admin.Action.Profesor', compact('user'));
    }
    public function eliminarProfesor($id)
    {
        $profesorEliminar = \App\Models\User::findOrFail($id);
        $profesorEliminar->delete();

        return back()->with('mensaje', 'Nota Eliminada');
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
           $request->validate([
               'name' => 'required',
               'cedula' => 'required',
               'email' => 'required',
               'IdCarnet' => 'required',
               'password' => 'required'
           ]);
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
                       return back()->with('mensaje', 'Estudiante agregado');
                   } else {

                       return back()->with('mensajeErr', 'Ya hay un usuario con esta tarjeta');
                   }
               } else {
                   return back()->with('mensajeErr', 'Ya hay un usuario con esta cedula');
               }
           } else {

               return back()->with('mensajeErr', 'Ya hay un usuario con este correo');
           }
       }

       public function IndexEstudiantes()
       {

           $user = \App\Models\User::all();

           return view('User.admin.Action.Estudiantes', compact('user'));
       }
}
