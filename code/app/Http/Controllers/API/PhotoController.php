<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Image;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;
use Phaza\LaravelPostgis\Geometries\Point;

class PhotoController extends Controller {
	public function index2() {
		return Image::select(['users.name', 'users.profile_photo', 'users.created_at', 'images.id', 'images.photo', 'images.created_at', 'images.notes', 'images.diving_site'])
			->join('users', 'users.id', 'images.user_id')
			->get();
	}

	public function index(Request $request) {
		// Paginate results
		$currentPage = $request->input('page', 1);
		$pageSize = 20;

		// Search Categories
		$category = $request->input('category', '%');

		// Search Diving_site
		$diving_site = $request->input('diving_site', '%');

		// Search by ID
		$id = $request->input('id');


		// $data = [];
		if ($id) {
			$data = Image::select(['users.name', 'users.profile_photo', 'users.created_at as users_created_at', 'images.id', 'images.photo', 'images.created_at as images_created_at', 'images.notes', 'images.diving_site'])
			->join('users', 'users.id', 'images.user_id')
			->where('images.id', '=', $id)
			->get()
			->toArray();
		} else {
			$data = Image::select(['users.name', 'users.profile_photo', 'users.created_at as users_created_at', 'images.id', 'images.photo', 'images.created_at as images_created_at', 'images.notes', 'images.diving_site'])
						->join('users', 'users.id', 'images.user_id')
						->whereHas('categories', function ($query) use ($category) {
							$query->where('name', 'like', $category);
						})
						->where('diving_site', 'like', '%' . $diving_site . '%')
						->take($pageSize)
						->skip((($currentPage - 1) * $pageSize))
						->get()
						->toArray();
		}
		

		return $this->prepareImageUrls($data);
	}

	private function prepareImageUrls($data) {
		$result = array();

		foreach ($data as $row) {
			$user_created_at = Carbon::parse($row['users_created_at']);
			$image_created_at = Carbon::parse($row['images_created_at']);

			$row['profile_photo'] = env('DATA_PROFILE_PICTURE_FOLDER') .
			$user_created_at->year . '/' .
			$user_created_at->month . '/' .
			$user_created_at->day . '/' .
				$row['profile_photo'];
			
			$row['photo'] = env('DATA_PHOTO_FOLDER') .
			$image_created_at->year . '/' .
			$image_created_at->month . '/' .
			$image_created_at->day . '/' .
				$row['photo'];

			array_push($result, $row);
		}

		return $result;
	}

	public function store(Request $request) {
		$attributes = $this->validator($request->all(), 'required')->validate();

		$attributes['diving_site'] = $this->getDivingSite($attributes['latitude'], $attributes['longitude']);
		$attributes['location'] = new Point($attributes['latitude'], $attributes['longitude']);

		// Create the image
		$image = new Image($attributes);
		$image->user()->associate(auth()->user());

		$image->save();
		$image->categories()->sync($attributes['categories']);

		$response['message'] = 'Image was successfully uploaded!';
		$response['status'] = Response::HTTP_OK;
		return response()->json(
			$response,
			Response::HTTP_OK
		);
	}

	/**
	 * Get a validator for an incoming new user request.
	 *
	 * @param  array  $data
	 * @return \Illuminate\Contracts\Validation\Validator
	 */
	protected function validator(array $data, $required = '') {
		return Validator::make($data, [
			'latitude' => [$required, 'numeric'],
			'longitude' => [$required, 'numeric'],
			'date' => [$required, 'date'],
			'categories' => [$required, 'exists:categories,id'],
			'photo' => [$required],
			'notes' => ['string'],
		]);
	}

	private function getDivingSite($latitude, $longitude) {
		$response = file_get_contents("http://api.divesites.com/?mode=sites&lat=$latitude&lng=$longitude&dist=1000");
		if (isset($response)) {
			$result = json_decode($response);

			if (isset($result->sites) && count($result->sites) > 0) {
				return $result->sites[0]->name;
			}
		}

		return 'Not Found';
	}
}