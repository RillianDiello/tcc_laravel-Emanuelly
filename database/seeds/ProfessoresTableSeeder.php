<?php
use Illuminate\Database\Seeder;
class ProfessoresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('teachers')->delete();

        DB::table('teachers')->insert([
            'nome' => 'Rillian Diello Lucas Pires',
            'identificador' => 'batman',
            'created_at' => now()
        ]);
        DB::table('teachers')->insert([
            'nome' => 'Felipe Gonçalves',
            'identificador' => 'lost',
            'created_at' => now()
        ]);
        DB::table('teachers')->insert([
            'nome' => 'Lucas Akayama',
            'identificador' => 'lucas',
            'created_at' => now()
        ]);
        DB::table('teachers')->insert([
            'nome' => 'Renato Rondon',
            'identificador' => 'renato',
            'created_at' => now()
        ]);
    }
}
