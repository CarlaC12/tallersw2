<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEntradaSalidasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('entrada_salidas', function (Blueprint $table) {
            $table->id();
            $table->time('hora');
            $table->date('fecha');
            $table->integer('tipo'); //1 = entrada, 2 = salida
            $table->unsignedBigInteger('idOrden')->nullable();
            $table->string('descripcion')->nullable();
            // $table->foreign('idOrden')->references('id')->on('orden_trabajo')->onDelete('set null');
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
        Schema::dropIfExists('entrada_salidas');
    }
}
