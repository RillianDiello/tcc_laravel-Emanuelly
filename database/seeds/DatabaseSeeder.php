<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(InstituicoesTableSeeder::class);
        $this->call(CursosTableSeeder::class);
        $this->call(TiposTrabalhosTableSeeder::class);
        $this->call(ProfessoresTableSeeder::class);
        $this->call(AlunosTableSeeder::class);
    }
}
