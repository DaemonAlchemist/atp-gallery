<?php

namespace ATPGallery\Controller;

class IndexController extends \ATPCore\Controller\AbstractController
{
	public function listAction()
	{
		$image = new \ATPGallery\Model\Image();
		$images = $image->loadMultiple(null, array(), array(), "post_date DESC");
	
		return new \Zend\View\Model\ViewModel(array(
			'images' => $images
		));
	}
	
	public function viewAction()
	{
		$url = $this->params('id');
		$image = new \ATPGallery\Model\Image($url);
	
		return new \Zend\View\Model\ViewModel(array(
			'image' => $image
		));
	}
}
