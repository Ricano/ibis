<?php

use Illuminate\Database\Seeder;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Senhor Coordenador',
            'email' => 'coord@exampe.com',
            'email_verified_at' => now(),
            'password' => Hash::make('123456789'),// password
            'taxpayer' => '456789123', // contribuinte
            'telephone' =>  930000000,
            'role_id' => 2,
            'area_id' => 3,
            'remember_token' => Str::random(10),
        ]);

        DB::table('users')->insert([
            'name' => 'Senhor Professor',
            'email' => 'prof@example.com',
            'email_verified_at' => now(),
            'password' => Hash::make('123456789'),// password
            'taxpayer' => '789456123', // contribuinte
            'telephone' =>  960000000,
            'role_id' => 3,
            'area_id' => 2,
            'remember_token' => Str::random(10),

        ]);
        DB::table('users')->insert([
            'name' => 'Senhor Administrador',
            'email' => 'admin@example.com',
            'email_verified_at' => now(),
            'password' => Hash::make('123456789'),// password
            'taxpayer' => '444456123', // contribuinte
            'telephone' =>  910000000,
            'role_id' => 1,
            'area_id' => 1,
            'remember_token' => Str::random(10),

        ]);
      //  factory(App\User::class, 20)->create();
    }
}
