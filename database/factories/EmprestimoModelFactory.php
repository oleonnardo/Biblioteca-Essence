<?php

/*
|--------------------------------------------------------------------------
| Model Factories: EMPRESTIMOS
|-------------------------------------------------------
|Essence - WordPress Blog Theme
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(Essence\Emprestimo::class, function (Faker\Generator $faker) {
    
    return [
    	'cod_livro' => $faker->randomNumber($nbDigits = 9), 
    	'cod_cliente' => $faker->randomNumber($nbDigits = 9), 
    	'dt_emprestimo' => $faker->date($format = 'd-m-Y', $max = 'now'), 
    	'dt_entrega' => $faker->date($format = 'd-m-Y', $max = 'now'), 
    	'multa' => $faker->boolean,
    ];
});
