<?php

use App\Models\Bloque;
use App\Models\Curso;
use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Auth;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

//rutas usuarios
Auth::routes();

Route::get('/Admin', function () {
    return view('User.admin.indexRoot');
})->name("admin")->middleware('auth');

    //routes admin

    /*--------------------acciones de admin--------------------------*/
    //profesor

    Route::get('/Admin/Teacher', [App\Models\Admin::class, 'IndexProfesores'])->name('ProfesorAdmin')->middleware('Admin');
    Route::Post('/Admin/Teacher', [App\Models\Admin::class, 'createTeacher'])->name('createTeacher')->middleware('Admin');
    Route::delete('/Admin/Teacher/eliminar/{id}', [App\Models\Admin::class, 'eliminarProfesor'])->name('Profesor.eliminar')->middleware('Admin');

    Route::get('/Editar/Q23qwer24{id}oprw1243', [App\Models\Admin::class, 'editar'])->name('Editar')->middleware('Admin');
    Route::put('/Editar/Q23qwer24{id}oprw1243eq', [App\Models\Admin::class, 'UpdateUser'])->name('UpdateUser')->middleware('Admin');
    //Estudiantes
    Route::get('/Admin/Estudiante', [App\Models\Admin::class, 'IndexEstudiantes'])->name('EstudianteAdmin')->middleware('Admin');
    Route::Post('/Admin/Estudiante', [App\Models\Admin::class, 'crearEstudiante'])->name('crearEstudiante')->middleware('Admin');
    Route::delete('/Admin/Estudiante/eliminar/{id}', [App\Models\Admin::class, 'eliminarProfesor'])->name('Profesor.eliminar')->middleware('Admin');

    Route::get('/Editar/Q23qwer24{id}oprw1243', [App\Models\Admin::class, 'editar'])->name('Editar')->middleware('Admin');
    Route::put('/Editar/Q23qwer24{id}oprw1243eq', [App\Models\Admin::class, 'UpdateUser'])->name('UpdateUser')->middleware('Admin');
    //Cursos
    Route::get('/Admin/Bloque', [App\Models\Admin::class, 'IndexBloques'])->name('BloquesAdmin')->middleware('Admin');
    Route::get('/Admin/Bloque/Añadir', function(){return view('User.admin.Action.Cursos.AñadirBloque');})->name('AñadirBloquesAdmin1')->middleware('Admin');
    Route::Post('/Admin/Bloque/Crear',  [App\Models\Admin::class, 'CrearBloque'])->name('AñadirBloquesAdmin')->middleware('Admin');
    Route::delete('/Admin/Bloque/{id}', [App\Models\Admin::class, 'eliminarBloque'])->name('EliminarBloquesAdmin')->middleware('Admin');
    Route::get('/Admin/Bloque/curso/ver/{id}', [App\Models\Admin::class, 'VerCursos'])->name('Cursos')->middleware('Admin');
    Route::Post('/Admin/Bloque/curso/{bloque}',  [App\Models\Admin::class, 'AgregarCurso'])->name('AñadirCurso')->middleware('Admin');
    Route::delete('/Admin/Bloque/curso/ver/eliminar/{id}', [App\Models\Admin::class, 'EliminarCurso'])->name('EliminarCursoAdmin')->middleware('Admin');




//creacion de roles
Route::get('/Prueba', function () {

    $user = User::find(1);
    //aqui le decimos que  agregue al usuario 1 como admin
    $user->roles()->sync(1);
    return $user->roles;
    //creamos bloque
    /*
    return Bloque::create([
        'NombreBloque'=>'Bloque 9',
    ]);
     return Curso::create([
        'nombreCurso'=>'Sala',
        'Capacidad'=> '',
        'Estado_Curso'=>'',
    ]);
    */
/*

    $curso=Curso::find(1);

    $curso->bloque()->sync(5);
    return $curso->bloque;
*/
    /*  creamos rol admin
        return Role::create([
            'name' =>'Admin',
            'slug' =>'admin',
            'descripcion' =>'Administrador cv',
            'fullAcces' =>'yes'
        ]);
          return Role::create([
        'name' => 'Cuidador',
        'slug' => 'Cuidador',
        'descripcion' => 'Cuidador ',
        'fullAcces' => 'no'
    ]);
  return Role::create([
        'name' =>'Estudiante',
        'slug' =>'Estudiante',
        'descripcion' =>'Estudiante',
        'fullAcces' =>'no'
        ]);
        crear rol doctor
        return Role::create([
            'name' =>'Profesor',
            'slug' =>'Profesor',
            'descripcion' =>'Doctor',
            'fullAcces' =>'no'
            ]);
              //se obtiene el primer usuario
    $user = User::find(1);
    //aqui le decimos que  agregue al usuario 1 como admin
    $user->roles()->sync(1);
    return $user->roles;

  //se obtiene el primer usuario
    $user = User::find(1);
    //aqui le decimos que  agregue al usuario 1 como admin
    $user->roles()->sync(1);
    return $user->roles;
            */

});

Auth::routes();

//aarduino

Route::get('Arduino/curso={idCurso}&Temperatura={Temperatura}&Tarjeta={Tarjeta}', [App\Models\Arduino::class, 'recibir'])->name('recibir');
Route::get('Arduino1/curso={idCurso}&Tarjeta={Tarjeta}', [App\Models\Arduino::class, 'prueba'])->name('Prueba');

