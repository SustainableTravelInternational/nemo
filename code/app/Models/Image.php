<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Phaza\LaravelPostgis\Eloquent\PostgisTrait;
use Utilities\Files;

class Image extends Model {
	use PostgisTrait;

	protected $fillable = [
		'user_id',
		'photo',
		'notes',
		'diving_site',
		'location',
	];

	protected $postgisFields = [
		'location',
	];

	protected $postgisTypes = [
		'location' => [
			'geomtype' => 'geography',
			'srid' => 4326,
		],
	];

	/**
	 * The categories that belong to the image.
	 */
	public function categories() {
		return $this->belongsToMany('App\Models\Category');
	}

	/**
	 * Get the author of the image.
	 */
	public function user() {
		return $this->belongsTo('App\Models\User');
	}

	public function setPhotoAttribute($value) {
		$filename = '';

		if (is_object($value)) {
			$filename = Files::storeUserPhoto($value, Carbon::now());
		} else if (is_string($value)) {
			$filename = Files::saveBase64Image($value, Carbon::now());
		}

		$this->attributes['photo'] = $filename;
	}

	// public function getPhotoAttribute() {
	// 	return env('DATA_PHOTO_FOLDER') .
	// 	$this->created_at->month . '/' .
	// 	$this->created_at->day . '/' .
	// 	$this->photo;
	// }
}
