<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class GenerateFavicons extends Command {
	/**
	 * The name and signature of the console command.
	 *
	 * @var string
	 */
	protected $signature = 'mojito:generate:favicon {logo=logo.png} ';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Generate favicons from the png file located in resources/images';

	/**
	 * Create a new command instance.
	 *
	 * @return void
	 */
	public function __construct() {
		parent::__construct();
	}

	/**
	 * Execute the console command.
	 *
	 * @return mixed
	 */
	public function handle() {
		$image_file = $this->argument('logo');
		$target_folder = 'public/img/icons';

		$img = imagecreatefrompng("resources/images/" . $image_file);

		$this->info("Generating favicons from '{$image_file}'!");

		$this->generateFavicon($img, 16, $target_folder);
		$this->generateFavicon($img, 24, $target_folder);
		$this->generateFavicon($img, 32, $target_folder);
		$this->generateFavicon($img, 48, $target_folder);
		$this->generateFavicon($img, 57, $target_folder);
		$this->generateFavicon($img, 64, $target_folder);
		$this->generateFavicon($img, 72, $target_folder);
		$this->generateFavicon($img, 114, $target_folder);
		$this->generateFavicon($img, 120, $target_folder);
		$this->generateFavicon($img, 144, $target_folder);
		$this->generateFavicon($img, 152, $target_folder);

		$this->info("Generating main favicon ...");

		$cmd = "public/img/icons/favicon-16.png " .
			"public/img/icons/favicon-24.png " .
			"public/img/icons/favicon-32.png " .
			"public/img/icons/favicon-48.png " .
			"public/img/icons/favicon-64.png " .
			"public/favicon.ico";

		exec("convert $cmd");

		$this->info("Icons have been successfully created!");
	}

	private function generateFavicon($img, $size, $target_folder) {
		$this->info("Generating $size x $size png icon file...");
		$imgresized = $this->resizePng($img, $size, $size);
		imagepng($imgresized, $target_folder . '/favicon-' . $size . '.png');
	}

	private function resizePng($im, $dst_width, $dst_height) {
		$width = imagesx($im);
		$height = imagesy($im);

		$newImg = imagecreatetruecolor($dst_width, $dst_height);

		imagealphablending($newImg, false);
		imagesavealpha($newImg, true);
		$transparent = imagecolorallocatealpha($newImg, 255, 255, 255, 127);
		imagefilledrectangle($newImg, 0, 0, $width, $height, $transparent);
		imagecopyresampled($newImg, $im, 0, 0, 0, 0, $dst_width, $dst_height, $width, $height);

		return $newImg;
	}
}
