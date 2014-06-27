<?php

namespace ATPGallery\Controller;

class IndexController extends \ATPCore\Controller\AbstractController
{
	public function listAction()
	{
		$image = new \ATPGallery\Model\Image();
		$images = $image->loadMultiple(null, array(), array(), "post_date DESC");
		$thumbSize = $this->config("gallery.thumbnailSize");
	
		return new \Zend\View\Model\ViewModel(array(
			'images' => $images,
			'thumbnailSize' => $thumbSize,
		));
	}
	
	public function viewAction()
	{
		$url = $this->params('id');
		$image = new \ATPGallery\Model\Image();
		$image->loadByUrl($url);
	
		if(!$image->id)
		{
			$this->getResponse()->setStatusCode(404);
			return;
		}
	
		return new \Zend\View\Model\ViewModel(array(
			'image' => $image
		));
	}
}
