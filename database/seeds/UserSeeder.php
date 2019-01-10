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
     * @return 
     */
    public function run()
    {
        factory(App\User::class, 1)->create()->each(function ($user) {
        
        	$institutes = factory(App\Institute::class,2)->create();

        	foreach ($institutes as $institute) {
        		$user->institutes()->save($institute);

                $batches= factory(App\Batch::class,4)->create(
                           ['institute_id'=>$institute->id]
                );

                foreach ($batches as $batch) {
                        factory(App\Student::class,100)->create(
                           ['batch_id'=>$batch->id]
                );       
                    }	

            }



        	

    });
    }
}
