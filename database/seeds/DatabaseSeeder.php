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

        App\User::all()->each(function ($user) use ($agencies) { 
            $user->agencies()->attach(App\Agency::find([1,2])); 
        });


        $admins = App\Admin::all();
        $donors = App\User::all();

        foreach($donors as $donor){
            factory(App\DonorPersonalDetails::class)->create(['donor_id' => $donor->id]);
        }

        $mbds = factory(App\MBD::class, 3)->create(['status' => 'Requested']);
        foreach($mbds as $mbd){
            factory(App\MBDSchedule::class)->create([
                'mbd_id' => $mbd->id,
                'date' => "2019-07-11",
                'start_time' => "10:00:00",
                'end_time' => "13:00:00",
                'venue' => "Connon",
                'expectedDonors' => 5
            ]);
        }
        foreach($mbds as $mbd){
            $mbd_donations = factory(App\Donation::class, 3)->create();
            foreach($mbd_donations as $mbd_donation){
                factory(App\DonationList::class)->create([
                    'mbd_id' => $mbd->id,
                    'donation_id' => $mbd_donation->id]);
            }
            
        }

        $donations = App\Donation::all();
        foreach($donations as $donation){
            factory(App\BloodUnit::class)->create(['donation_id' => $donation->id]);
        }
        $blood_units = App\BloodUnit::all();
        // foreach($blood_units as $blood_unit){
        //     factory(App\TypedBloodUnit::class)->create(['blood_unit_id' => $blood_unit->id]);
        // }


        // $must_have_typed = ["Typed", "Processed", "Stock"];
        // $must_have_processed = ["Processed", "Stock"];
    
        // foreach($blood_units as $blood_unit){
        //     if(in_array($blood_unit->status, $must_have_typed)){
        //         factory(TypedBloodUnit::class)->create([
        //             'blood_unit_id' => $blood_unit->id,
        //         ]);
        //     }
        // }

        // if(in_array($blood_unit->status, $must_have_processed)){
        //     factory(ProcessedBloodUnit::class)->create([
        //         'blood_unit_id' => $blood_unit->id,
        //     ]);
        // }
    }
}

     
        
    
