<?php

/*
|--------------------------------------------------------------------------
| Model Factories: RESERVA
|-------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(Essence\Reserva::class, function (Faker\Generator $faker) {
    
    return [
     	'cod_livro' => $faker->randomNumber($nbDigits = 9), 
     	'cod_cliente' => $faker->randomNumber($nbDigits = 9), 
     	'cod_reserva' => $faker->randomNumber($nbDigits = 9),
    ];
});
