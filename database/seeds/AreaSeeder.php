<?php

use Illuminate\Database\Seeder;

class AreaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('areas')->insert([
            'name' => 'Base de Dados'
        ]);
        DB::table('areas')->insert([
            'name' => 'Redes e Servidores'
        ]);
        DB::table('areas')->insert([
            'name' => 'Programação e Desenvolvimento'
        ]);
        DB::table('areas')->insert([
            'name' => 'Português'
        ]);
        DB::table('areas')->insert([
            'name' => 'Matemática'
        ]);
        DB::table('areas')->insert([
            'name' => 'Inglês'
        ]);
        DB::table('areas')->insert([
            'name' => 'Direito, Economia, Cidadania'
        ]);
        DB::table('areas')->insert([
            'name' => 'Hardware'
        ]);
    }
}
