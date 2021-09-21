<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MeetingTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('meeting_types')->insert([
            'name' => 'Pedagógica',
            'standard_text'=> ''
        ]);

        DB::table('meeting_types')->insert([
            'name' => 'Recuperação',
            'standard_text'=> ''
        ]);

    }
}
