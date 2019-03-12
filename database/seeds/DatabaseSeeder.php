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
         'email' => 'abhi.padhye@gmail.com',
         'email_verified_at' => now(),
         'password' => Hash::make('abc'),
        ],
        ['name' => 'Ajinkya',
         'email' => 'ajinkyameister@gmail.comp',
         'email_verified_at' => now(),
         'password' => Hash::make('abc'), 
        ],
	['name' => 'Amod',
         'email' => 'amod.d.kulkarni@gmail.com',
         'email_verified_at' => now(),
         'password' => Hash::make('abc'),
        ]
    ]);

     $this->call(CentreSeeder::class);
     $this->call(UserSeeder::class);

 }
}
