<?php

namespace Essence;

use Illuminate\Database\Eloquent\Model;

class Emprestimo extends Model
{
  	protected $fillable = [
        'cod_livro', 'cod_cliente', 'dt_emprestimo', 'dt_entrega', 'multa'
    ];

       
}
