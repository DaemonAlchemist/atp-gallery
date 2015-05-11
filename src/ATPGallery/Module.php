<?php

namespace ATPGallery;

class Module extends \ATP\Module
{
	protected $_moduleName = "ATPGallery";
	protected $_moduleBaseDir = __DIR__;
	
	protected function getInstallDbQueries()
	{
		return array(
			"CREATE TABLE `atpgallery_categories` (
				`id` int(11) NOT NULL AUTO_INCREMENT,
				`url` char(32) COLLATE utf8_unicode_ci DEFAULT NULL,
				`name` char(32) COLLATE utf8_unicode_ci DEFAULT NULL,
				`thumbnail_file` char(255) COLLATE utf8_unicode_ci DEFAULT NULL,
				PRIMARY KEY (`id`),
				KEY `url_index` (`url`)
			) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci",
			
			"INSERT INTO atpgallery_categories (url, name) values
			 ('photos', 'Photos'),
			 ('other-images', 'Other Images')",
			
			"CREATE TABLE `atpgallery_images` (
				`id` int(11) NOT NULL AUTO_INCREMENT,
				`category_id` int(11) DEFAULT NULL,
				`title` char(64) COLLATE utf8_unicode_ci DEFAULT NULL,
				`url` char(32) COLLATE utf8_unicode_ci NOT NULL,
				`post_date` date DEFAULT NULL,
				`image_file` char(255) COLLATE utf8_unicode_ci DEFAULT NULL,
				`thumbnail_file` char(255) COLLATE utf8_unicode_ci DEFAULT NULL,
				`description_html` text COLLATE utf8_unicode_ci,
				PRIMARY KEY (`id`),
				UNIQUE KEY `url_UNIQUE` (`url`),
				KEY `post_date_index` (`post_date`),
				KEY `category_fk_idx` (`category_id`),
				CONSTRAINT `category_fk` FOREIGN KEY (`category_id`) REFERENCES `atpgallery_categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
			) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci",
		);
	}
}
