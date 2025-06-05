<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEntidadeEspecialidadeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('entidade_especialidade', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->foreign('entidade_id')->references('id')->on('entidades')->onDelete('cascade');
            $table->foreign('especialidade_id')->references('id')->on('especialidades')->onDelete('restrict');
            $table->unsignedInteger('entidade_id');
            $table->string('especialidade_id', 36);    
            $table->timestamps();
            $table->unique(['entidade_id', 'especialidade_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('entidade_especialidade');
    }
}
