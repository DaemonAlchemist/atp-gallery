<?php

namespace ATPGallery\Controller;

class IndexController extends \ATPCore\Controller\AbstractController
{
	public function indexAction()
	{
		$image = new \ATPGallery\Model\Image();
		$images = $image->loadMultiple(null, array(), array(), "post_date DESC");
	
		return new \Zend\View\Model\ViewModel(array(
			'images' => $images
		));
	}
}
