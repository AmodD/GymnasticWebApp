<?php

use App\Student;



$factory->define(App\Student::class, function (Faker\Generator $faker) {

$indian = Faker\Factory::create('en_IN');
$level=['beginner','intermediate','advanced'];
$attendance =[20,40,60,80,100];

return [
        'name'=>$indian->name,
        'email'=>$faker->unique()->safeEmail,
        'level'=> array_rand($level,1),
        'attendance'=>$attendance[array_rand($attendance)]




// $factory->define(App\Student::class, function (Faker $faker) {
// 	$attendance=[20,40,60,80,100];
//     return [       
//         'name'=>$faker->name,
//         'email'=>$faker->unique()->safeEmail,
//         'attendance'=>$attendance[array_rand($attendance)],
// >>>>>>> 5ec194cbc49d556a9a45170ad05cc244177e9870
    ];
});
