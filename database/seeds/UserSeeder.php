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

        	$centres = factory(App\Centre::class,2)->create();

        	foreach ($centres as $centre) {
        		$user->centres()->save($centre);

                $batches= factory(App\Batch::class,4)->create(
                 ['centre_id'=>$centre->id]
             );

                foreach ($batches as $batch) {
                   $students= factory(App\Student::class,5)->create(
                     ['batch_id'=>$batch->id]
                 );       

                   foreach ($students as $student) {
                    $attendances= factory(App\Attendance::class,10)->create(
                     ['student_id'=>$student->id,]
                 );           

                }

            }	

        }


    });
    }
}
