<?php

namespace Essence;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
  	protected $fillable = [
        'codigo', 'nome', 'endereco', 'telefone', 'email', 'status'
    ];
}
