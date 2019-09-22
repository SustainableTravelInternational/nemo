<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model {

	public $timestamps = false;
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'name',
	];

	/**
	 * The images that belong to the category.
	 */
	public function images() {
		return $this->belongsToMany('App\Models\Image');
	}
}
