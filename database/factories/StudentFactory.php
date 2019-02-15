<?php

use App\Student;



$factory->define(App\Student::class, function (Faker\Generator $faker) {

$indian = Faker\Factory::create('en_IN');
$level=['beginner','intermediate','advanced'];
$attendance =[20,40,60,80,100];

return [
        'name'=>$indian->name,
	'parent_email'=>$indian->email,
	'parent_mobile' => $indian->mobileNumber,
	'date_of_birth' => $faker->date($format = 'Y-m-d',$startDate = '-30 years', $max = '2010-2-12'),
	'date_of_joining' => $faker->date($format = 'Y-m-d',$startDate = '-10 years', $max = 'now'),
	'date_of_leaving' => $faker->date($format = 'Y-m-d',$startDate = '-2 years', $max = 'now'),
	'active' => $faker->boolean($chanceOfGettingTrue = 90)

    ];
});
