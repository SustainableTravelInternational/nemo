<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Image;
use DataTables;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Phaza\LaravelPostgis\Geometries\Point;

class ImageController extends Controller {
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		$this->authorize('view', Image::class);

		return view('admin.images.index');
	}

	public function indexData() {
		$this->authorize('view', Image::class);

		$model = Image::query();

		return DataTables::eloquent($model)
			->addColumn('user', function (Image $image) {
				return $image->user->name;
			})
			->addColumn('category', function (Image $image) {
				return $image->categories->map(function ($category) {
					return $category->name;
				})->implode(', ');
			})
			->addColumn('photo_url', function (Image $image) {
				return env('DATA_PHOTO_FOLDER') .
				$image->created_at->year . '/' .
				$image->created_at->month . '/' .
				$image->created_at->day . '/' .
				$image->photo;
			})
			->toJson();
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create() {
		$this->authorize('view', Image::class);

		$categories = Category::all();

		return view('admin.images.create', compact('categories'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request) {
		$attributes = $this->validator($request->all(), 'required')->validate();

		$attributes['diving_site'] = $this->getDivingSite($attributes['latitude'], $attributes['longitude']);
		$attributes['location'] = new Point($attributes['latitude'], $attributes['longitude']);

		// Create the user
		$image = new Image($attributes);
		$image->user()->associate(auth()->user());

		$image->save();
		$image->categories()->sync($attributes['categories']);

		return redirect(route('images'));
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  \App\Models\Image  $image
	 * @return \Illuminate\Http\Response
	 */
	public function show(Image $image) {
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  \App\Models\Image  $image
	 * @return \Illuminate\Http\Response
	 */
	public function edit(Image $image) {
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \App\Models\Image  $image
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, Image $image) {
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\Models\Image  $image
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(Image $image) {
		$this->authorize('update', $image);

		$image->delete();

		return redirect(route('images'));
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
			'photo' => [$required, 'mimes:jpeg,png,jpg', 'max:10240'],
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
