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
        ['user_id' => 1 ,
        'name' => 'Symbiosis',
	'address' => 'Viman Nagar',
	'fee_amount' => 2300,
	'fee_frequency' => 'M' 
        ],
        ['user_id' => 1 ,
        'name' => 'Kalyani School',
        'address' => 'Manjri',
	'fee_amount' => 1900,
	'fee_frequency' => 'Q' 
        ]
	]);

    }
}
