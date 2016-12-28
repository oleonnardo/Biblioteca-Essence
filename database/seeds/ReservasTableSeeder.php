<?php

use Illuminate\Database\Seeder;
use Essence\Reserva;


class ReservasTableSeeder extends Seeder
{
    
    public function run()
    {
        Reserva::truncate();
        factory(Reserva::class, 50)->create();
    }
}
