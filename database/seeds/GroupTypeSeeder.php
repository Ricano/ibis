<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GroupTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // APRENDIZAGEM
        DB::table('group_types')->insert([
            'name' => 'TMEC',
            'description' => 'Curso de Técnico/a de Mecatrónica',
            'course_type_id' => 1
        ]);

        DB::table('group_types')->insert([
            'name' => 'TSLD',
            'description' => 'Curso de Técnico/a de Soldadura',
            'course_type_id' => 1
        ]);

        DB::table('group_types')->insert([
            'name' => 'TIIGR',
            'description' => 'Curso de Técnico/a de Informática - Instalação e Gestão de Redes',
            'course_type_id' => 1
        ]);




        // ESPECIALIZAÇÃO TECNOLÓGICA
        DB::table('group_types')->insert([
            'name' => 'TPSI',
            'description' => 'Curso de Técnico/a Especialista em Tecnologias e Programação de Sistemas de Informação',
            'course_type_id' => 2
        ]);

        DB::table('group_types')->insert([
            'name' => 'GRSI',
            'description' => 'Curso de Técnico/a Especialista em Gestão de Redes e Sistemas Informáticos',
            'course_type_id' => 2
        ]);




        // FORMAÇÃO DE ADULTOS
        DB::table('group_types')->insert([
            'name' => 'TRC',
            'description' => 'Técnico/a de Refrigeração e Climatização (EFA +23 anos)',
            'course_type_id' => 3
        ]);

        DB::table('group_types')->insert([
            'name' => 'TEAC',
            'description' => 'Curso de Técnico/a de Eletrónica - Automação e Comando (EFA +23 Anos)',
            'course_type_id' => 3
        ]);




        // QUALIFICAÇÃO DE LICENCIADOS E MESTRES
        DB::table('group_types')->insert([
            'name' => 'CIEQ',
            'description' => 'Curso de Integração Empresarial de Quadros',
            'course_type_id' => 4
        ]);
    }
}
