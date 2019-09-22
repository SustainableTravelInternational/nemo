<?php

namespace App\Providers;

use App\Providers\TelescopeServiceProvider;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider {
	/**
	 * Register any application services.
	 *
	 * @return void
	 */
	public function register() {
		if ($this->app->isLocal()) {
			$this->app->register(TelescopeServiceProvider::class);
		}
	}

	/**
	 * Bootstrap any application services.
	 *
	 * @return void
	 */
	public function boot() {

		// Registering the Favicons blade directive
		Blade::directive('mojitoFavicons', function () {
			return '<?php echo "
				<link rel=\'shortcut icon\' sizes=\'16x16 24x24 32x32 48x48 64x64\' href=\'/favicon.ico\'>
				<link rel=\'apple-touch-icon\' sizes=\'57x57\' href=\'/img/icons/favicon-57.png\'>
				<link rel=\'apple-touch-icon-precomposed\' sizes=\'57x57\' href=\'/img/icons/favicon-57.png\'>
				<link rel=\'apple-touch-icon\' sizes=\'72x72\' href=\'/img/icons/favicon-72.png\'>
				<link rel=\'apple-touch-icon\' sizes=\'114x114\' href=\'/img/icons/favicon-114.png\'>
				<link rel=\'apple-touch-icon\' sizes=\'120x120\' href=\'/img/icons/favicon-120.png\'>
				<link rel=\'apple-touch-icon\' sizes=\'144x144\' href=\'/img/icons/favicon-144.png\'>
				<link rel=\'apple-touch-icon\' sizes=\'152x152\' href=\'/img/icons/favicon-152.png\'>
				<meta name=\'application-name\' content=\'Mojito\'>
				<meta name=\'msapplication-TileImage\' content=\'/img/icons/favicon-144.png\'>
				<meta name=\'msapplication-TileColor\' content=\'#2A2A2A\'>
			"; ?>';
		});
	}
}
