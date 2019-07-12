<?php

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
        $this->call(AdminsTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        factory(App\Admin::class, 10)->create();
        factory(App\User::class, 10)->create();
        $agencies = $this->call(AgenciesTableSeeder::class);
        $admins = App\Admin::all();
        $donors = App\User::all();

        foreach($donors as $donor){
            factory(App\DonorPersonalDetails::class)->create(['donor_id' => $donor->id]);
        }

        $donations = factory(App\Donation::class, 10)->create();
        $mbds = factory(App\MBD::class, 10)->create();
        foreach($mbds as $mbd){
            factory(App\DonationList::class)->create(['mbd_id' => $mbd->id]);
            }
        }
}
