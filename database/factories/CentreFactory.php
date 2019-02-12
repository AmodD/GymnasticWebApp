<?php

use Faker\Generator as Faker;
use App\Centre;

$factory->define(App\Centre::class, function (Faker $faker) {
    return [
    	'name' =>  'University of ' . $faker->city,
    	'user_id'=>1,
    ];
});
