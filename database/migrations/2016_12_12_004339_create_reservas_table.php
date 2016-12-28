<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReservasTable extends Migration
{
    
    public function up()
    {
        Schema::create('reservas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('cod_livro')->unsigned();
            $table->integer('cod_cliente')->unsigned();
            $table->integer('cod_reserva')->unsigned();
            $table->timestamps();
        });
    }

   
    public function down()
    {
        Schema::dropIfExists('reservas');
    }
}
