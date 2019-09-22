<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('categories', function (Blueprint $table) {
			$table->bigIncrements('id');
			$table->string('name', 50);
		});

		Schema::create('category_image', function (Blueprint $table) {
			$table->bigInteger('category_id')->unsigned()->index();
			$table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
			$table->bigInteger('image_id')->unsigned()->index();
			$table->foreign('image_id')->references('id')->on('images')->onDelete('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists('category_image');
		Schema::dropIfExists('categories');
	}
}
