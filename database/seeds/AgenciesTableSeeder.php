<?php

use Illuminate\Database\Seeder;

class AgenciesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('agencies')->insert([
            [
                'name' => 'De La Salle University',
                'email' => 'dlsu@gmail.com',
                'address' => '2401 Taft Ave, Malate, Manila, 1004 Metro Manila'
            ],
            [
                'name' => 'University of Sto. Tomas',
                'email' => 'ust@gmail.com',
                'address' => 'España Blvd, Sampaloc, Manila, 1008 Metro Manila'
            ],
            [
                'name' => 'Ateneo De Manila University',
                'email' => 'admu@gmail.com',
                'address' => 'Katipunan Ave, Quezon City, 1108 Metro Manila'
            ],
            [
                'name' => 'Makati Medical Center',
                'email' => 'mmc@gmail.com',
                'address' => '2 Amorsolo Street, Legazpi Village, Makati, 1229 Kalakhang Maynila'
            ],
            [
                'name' => 'Pasig Catholic College',
                'email' => 'pcc@gmail.com',
                'address' => 'Justice Ramon, R. Jabson Street, Pasig, Metro Manila'
            ],
        ]);
    }
}
