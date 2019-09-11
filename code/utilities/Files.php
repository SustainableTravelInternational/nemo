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
		'/' . $date->year .
		'/' . $date->month .
		'/' . $date->day;

		Files::ensureFileFolder($filepath . '/' . $filename);

		$photo->move($filepath, $filename);

		return $filename;
	}

	public static function storeUserPhoto($photo, $date) {
		$filename = intval(microtime(true) * 10000) . '.' . $photo->getClientOriginalExtension();

		$filepath = public_path() .
		env('DATA_PHOTO_FOLDER') .
		'/' . $date->year .
		'/' . $date->month .
		'/' . $date->day;

		Files::ensureFileFolder($filepath . '/' . $filename);

		$photo->move($filepath, $filename);

		return $filename;
	}

	public static function saveBase64Image($data, $date) {
		if (preg_match('/^data:image\/(\w+);base64,/', $data, $type)) {
			$data = substr($data, strpos($data, ',') + 1);
			$type = strtolower($type[1]); // jpg, png, gif

			if (!in_array($type, ['jpg', 'jpeg', 'gif', 'png'])) {
				throw new \Exception('invalid image type');
			}

			$data = base64_decode($data);

			if ($data === false) {
				throw new \Exception('base64_decode failed');
			}
		} else {
			throw new \Exception('did not match data URI with image data');
		}

		$filename = intval(microtime(true) * 10000) . '.' . $type;

		$filepath = public_path() .
		env('DATA_PHOTO_FOLDER') .
		'/' . $date->year .
		'/' . $date->month .
		'/' . $date->day;

		Files::ensureFileFolder($filepath . '/' . $filename);

		file_put_contents($filepath . '/' . $filename, $data);

		return $filename;
	}
}
