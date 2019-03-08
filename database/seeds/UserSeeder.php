<?php

use Illuminate\Database\Seeder;
use App\Centre;
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
        $centres = Centre::all();

	foreach ($centres as $centre) 
	{
                $batches= factory(App\Batch::class,4)->create(['centre_id'=>$centre->id]);

		foreach ($batches as $batch) 
		{
		       	$students= factory(App\Student::class,5)->create(['batch_id'=>$batch->id]);       

	                foreach ($students as $student) { $attendances= factory(App\Attendance::class,10)->create(['student_id'=>$student->id,]);}
                }//foreach batch	
        }//foreach centres

     }//method
   
}//class
