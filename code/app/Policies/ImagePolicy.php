<?php

namespace App\Policies;

use App\Models\Image;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ImagePolicy {
	use HandlesAuthorization;

	/**
	 * Determine whether the user can view the image.
	 *
	 * @param  \App\Models\User  $user
	 * @param  \App\App\Models\Image  $image
	 * @return mixed
	 */
	public function view(User $user) {
		return true;
	}

	/**
	 * Determine whether the user can update the image.
	 *
	 * @param  \App\Models\User  $user
	 * @param  \App\App\Models\Image  $image
	 * @return mixed
	 */
	public function update(User $user, Image $image) {
		if ($user->isSuperAdmin() || $user->isAdmin() || $user->id == $image->user_id) {
			return true;
		} else {
			return false;
		}
	}
}
