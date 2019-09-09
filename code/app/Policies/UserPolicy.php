<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy {
	use HandlesAuthorization;

	/**
	 * Determine whether the user can create super admins.
	 *
	 * @param  \App\Models\User  $user
	 * @param  \App\Models\User  $model
	 * @return mixed
	 */
	public function createSuperAdmin(User $user) {
		if ($user->isSuperAdmin()) {
			return true;
		} else {
			return false;
		}
	}

	/**
	 * Determine whether the user can create admins.
	 *
	 * @param  \App\Models\User  $user
	 * @param  \App\Models\User  $model
	 * @return mixed
	 */
	public function createAdmin(User $user) {
		if ($user->isSuperAdmin() || $user->isAdmin()) {
			return true;
		} else {
			return false;
		}
	}

	/**
	 * Determine whether the user can update the model.
	 *
	 * @param  \App\Models\User  $user
	 * @param  \App\Models\User  $model
	 * @return mixed
	 */
	public function update(User $user) {
		if ($user->isSuperAdmin() || $user->isAdmin()) {
			return true;
		} else {
			return false;
		}
	}
}
