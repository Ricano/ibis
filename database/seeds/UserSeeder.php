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
            'name' => 'Hélder Pinto',
            'email' => 'hp@p.com',
            'email_verified_at' => now(),
            'password' => Hash::make('123456789'),// password
            'taxpayer' => '456789123', // contribuinte
            'telephone' =>  915556666,
            'role_id' => 2,
            'area_id' => 3,
            'remember_token' => Str::random(10),
        ]);

        DB::table('users')->insert([
            'name' => 'Nuno Oliveira',
            'email' => 'no@p.com',
            'email_verified_at' => now(),
            'password' => Hash::make('123456789'),// password
            'taxpayer' => '789456123', // contribuinte
            'telephone' =>  915558888,
            'role_id' => 3,
            'area_id' => 2,
            'remember_token' => Str::random(10),

        ]);
        DB::table('users')->insert([
            'name' => 'Pedro Vasconcelos',
            'email' => 'pv@p.com',
            'email_verified_at' => now(),
            'password' => Hash::make('123456789'),// password
            'taxpayer' => '444456123', // contribuinte
            'telephone' =>  938051202,
            'role_id' => 1,
            'area_id' => 1,
            'remember_token' => Str::random(10),

        ]);
        DB::table('users')->insert([
            'name' => 'Nuno Fonseca',
            'email' => 'nf@p.com',
            'email_verified_at' => now(),
            'password' => Hash::make('123456789'),// password
            'taxpayer' => '344456123', // contribuinte
            'telephone' =>  935080212,
            'role_id' => 3,
            'area_id' => 2,
            'remember_token' => Str::random(10),

        ]);
        DB::table('users')->insert([
            'name' => 'Cláudio Sousa',
            'email' => 'cs@p.com',
            'email_verified_at' => now(),
            'password' => Hash::make('123456789'),// password
            'taxpayer' => '244456123', // contribuinte
            'telephone' =>  931280502,
            'role_id' => 3,
            'area_id' => 7,
            'remember_token' => Str::random(10),

        ]);
        DB::table('users')->insert([
            'name' => 'Pedro Rocha',
            'email' => 'pr@p.com',
            'email_verified_at' => now(),
            'password' => Hash::make('123456789'),// password
            'taxpayer' => '244456123', // contribuinte
            'telephone' =>  931280502,
            'role_id' => 3,
            'area_id' => 2,
            'remember_token' => Str::random(10),

        ]);
        DB::table('users')->insert([
            'name' => 'Ricardo Baptista',
            'email' => 'rb@p.com',
            'email_verified_at' => now(),
            'password' => Hash::make('123456789'),// password
            'taxpayer' => '244456123', // contribuinte
            'telephone' =>  931280502,
            'role_id' => 3,
            'area_id' => 1,
            'remember_token' => Str::random(10),

        ]);
        DB::table('users')->insert([
            'name' => 'Miguel Silva',
            'email' => 'ms@p.com',
            'email_verified_at' => now(),
            'password' => Hash::make('123456789'),// password
            'taxpayer' => '244456123', // contribuinte
            'telephone' =>  931280502,
            'role_id' => 3,
            'area_id' => 3,
            'remember_token' => Str::random(10),

        ]);
        DB::table('users')->insert([
            'name' => 'Sérgio Nogueira',
            'email' => 'sn@p.com',
            'email_verified_at' => now(),
            'password' => Hash::make('123456789'),// password
            'taxpayer' => '244456123', // contribuinte
            'telephone' =>  931280502,
            'role_id' => 3,
            'area_id' => 3,
            'remember_token' => Str::random(10),

        ]);
        DB::table('users')->insert([
            'name' => 'Ana Ferraz',
            'email' => 'af@p.com',
            'email_verified_at' => now(),
            'password' => Hash::make('123456789'),// password
            'taxpayer' => '244456123', // contribuinte
            'telephone' =>  931280502,
            'role_id' => 3,
            'area_id' => 6,
            'remember_token' => Str::random(10),

        ]);
        DB::table('users')->insert([
            'name' => 'Iva Santos',
            'email' => 'is@p.com',
            'email_verified_at' => now(),
            'password' => Hash::make('123456789'),// password
            'taxpayer' => '244456123', // contribuinte
            'telephone' =>  931280502,
            'role_id' => 3,
            'area_id' => 4,
            'remember_token' => Str::random(10),

        ]);
        DB::table('users')->insert([
            'name' => 'Ana Pimentel',
            'email' => 'ap@p.com',
            'email_verified_at' => now(),
            'password' => Hash::make('123456789'),// password
            'taxpayer' => '244456123', // contribuinte
            'telephone' =>  931280502,
            'role_id' => 3,
            'area_id' => 5,
            'remember_token' => Str::random(10),

        ]);
        DB::table('users')->insert([
            'name' => 'Afonso Domingues',
            'email' => 'ad@p.com',
            'email_verified_at' => now(),
            'password' => Hash::make('123456789'),// password
            'taxpayer' => '244456123', // contribuinte
            'telephone' =>  931280502,
            'role_id' => 3,
            'area_id' => 8,
            'remember_token' => Str::random(10),

        ]);
        DB::table('users')->insert([
            'name' => 'António Mota',
            'email' => 'am@p.com',
            'email_verified_at' => now(),
            'password' => Hash::make('123456789'),// password
            'taxpayer' => '244456123', // contribuinte
            'telephone' =>  931280502,
            'role_id' => 3,
            'area_id' => 3,
            'remember_token' => Str::random(10),

        ]);
        DB::table('users')->insert([
            'name' => 'Daniel Guimarães',
            'email' => 'd@d.com',
            'email_verified_at' => now(),
            'password' => Hash::make('123456789'),// password
            'taxpayer' => '244456123', // contribuinte
            'telephone' =>  931280502,
            'role_id' => 1,
            'area_id' => 3,
            'remember_token' => Str::random(10),

        ]);
        DB::table('users')->insert([
            'name' => 'Ricardo Caetano',
            'email' => 'r@r.com',
            'email_verified_at' => now(),
            'password' => Hash::make('123456789'),// password
            'taxpayer' => '244456123', // contribuinte
            'telephone' =>  931280502,
            'role_id' => 1,
            'area_id' => 3,
            'remember_token' => Str::random(10),

        ]);
        DB::table('users')->insert([
            'name' => 'luís Ferreira',
            'email' => 'l@l.com',
            'email_verified_at' => now(),
            'password' => Hash::make('123456789'),// password
            'taxpayer' => '244456123', // contribuinte
            'telephone' =>  931280502,
            'role_id' => 1,
            'area_id' => 3,
            'remember_token' => Str::random(10),

        ]);


      //  factory(App\User::class, 20)->create();
    }
}
