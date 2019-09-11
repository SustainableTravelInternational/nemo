<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Image;
use Faker\Generator as Faker;
use Phaza\LaravelPostgis\Geometries\Point;

$factory->define(Image::class, function (Faker $faker) {
	return [
		'user_id' => factory(App\Models\User::class),
		'photo' => 'sample.jpg',
		'notes' => $faker->text,
		'location' => new Point($faker->latitude($min = -90, $max = 90), $faker->longitude($min = -180, $max = 180)),
		'diving_site' => $faker->city,
	];
});
