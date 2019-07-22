<?php

use Illuminate\Database\Seeder;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')->insert([
            [
                'last_name' => 'Tuason',
                'first_name' => 'John Corbin',
                'middle_name' => 'Rivera',
                'job_title' => 'Super Admin',
                'email' => 'johncorbintuason@gmail.com',
                'password' => Hash::make('Googlechrome11!')
            ],
            [
                'last_name' => 'Talaver',
                'first_name' => 'Jeromy',
                'middle_name' => 'Santos',
                'job_title' => 'Doctor',
                'email' => 'jeromytalaver@gmail.com',
                'password' => Hash::make('jeromytalaver')
            ],
            
        ]);
    }
}
