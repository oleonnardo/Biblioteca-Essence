<?php

/*
|--------------------------------------------------------------------------
| Model Factories: CLIENTES
|-------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(Essence\Cliente::class, function (Faker\Generator $faker) {
    
    return [
     	'codigo' => $faker->numberBetween($min = 100000, $max = 900000), 
     	'nome' => $faker->name, 
     	'endereco' => $faker->address, 
     	'telefone' => $faker->e164PhoneNumber, 
     	'email' => $faker->email, 
     	'status' => $faker->randomElement($array = array ('desativado','ativo')),
    ];
});
