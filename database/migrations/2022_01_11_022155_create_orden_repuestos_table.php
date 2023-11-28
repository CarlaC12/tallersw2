<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdenRepuestosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orden_repuestos', function (Blueprint $table) {
            
            $table->id();
            $table->unsignedBigInteger('id_orden');
            $table->unsignedBigInteger('id_repuestos');
            $table->foreign('id_orden')->references('id')->on('ordens');
            $table->foreign('id_repuestos')->references('id')->on('repuestos');
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
        Schema::dropIfExists('orden_repuestos');
    }
}
