<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Comment;
use Faker\Generator as Faker;

$factory->define(Comment::class, function (Faker $faker) {
    return [
        'commenter_id' => App\User::all()->random()->id,
        'coop_id' => App\Coop::all()->random()->id,
        'comment_text' => $faker->text($maxNbChars=250),
    ];
});
