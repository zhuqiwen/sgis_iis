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
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Models\Contact::class, function (Faker\Generator $faker)
{
	return [
		'first_name' => $faker->firstName,
//		'middle_name' => $faker->word,
		'last_name' => $faker->lastName,
		'email' => $faker->freeEmail,
		'phone_home' => $faker->phoneNumber,
		'phone_mobile' => $faker->phoneNumber,
		'address_country' => $faker->country,
		'address_city' => $faker->city,
		'address_line1' => $faker->streetName,
		'address_line2' => $faker->buildingNumber,
		'address_zip' => $faker->postcode,
		'no_email' => $faker->boolean(33),
		'no_phone_call' => $faker->boolean(19),
		'no_mail' => $faker->boolean(46),
		'iuaa_member' => $faker->boolean(50),
		'share_with_iuaa' => $faker->boolean(50),
		'created' => $faker->dateTimeThisDecade,
		'modified' => $faker->dateTimeThisDecade,
		'deleted' => mt_rand(1, 10) > 5 ? NULL : $faker->dateTimeThisMonth,
	];
});

