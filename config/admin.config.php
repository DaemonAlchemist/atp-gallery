<?php

return array(
	'admin' => array(
		'models' =>array(
			'atpgallery_image' => array(
				'displayName' => 'Image',
				'class' => 'ATPGallery\Model\Image',
				'category' => 'Gallery',
				'displayColumns' => array('Title', 'Url'),
				'defaultOrder' => 'post_date DESC',
				'tabs' => array(
					'Details' => array('title', 'url', 'post_date'),
					'Images' => array('image_file', 'thumbnail_file'),
					'Commentary' => array('description_html'),
				),
			),
			'atpgallery_category' => array(
				'displayName' => 'Category',
				'class' => 'ATPGallery\Model\Category',
				'category' => 'Gallery',
				'displayColumns' => array('Name', 'Url'),
				'defaultOrder' => 'name ASC',
			),
		),
	),
);
