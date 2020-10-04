<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBloqueCursoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bloque_curso', function (Blueprint $table) {
            $table->id();
            $table->foreignId('bloque_id')->references('id')->on('bloques')->onDelete('cascade');
            $table->foreignId('curso_id')->references('id')->on('cursos')->onDelete('cascade');
            $table->timestamps();;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bloque_curso');
    }
}
