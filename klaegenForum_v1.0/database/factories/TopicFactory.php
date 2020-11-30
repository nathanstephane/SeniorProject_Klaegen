<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;
use App\Topic;

$factory->define(Topic::class, function (Faker $faker) {
    return [
        'user_id' => function(){
            return factory('App\User')->create()->id;
        },
        'title' => $faker->sentence,
        'content' => $faker->paragraph,
        // 'user_id' => factory('App\User')->create()->id
        
    ];
});
