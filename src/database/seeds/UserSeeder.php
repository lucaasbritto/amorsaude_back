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
        \App\User::create([
            'name' => 'AmorSaude',
            'email' => 'amorsaude@teste.com',
            'password' => Hash::make('123456'),
        ]);
    }
}
