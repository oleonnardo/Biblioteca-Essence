<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLivrosTable extends Migration
{
    
    public function up()
    {
        Schema::create('livros', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('codigo')->unsigned();
            $table->string('titulo', 400);
            $table->string('capa');
            $table->string('autores', 600);
            $table->string('localizacao', 100);
            $table->integer('quantidade')->unsigned();
            $table->string('descricao', 5000);
            $table->string('tags', 500);
            $table->timestamps();
        });
    }

    
    public function down()
    {
        Schema::dropIfExists('livros');
    }
}
