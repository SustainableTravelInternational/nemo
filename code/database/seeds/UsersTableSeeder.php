<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder {
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run() {

		// Admin user population
		DB::table('users')->insert([
			'name' => 'admin',
			'email' => 'admin@nemo.com',
			'password' => bcrypt('password'),
			'role' => 'superadmin',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
		]);

		// Create random fake general users
		factory(App\Models\User::class, 99)->create();
	}
}
