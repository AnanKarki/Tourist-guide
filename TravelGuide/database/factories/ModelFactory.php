<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->sentence,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
        
    ];
});
$factory->define(App\Crud::class, function (Faker\Generator $faker) {
  

    return [
          'title'=>$faker->sentence,
          'post'=> $faker->sentence,
          'when_to_visit' => $faker->sentence,
          'first_month' => random_int(1000,5000),
          'second_month' => random_int(1000,5000),
          'third_month' => random_int(1000,5000),
          'fourth_month' => random_int(1000,5000),
          'fifth_month' => random_int(1000,5000),
          'sixth_month'=> random_int(1000,5000),
          'seventh_month' => random_int(1000,5000),
          'eight_month' => random_int(1000,5000),
          'ninth_month' => random_int(1000,5000),
          'tenth_month' => random_int(1000,5000),
          'eleventh_month' => random_int(1000,5000),
          'twelveth_month'=> random_int(1000,5000),
          'domestic_tourist_livingexpense_lowrate' => random_int(1000,5000),
          'domestic_tourist_livingexpense_highrate' => random_int(1000,5000),
          'international_tourist_livingexpense_lowrate' => random_int(1000,5000),
    'international_tourist_livingexpense_highrate'=> random_int(1000,5000),
    'domestic_tourist_transportationexpense_lowrate' => random_int(1000,5000),
    'domestic_tourist_transportationexpense_highrate' => random_int(1000,5000),
    'international_tourist_transportationexpense_lowrate' => random_int(1000,5000),
    'international_tourist_transportationexpense_highrate' => random_int(1000,5000),


    ];
});
$factory->define(App\Review::class, function (Faker\Generator $faker) {
   

    return [
    	'place' => $faker->sentence,
    	'comment' => $faker->sentence ,
    	'rating' => random_int(0, 5),
    	'username'=> $faker->username,
        
   
    ];
});