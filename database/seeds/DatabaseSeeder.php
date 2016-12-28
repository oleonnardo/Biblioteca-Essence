<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(ClientesTableSeeder::class);
        $this->call(LivrosTableSeeder::class);
        $this->call(ReservasTableSeeder::class);
        $this->call(EmprestimosTableSeeder::class);

    }
}
