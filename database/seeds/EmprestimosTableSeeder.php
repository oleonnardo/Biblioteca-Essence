<?php

use Illuminate\Database\Seeder;
use Essence\Emprestimo;

class EmprestimosTableSeeder extends Seeder
{
    
    public function run()
    {
        Emprestimo::truncate();
        factory(Emprestimo::class, 100)->create();
    }
}
