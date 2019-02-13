<?php

use App\Batch;
use Faker\Generator as Faker;


$factory->define(Batch::class, function (Faker $faker) {
	$batchLevel = collect(['Beginner','Intermediate','Advanced']);
	$batchType = collect(['Girls','Boys']);
	$time = collect(['5pm','6pm','7pm','8pm','9pm','7am','8am']);

    return [
        'name'=>$batchType->random()." ".$batchLevel->random(),
        'time'=>$time->random(),
    ];
});
