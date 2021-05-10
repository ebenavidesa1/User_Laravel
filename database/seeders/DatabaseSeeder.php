<?php

namespace Database\Seeders;
use DB;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        DB::table('users')->insert([
            'name' => 'Evelyn Benavides',
            'cedula' => '1718748997',
            'celular' => '0984609674',
            'fechanacimiento' => '1989/08/20',
            'email' => 'evelyn@gmail.com',
            'password' => bcrypt('12345678'),
        ]);
    }
}
