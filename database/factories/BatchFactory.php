<?php

use App\Batch;
use Faker\Generator as Faker;

$batchName=['beginner','intermediate','advanced'];

$factory->define(Batch::class, function (Faker $faker) {

    return [
        'name'=>'advanced',
    ];
});
