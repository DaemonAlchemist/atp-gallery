<?php

namespace ATPGallery;

class Module extends \ATP\Module
{
	protected $_moduleName = "ATPGallery";
	protected $_moduleBaseDir = __DIR__;
	
	protected function getInstallDbQueries()
	{
		return array(
			"CREATE TABLE `atpgallery_images` (
				`id` int(11) NOT NULL AUTO_INCREMENT,
				`title` char(64) COLLATE utf8_unicode_ci DEFAULT NULL,
				`url` char(64) COLLATE utf8_unicode_ci NOT NULL,
				`post_date` date DEFAULT NULL,
				`image_file` char(255) COLLATE utf8_unicode_ci DEFAULT NULL,
				`thumbnail_file` char(255) COLLATE utf8_unicode_ci DEFAULT NULL,
				`description_html` text COLLATE utf8_unicode_ci,
				PRIMARY KEY (`id`),
				UNIQUE KEY `url_UNIQUE` (`url`),
				KEY `post_date_index` (`post_date`)
			) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci",
		);
	}
}
