<?php

namespace Utilities;

class Files {
	public static function ensureFileFolder($path) {
		if (strripos($path, '/') + 1 < strlen($path)) {
			$path = substr($path, 0, strripos($path, '/'));
		}

		$path = public_path() . $path;

		if (!file_exists($path)) {
			mkdir($path, 0777, true);
		}
	}

	public static function storeProfilePicture($photo, $date) {
		$filename = intval(microtime(true) * 10000) . '.' . $photo->getClientOriginalExtension();

		$filepath = public_path() .
		env('DATA_PROFILE_PICTURE_FOLDER') .
		'/' . $date->month .
		'/' . $date->day;

		Files::ensureFileFolder($filepath . '/' . $filename);

		$photo->move($filepath, $filename);

		return $filename;
	}
}
