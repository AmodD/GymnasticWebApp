<?php

use App\Batch;
use Faker\Generator as Faker;


$factory->define(Batch::class, function (Faker $faker) {
		$batchName=['beginner','intermediate','advanced'];
		$time =['5pm','6pm','7pm','8pm','9pm'];
    return [
        'name'=>$batchName[array_rand($batchName)],
        'time'=>$time[array_rand($time)],
    ];
});
