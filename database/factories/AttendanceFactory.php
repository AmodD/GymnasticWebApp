<?php

use App\Attendance;
use Faker\Generator as Faker;

$factory->define(Attendance::class, function (Faker $faker) {
    return [
        'Date'=>$faker->date,
        'Present'=>$faker->boolean,
    ];
});
