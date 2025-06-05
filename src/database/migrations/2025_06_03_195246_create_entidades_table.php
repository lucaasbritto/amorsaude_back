<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEntidadesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('entidades', function (Blueprint $table) {
        $table->engine = 'InnoDB';
        $table->increments('id');
        $table->foreign('regional_id')->references('id')->on('regionais')->onDelete('restrict');
        $table->string('razao_social');
        $table->string('nome_fantasia');
        $table->string('cnpj', 18)->unique();
        $table->string('regional_id', 36);
        $table->date('data_inauguracao');
        $table->boolean('ativa')->default(false);
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
        Schema::dropIfExists('entidades');
    }
}
