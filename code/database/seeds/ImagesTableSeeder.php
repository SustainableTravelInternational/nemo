<?php

use App\Models\Image;
use Illuminate\Database\Seeder;

class ImagesTableSeeder extends Seeder {
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run() {
		// Create random fake general users
		factory(App\Models\Image::class, 4)->create()->each(function ($image) {
			$image->categories()->save(factory(App\Models\Category::class)->make());
		});
	}
}
