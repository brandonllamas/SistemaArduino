<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIngresoCursosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ingreso_cursos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->String('curso_id');
            $table->string('Usuario_id');
            $table->String('Temperatura');
            $table->boolean('Ingreso');
            $table->boolean('Salio');
            $table->date('Fecha');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ingreso_cursos');
    }
}
