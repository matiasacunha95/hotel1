<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddBoletaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('boleta', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_reserva')->unsigned();
            $table->date('fecha_ingreso');
            $table->date('fecha_salida');
            $table->integer('n_habitaciones')->default('0');
            $table->integer('p_habitacion')->default('0');
            $table->integer('total')->default('0');

            $table->foreign('id_reserva')->references('id')->on('reserva')->onDelete('cascade');

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
        //
    }
}
