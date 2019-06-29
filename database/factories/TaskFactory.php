<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Model;
use Faker\Generator as Faker;
use App\Task;

$factory->define(App\Task::class, function (Faker $faker) {
    return [
        // 'body' => $faker->sentence
        'body' => $faker->sentence,
        'project_id' => factory(\App\Project::class),
        'completed' => false
    ];
});
