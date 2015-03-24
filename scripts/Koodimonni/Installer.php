<?php
namespace Koodimonni;

use Composer\Script\Event;

class Installer {
	public static function installLanguages(Event $event) {
		$io = $event->getIO();
		$extra = $event->getComposer()->getPackage()->getExtra();
		if (!empty($extra['wordpress-languages-dir'])) {

			$root = dirname(dirname(__DIR__));
			$wp_languages_folder = "{$root}/{$extra['wordpress-languages-dir']}";
			$wp_languages_vendor = "{$root}/vendor/koodimonni-language";

			if (!file_exists($wp_languages_folder)) {
				$io->write("wordpress-languages-dir doesn't exist!");
// 				exit(1);
				mkdir($wp_languages_folder);
			}

			$io->write("Copying languagefiles into: {$wp_languages_folder}");
			//Use rsync to copy all but composer.json
			exec("rsync -va {$wp_languages_vendor}/*/* {$wp_languages_folder} --exclude=composer.json");
		}
	}
}
?>