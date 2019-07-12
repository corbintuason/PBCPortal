<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'last_name' => 'Gonzales',
                'first_name' => 'Jonathan Amiel',
                'middle_name' => 'Talaver',
                'email' => 'jonjon@gmail.com',
                'password' => Hash::make('jonjon'),
            ]
        ]);
    }
}
