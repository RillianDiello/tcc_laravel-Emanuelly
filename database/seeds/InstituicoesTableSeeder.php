<?php
use Illuminate\Database\Seeder;
class InstituicoesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('institutions')->delete();
        DB::table('institutions')->insert([
            'nome' => 'Universidade Federal de Mato Grosso do Sul',
            'identificador' => 'UFMS',
            'created_at' => now()
        ]);
        DB::table('institutions')->insert([
            'nome' => 'Insituto Federal de Mato Grosso do Sul',
            'identificador' => 'IFMS',
            'created_at' => now()
        ]);
        DB::table('institutions')->insert([
            'nome' => 'Universidade Estadual de Mato Grosso do Sul',
            'identificador' => 'UEMS',
            'created_at' => now()
        ]);
        DB::table('institutions')->insert([
            'nome' => 'Universidade para o Desenvolvimento do Estado e da Região do Pantana',
            'identificador' => 'UNIDERP',
            'created_at' => now()
        ]);
        DB::table('institutions')->insert([
            'nome' => 'Universidade Católica Dom Bosc',
            'identificador' => 'UCDB',
            'created_at' => now()
        ]);
        DB::table('institutions')->insert([
            'nome' => 'Escola Estadual de Primeiro Grau Hilda de Souza Ferreira',
            'identificador' => 'EEPGHSF',
            'created_at' => now()
        ]);
        DB::table('institutions')->insert([
            'nome' => 'Centro De Educacao Profissional Ezequiel Ferreira Lima',
            'identificador' => 'CEPEF',
            'created_at' => now()
        ]);
        //
    }
}
