<?php

use Illuminate\Database\Seeder;

class UfcdSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('ufcds')->insert([
            'number'=>'0132',
            'name' => 'Noções de hardware e sistemas operativos para multimédia'
        ]);
        DB::table('ufcds')->insert([
            'number'=>'0592',
            'name' => 'Legislação laboral'
        ]);
        DB::table('ufcds')->insert([
            'number'=>'0781',
            'name' => 'Análise de sistemas de informação'
        ]);
        DB::table('ufcds')->insert([
            'number'=>'0782',
            'name' => 'Programação em C/C++ - estrutura básica e conceitos fundamentais'
        ]);
        DB::table('ufcds')->insert([
            'number'=>'0789',
            'name' => 'Fundamentos de linguagem JAVA'
        ]);
        DB::table('ufcds')->insert([
            'number'=>'0804',
            'name' => 'Algoritmos'
        ]);
        DB::table('ufcds')->insert([
            'number'=>'0825',
            'name' => 'Tipologias de redes'
        ]);
        DB::table('ufcds')->insert([
            'number'=>'0827',
            'name' => 'Protocolos de redes - instalação e configuração'
        ]);
        DB::table('ufcds')->insert([
            'number'=>'1417',
            'name' => 'Sistemas operativos e administração de redes'
        ]);
        DB::table('ufcds')->insert([
            'number'=>'5065',
            'name' => 'Empresa - estrutura e funções'
        ]);
        DB::table('ufcds')->insert([
            'number'=>'5085',
            'name' => 'Criação de estrutura de base de dados em SQL'
        ]);
        DB::table('ufcds')->insert([
            'number'=>'5086',
            'name' => 'Programação em SQL'
        ]);
        DB::table('ufcds')->insert([
            'number'=>'5089',
            'name' => 'Programação - Algoritmos'
        ]);
        DB::table('ufcds')->insert([
            'number'=>'5116',
            'name' => 'Sistemas operativos open source'
        ]);
        DB::table('ufcds')->insert([
            'number'=>'5407',
            'name' => 'Sistemas de informação - fundamentos'
        ]);
        DB::table('ufcds')->insert([
            'number'=>'5408',
            'name' => 'Sistemas de informação - conceção'
        ]);
        DB::table('ufcds')->insert([
            'number'=>'5409',
            'name' => 'Engenharia de software'
        ]);
        DB::table('ufcds')->insert([
            'number'=>'5414',
            'name' => 'Programação para a WEB - cliente (client-side)'
        ]);
        DB::table('ufcds')->insert([
            'number'=>'5415',
            'name' => 'WEB - hipermédia e acessibilidades'
        ]);
        DB::table('ufcds')->insert([
            'number'=>'5416',
            'name' => 'WEB - ferramentas multimédia'
        ]);
        DB::table('ufcds')->insert([
            'number'=>'5417',
            'name' => 'Programação para a WEB - servidor (server-side)'
        ]);
        DB::table('ufcds')->insert([
            'number'=>'5418',
            'name' => 'Redes de comunicação de dados'
        ]);
        DB::table('ufcds')->insert([
            'number'=>'5420',
            'name' => 'Integração de sistemas de informação - conceitos'
        ]);
        DB::table('ufcds')->insert([
            'number'=>'5422',
            'name' => 'Integração de sistemas de informação - ferramentas'
        ]);
        DB::table('ufcds')->insert([
            'number'=>'5437',
            'name' => 'Noções de economia de empresa'
        ]);
        DB::table('ufcds')->insert([
            'number'=>'6192',
            'name' => 'Sistema operativo Linux'
        ]);
        DB::table('ufcds')->insert([
            'number'=>'9963',
            'name' => 'Edição web'
        ]);
    }
}
