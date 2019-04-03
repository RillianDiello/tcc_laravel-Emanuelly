<?php
use Illuminate\Database\Seeder;
class TiposTrabalhosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('typesWorks')->delete();

        DB::table('typesWorks')->insert([
            'nome_tipo' => 'Trabalho de Conclusão de Curso',
            'identificador' => 'tcc',
            'created_at' => now()
        ]);
        DB::table('typesWorks')->insert([
            'nome_tipo' => 'Monografia',
            'identificador' => 'mono',
            'created_at' => now()
        ]);
        DB::table('typesWorks')->insert([
            'nome_tipo' => 'Dissertação',
            'identificador' => 'dissert',
            'created_at' => now()
        ]);
        DB::table('typesWorks')->insert([
            'nome_tipo' => 'Artigo',
            'identificador' => 'art',
            'created_at' => now()
        ]);
        DB::table('typesWorks')->insert([
            'nome_tipo' => 'Livro',
            'identificador' => 'livr',
            'created_at' => now()
        ]);
        DB::table('typesWorks')->insert([
            'nome_tipo' => 'Página',
            'identificador' => 'pag',
            'created_at' => now()
        ]);
    }
}
