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
     DB::table('users')->insert([
        ['name' => 'Abhijeet',
         'email' => 'padhye.ac@gmail.com',
         'email_verified_at' => now(),
         'password' => Hash::make('Gym#*493'),
        ],
        ['name' => 'Kalyani Admin',
         'email' => 'kalyaniadmin@abc.com',
         'email_verified_at' => now(),
         'password' => Hash::make('KA@123'), 
        ],
	['name' => 'Amod',
         'email' => 'amod.d.kulkarni@gmail.com',
         'email_verified_at' => now(),
         'password' => Hash::make('abc'),
        ]
    ]);

     $this->call(CentreSeeder::class);
    // $this->call(UserSeeder::class);

 }
}
