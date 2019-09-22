<?php

namespace App\Listeners;

use App\Notifications\PasswordReset as PasswordResetNotification;
use Illuminate\Auth\Events\PasswordReset as PasswordResetEvent;

class SendEmailPasswordResetNotification {
	/**
	 * Create the event listener.
	 *
	 * @return void
	 */
	public function __construct() {
		//
	}

	/**
	 * Handle the event.
	 *
	 * @param  object  $event
	 * @return void
	 */
	public function handle(PasswordResetEvent $event) {
		$event->user->notify(new PasswordResetNotification());
	}
}
