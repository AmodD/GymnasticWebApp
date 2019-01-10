<?php

use App\Student;
use Faker\Generator as Faker;


$factory->define(App\Student::class, function (Faker $faker) {

	$level=['beginner','intermediate','advanced'];
    return [
        'name'=>$faker->name,
        'email'=>$faker->unique()->safeEmail,
        'level'=> array_rand($level,1),
        'attendance'=>100

    ];
});
