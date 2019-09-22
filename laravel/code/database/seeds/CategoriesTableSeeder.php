<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder {
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run() {
		// Create random fake general users
		//factory(App\Models\Category::class, 10)->create();

		\DB::table('categories')->insert([
			'name' => 'Coral',
		]);

		\DB::table('categories')->insert([
			'name' => 'Pollution',
		]);

		\DB::table('categories')->insert([
			'name' => 'Marine Animal',
		]);
	}
}
