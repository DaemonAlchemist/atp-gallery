<?php

return array(
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
