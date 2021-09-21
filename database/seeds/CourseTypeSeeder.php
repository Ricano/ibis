<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CourseTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('course_types')->insert([
            'name' => 'Aprendizagem',
            'acronym' => 'Aprendizagem',
            'color' => '#00A0B0'
        ]);

        DB::table('course_types')->insert([
            'name' => 'Especialização Tecnológica',
            'acronym' => 'CET',
            'color' => '#00589B'
        ]);

        DB::table('course_types')->insert([
            'name' => 'Formação de Adultos',
            'acronym' => 'EFA',
            'color' => '#ff68a7'
        ]);

        DB::table('course_types')->insert([
            'name' => 'Qualificação de Licenciados e Mestres',
            'acronym' => 'CIEQ',
            'color' => '#D600FF'
        ]);
    }
}
