<?php

namespace Essence;

use Illuminate\Database\Eloquent\Model;

class Livro extends Model
{
  	protected $fillable = [
        'codigo', 'titulo', 'capa', 'autores', 'localizacao', 'quantidade', 'descricao', 'tags'
    ];
}
