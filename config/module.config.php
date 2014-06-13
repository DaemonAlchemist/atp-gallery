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
);
