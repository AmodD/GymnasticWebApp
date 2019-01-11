<?php

use Illuminate\Database\Seeder;
use App\Institute;
use App\User;
use App\Batch;
use App\Student;

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

// <<<<<<< HEAD
                $batches= factory(App\Batch::class,4)->create(
                           ['institute_id'=>$institute->id]
                );

                foreach ($batches as $batch) {
                        factory(App\Student::class,100)->create(
                           ['batch_id'=>$batch->id]
                );       
                    }	

            }

// =======
         //        $batches = factory(App\Batch::class,4)->create(['institute_id'=>$institute->id]);

         //            foreach ($batches as $batch) {
         //                factory(App\Student::class,50)->create(['batch_id'=>$batch->id]);
         //            }
        	// }
// >>>>>>> 5ec194cbc49d556a9a45170ad05cc244177e9870


        	

    });
    }
}
