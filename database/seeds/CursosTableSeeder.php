<?php
use Illuminate\Database\Seeder;
class CursosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('courses')->delete();

        DB::table('courses')->insert([
            'nome' => 'Ciência da Computação',
            'identificador' => 'CC',
            'created_at' => now()
        ]);
        DB::table('courses')->insert([
            'nome' => 'Analise de Sistemas',
            'identificador' => 'AS',
            'created_at' => now()
        ]);
        DB::table('courses')->insert([
            'nome' => 'Engenharia de Software',
            'identificador' => 'EngSof',
            'created_at' => now()
        ]);
        DB::table('courses')->insert([
            'nome' => 'Tecnologia da Informação',
            'identificador' => 'TecInfo',
            'created_at' => now()
        ]);
        DB::table('courses')->insert([
            'nome' => 'Administração de Empresas',
            'identificador' => 'ADME',
            'created_at' => now()
        ]);
        DB::table('courses')->insert([
            'nome' => 'Engenharia da Computação',
            'identificador' => 'EngCom',
            'created_at' => now()
        ]);
        DB::table('courses')->insert([
            'nome' => 'Engenharia da Civil',
            'identificador' => 'EngCiv',
            'created_at' => now()
        ]);
        DB::table('courses')->insert([
            'nome' => 'Engenharia da Eletrica',
            'identificador' => 'EngCiv',
            'created_at' => now()
        ]);
        DB::table('courses')->insert([
            'nome' => 'Engenharia da Eletrica',
            'identificador' => 'EngCiv',
            'created_at' => now()
        ]);
    }
}
