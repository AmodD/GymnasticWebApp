<?php

use Illuminate\Database\Seeder;

class CentreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
     DB::table('centres')->insert([
        [
        'name' => 'Symbiosis',
	'address' => 'Viman Nagar',
	'fee_amount' => 2300,
	'fee_frequency' => 'M' 
        ],
        [
        'name' => 'Kalyani School',
        'address' => 'Manjri',
	'fee_amount' => 1900,
	'fee_frequency' => 'Q' 
        ]
	]);

    }
}
