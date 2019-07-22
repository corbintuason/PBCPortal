<?php

use Illuminate\Database\Seeder;

class MaterialsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('materials')->insert([
            [
                'name' => 'Syringes',
                'stocks_left' => 500
            ],
            [
                'name' => 'Barcodes',
                'stocks_left' => 500
            ],
            [
                'name' => 'Blood Bags',
                'stocks_left' => 2000
            ]
            
        ]);
    }
}
