<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ordens', function (Blueprint $table) {
            $table->id();
            $table->string('descripcion');
            $table->string('estado');
            $table->unsignedBigInteger('horas')->nullable();
            $table->unsignedBigInteger('rework')->nullable();
            $table->date('fechai');
            $table->date('fechaf')->nullable();
            $table->unsignedBigInteger('mecanico_id')->nullable();
            $table->foreign('mecanico_id')->references('id')->on('mecanicos')->onDelete('set null');
            $table->unsignedBigInteger('vehiculo_id')->nullable();
            $table->foreign('vehiculo_id')->references('id')->on('vehiculos')->onDelete('set null');
            //$table->unsignedBigInteger('reserva_id')->nullable();
            //$table->foreign('reserva_id')->references('id')->on('reservas')->onDelete('set null');
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
        Schema::dropIfExists('ordens');
    }
}
