<?php

use App\Batch;
use Faker\Generator as Faker;


$factory->define(Batch::class, function (Faker $faker) {
	$batchLevel = collect(['Beginner','Intermediate','Advanced']);
	$batchType = collect(['Girls','Boys']);
	$time = collect(['1700','1800','1900','2000','1100','0700','0800']);

    return [
        'name'=>$batchType->random()." ".$batchLevel->random(),
        'time'=>$time->random(),
    ];
});
