<?php

namespace ATPGallery;

class Module extends \ATP\Module
{
	protected $_moduleName = "ATPGallery";
	protected $_moduleBaseDir = __DIR__;
	
	protected function getInstallFiles()
	{
		return array(
			"media/sample-1.jpg"		=> "public/uploads/atpgallery_images/1/sample-1.jpg",
			"media/sample-1-thumb.jpg"	=> "public/uploads/atpgallery_images/1/sample-1-thumb.jpg",
			"media/sample-2.jpg"		=> "public/uploads/atpgallery_images/2/sample-2.jpg",
			"media/sample-2-thumb.jpg"	=> "public/uploads/atpgallery_images/2/sample-2-thumb.jpg",
			"media/sample-3.jpg"		=> "public/uploads/atpgallery_images/3/sample-3.jpg",
			"media/sample-3-thumb.jpg"	=> "public/uploads/atpgallery_images/3/sample-3-thumb.jpg",
			"media/sample-4.jpg"		=> "public/uploads/atpgallery_images/4/sample-4.jpg",
			"media/sample-4-thumb.jpg"	=> "public/uploads/atpgallery_images/4/sample-4-thumb.jpg",
		);
	}
	
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
			
			"INSERT INTO atpgallery_images (category_id, title, url, post_date, image_file, thumbnail_file) values
			 (1, 'Beach 1', 'beach-1', NOW(), '{\"name\":\"sample-1.jpg\",\"type\":\"image\/jpeg\",\"size\":88049}', '{\"name\":\"sample-1-thumb.jpg\",\"type\":\"image\/jpeg\",\"size\":58319}'),
			 (1, 'Beach 2', 'beach-2', NOW(), '{\"name\":\"sample-2.jpg\",\"type\":\"image\/jpeg\",\"size\":105919}', '{\"name\":\"sample-2-thumb.jpg\",\"type\":\"image\/jpeg\",\"size\":63815}'),
			 (2, 'Beach 3', 'beach-3', NOW(), '{\"name\":\"sample-3.jpg\",\"type\":\"image\/jpeg\",\"size\":178300}', '{\"name\":\"sample-3-thumb.jpg\",\"type\":\"image\/jpeg\",\"size\":123863}'),
			 (2, 'Beach 4', 'beach-4', NOW(), '{\"name\":\"sample-4.jpg\",\"type\":\"image\/jpeg\",\"size\":147573}', '{\"name\":\"sample-4-thumb.jpg\",\"type\":\"image\/jpeg\",\"size\":76510}')
			",
		);
	}
}
