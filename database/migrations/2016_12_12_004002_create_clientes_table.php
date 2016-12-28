<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientesTable extends Migration
{
    public function up()
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('codigo')->unsigned();
            $table->string('nome');
            $table->string('endereco', 400);
            $table->string('telefone', 20);
            $table->string('email', 100);
            $table->string('status', 100);
            $table->timestamps();
        });
    }

    
    public function down()
    {
        Schema::dropIfExists('clientes');
    }
}
