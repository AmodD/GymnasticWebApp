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
        ],
        ['user_id' => 1 ,
        'name' => 'Kalyani School',
        'address' => 'Manjri',
        ]
	]);

    }
}
