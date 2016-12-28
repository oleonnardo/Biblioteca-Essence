<?php

/*
|--------------------------------------------------------------------------
| Model Factories: LIVRO
|-------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(Essence\Livro::class, function (Faker\Generator $faker) {
    
    return [
    	'codigo' => $faker->randomNumber($nbDigits = 8), 
    	'titulo' => $faker->catchPhrase,
    	'capa' => $faker->randomNumber($nbDigits = 5), 
    	'autores' => $faker->company, 
    	'localizacao' => $faker->randomNumber($nbDigits = 3), 
    	'quantidade' => $faker->numberBetween($min = 1, $max = 10), 
    	'descricao' => $faker->catchPhrase, 
    	'tags' => $faker->catchPhrase,
    ];
});
