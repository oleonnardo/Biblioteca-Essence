<?php

use Illuminate\Database\Seeder;
use Essence\Cliente;

class ClientesTableSeeder extends Seeder
{
    
    public function run()
    {
        Cliente::truncate();
        factory(Cliente::class, 200)->create();
    }
}
