<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2013 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

return array(
	'admin' => array(
		'models' =>array(
			'gallery_image' => array(
				'displayName' => 'Image',
				'class' => 'ATPGallery\Model\Image',
				'category' => 'Gallery',
				'displayColumns' => array('Title', 'Url'),
				'defaultOrder' => 'post_date DESC',
				'fields' => array(
					'Title' => array(
						'type' => 'Text',
						'label' => 'Title'
					),
					'Url' => array(
						'type' => 'Text',
						'label' => 'Url',
					),
					'PostDate' => array(
						'type' => 'Date',
						'label' => 'Post Date',
					),
					'Image' => array(
						'type' => 'File',
						'label' => 'Image',
					),
					'Thumbnail' => array(
						'type' => 'File',
						'label' => 'Thumbnail'
					),
					'Description' => array(
						'type' => 'Html',
						'label' => 'Image Description'
					),
				),
			),
		),
	),
	'asset_manager' => array(
		'resolver_configs' => array(
			'paths' => array(
				__DIR__ . '/../public',
			),
		),
	),
	'gallery' => array(
		'thumbnailSize' => 200,
	),
    'router' => array(
        'routes' => array(
            'gallery' => array(
                'type'    => 'Segment',
                'options' => array(
                    'route'    => '/gallery[/:action[/:id]]',
                    'defaults' => array(
                        'controller'    => 'ATPGallery\Controller\IndexController',
                        'action'        => 'list',
                    ),
                ),
            ),
        ),
    ),
    'controllers' => array(
        'invokables' => array(
            'ATPGallery\Controller\IndexController' => 'ATPGallery\Controller\IndexController'
        ),
    ),
    'view_manager' => array(
        'template_path_stack' => array(
            __DIR__ . '/../view',
        ),
	),
);
