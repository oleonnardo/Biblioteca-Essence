<?php

use Illuminate\Database\Seeder;
use Essence\Livro;

class LivrosTableSeeder extends Seeder
{
    
    public function run()
    {
        Livro::truncate();
        factory(Livro::class, 400)->create();
    }
}
