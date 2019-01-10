<?php

use App\Student;
use Faker\Generator as Faker;




$factory->define(App\Student::class, function (Faker $faker) {
	$attendance=[20,40,60,80,100];
    return [       
        'name'=>$faker->name,
        'email'=>$faker->unique()->safeEmail,
        'attendance'=>$attendance[array_rand($attendance)],
    ];
});
