<?php

use Illuminate\Database\Seeder;
use App\Institute;
use App\User;
use App\Batch;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\User::class, 1)->create()->each(function ($user) {
        
        	$institutes = factory(App\Institute::class,2)->create();

        	foreach ($institutes as $institute) {
        		$user->institutes()->save($institute);

                factory(App\Batch::class,4)->create(['institute_id'=>$institute->id]);

        	}


        	

    });
    }
}
