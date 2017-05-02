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
        'name' => $faker->firstName,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
        'auth_level' => '1'
    ];
});

$factory->state(App\User::class, 'registered', function ($faker) {
    return [
        'auth_level' => 0
    ];
});

$factory->define(App\Term::class, function (Faker\Generator $faker) {
    return [
        'id' => $faker->numberBetween(1000,2000),
        'term' => $faker->word,
        'pronunciation' => $faker->word,
        'meaning' => $faker->word,
        'origin' => $faker->streetName,
        'symptom' => $faker->words,
        'context' => $faker->sentence,
        'exemplification' => $faker->sentences,
        'examples' => $faker->sentence,
        'synonym' => $faker->word,
        'thesaurus' => $faker->word,
        'audio_path' => $faker->name.$faker->fileExtension,
        'last_find' => $faker->dateTimeThisMonth,
        'accepted' => 0,
        'user_id' => function () {
            return factory(App\User::class)->create()->id;},
        'district_id' => function () {
            return factory(App\District::class)->create()->id;},
        'part_of_speech_id' => function () {
            return factory(App\Part_of_speech::class)->create()->id;}
    ];
});
