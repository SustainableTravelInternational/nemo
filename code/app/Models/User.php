<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Laravel\Passport\HasApiTokens;
use Utilities\Files;

class User extends Authenticatable {
	use HasApiTokens, Notifiable, SoftDeletes;

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'name', 'email', 'password', 'role', 'profile_photo',
	];

	/**
	 * The attributes that should be hidden for arrays.
	 *
	 * @var array
	 */
	protected $hidden = [
		'password', 'remember_token',
	];

	/**
	 * The attributes that should be cast to native types.
	 *
	 * @var array
	 */
	protected $casts = [
		'email_verified_at' => 'datetime',
	];

	public function patch($user) {
		$this->name = isset($user['name']) ? $user['name'] : $this->name;
		$this->email = isset($user['email']) ? $user['email'] : $this->email;
		$this->password = isset($user['password']) ? $user['password'] : $this->password;
		$this->role = isset($user['role']) ? $user['role'] : $this->role;
		$this->updated_at = Carbon::now();
		if (isset($user['profile_photo'])) {
			$this->profile_photo = $user['profile_photo'];
		}
	}

	public function isSuperAdmin() {
		return $this->role == 'superadmin';
	}

	public function isAdmin() {
		return $this->role == 'admin';
	}

	public function isGeneral() {
		return is_null($this->role) || $this->role == 'general';
	}

	public function getProfilePhoto() {
		if (isset($this->profile_photo)) {
			return env('DATA_PROFILE_PICTURE_FOLDER') .
			$this->created_at->month . '/' .
			$this->created_at->day . '/' .
			$this->profile_photo;
		}

		return env('DATA_PROFILE_PICTURE_DEFAULT');
	}

	public function setProfilePhotoAttribute($value) {
		$filename = Files::storeProfilePicture($value,
			isset($this->created_at) ? $this->created_at : Carbon::now());

		$this->attributes['profile_photo'] = $filename;
	}

	public function setEmailAttribute($value) {
		$this->attributes['email'] = strtolower($value);
	}

	public function setPasswordAttribute($value) {
		$this->attributes['password'] = Hash::make($value);
	}
}
