<?php
use Illuminate\Database\Seeder;
class AlunosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('students')->delete();

        DB::table('students')->insert([
            'nome' => 'Emanuelly',
            'sobrenome' => 'Lopes',
            'email' => 'emanuelly.silva.arantes@gmail.com',
            'fone' => '6791193731',
            'created_at' => now()
        ]);
    }
}
