<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Yajra\Datatables\Datatables;

class UserController extends Controller {
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		$this->authorize('update', User::class);

		return view('admin.users.index');
	}

	public function indexData() {
		$this->authorize('update', User::class);

		return Datatables::of(User::query())->make(true);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create() {
		$this->authorize('update', User::class);

		return view('admin.users.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request) {
		$this->authorize('update', User::class);

		$attributes = $this->validator($request->all(), 'required')->validate();

		// prevents creation of users with higher level roles
		$this->protectExcessUserAccessCreation($attributes);

		// Create the user
		$user = new User($attributes);
		$user->save();

		return redirect(route('users'));
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  \App\Models\User  $user
	 * @return \Illuminate\Http\Response
	 */
	public function show(User $user) {
		$this->authorize('update', User::class);

		return view('admin.users.edit', compact('user'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  \App\Models\User  $user
	 * @return \Illuminate\Http\Response
	 */
	public function edit(User $user) {
		$this->authorize('update', User::class);

		return view('admin.users.edit', compact('user'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \App\Models\User  $user
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, User $user) {
		$this->authorize('update', User::class);

		$attributes = $this->validator($request->all())->validate();

		// prevents creation of users with higher level roles
		$this->protectExcessUserAccessCreation($attributes);

		$user->patch($attributes);
		$user->save();

		return redirect(route('users.edit', $user->id));
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\Models\User  $user
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(User $user) {
		$this->authorize('update', User::class);

		$user->delete();

		return redirect(route('users'));
	}

	/**
	 * Get a validator for an incoming new user request.
	 *
	 * @param  array  $data
	 * @return \Illuminate\Contracts\Validation\Validator
	 */
	protected function validator(array $data, $required = '') {

		// Do not consider itself in uniqueness
		$emailUnique = 'unique:users' . (isset($data['id']) ? ',email,' . $data['id'] : '');

		return Validator::make($data, [
			'name' => [$required, 'string', 'max:255'],
			'email' => [$required, 'string', 'email', 'max:255', $emailUnique],
			'password' => [$required, 'string', 'min:8', 'confirmed', 'nullable'],
			'role' => [$required, Rule::in(['superadmin', 'admin', 'general'])],
			'profile_photo' => ['nullable', 'mimes:jpeg,png,jpg', 'max:1024'],
		]);
	}

	private function protectExcessUserAccessCreation($attributes) {
		// if selected role is superadmin, use must be superadmin
		if ($attributes['role'] == 'superadmin' && !auth()->user()->isSuperAdmin()) {
			abort(403);
		} else if ($attributes['role'] == 'admin' && !auth()->user()->isSuperAdmin() && !auth()->user()->isAdmin()) {
			abort(403);
		}
	}
}
