<?php

use Faker\Generator as Faker;
use App\Institute;

$factory->define(App\Institute::class, function (Faker $faker) {
    return [
    	'name' =>  'University of ' . $faker->city,
    	'user_id'=>1,
    ];
});
