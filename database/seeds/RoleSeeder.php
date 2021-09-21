<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            'name' => 'Coordenador de Área'
        ]);

        DB::table('roles')->insert([
            'name' => 'Coordenador de Turma'
        ]);

        DB::table('roles')->insert([
            'name' => 'Formador'
        ]);
    }
}
