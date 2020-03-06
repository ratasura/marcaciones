<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNovedadesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('novedades', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_funcionario');
            $table->foreign('id_funcionario','fk_novedad')->references('id')->on('funcionarios')->onDelete('restrict')->onUpdate('restrict');
            $table->string('ci',10);
            $table->string('nombre');
            $table->string('fechaincidente');
            $table->integer('tipo');
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_spanish_ci';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('novedades');
    }
}
