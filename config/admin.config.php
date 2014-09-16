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
			),
		),
	),
);
