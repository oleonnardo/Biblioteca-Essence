<?php

namespace Essence;

use Illuminate\Database\Eloquent\Model;

class Reserva extends Model
{
    protected $fillable = [
     	'cod_livro', 'cod_cliente', 'cod_reserva'
    ];
}
