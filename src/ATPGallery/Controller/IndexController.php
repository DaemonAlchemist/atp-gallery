<?php

namespace ATPGallery\Controller;

class IndexController extends \ATPCore\Controller\AbstractController
{
	public function indexAction()
	{
		$category = new \ATPGallery\Model\Category();
		$categories = $category->loadMultiple(array());
		$thumbSize = $this->config("gallery.thumbnailSize");
	
		return new \Zend\View\Model\ViewModel(array(
			'categories' => $categories,
			'thumbnailSize' => $thumbSize,
		));
	}

	public function listAction()
	{
		$category = new \ATPGallery\Model\Category();
		$category->loadById($this->params()->fromQuery("id"));
		$images = $category->getAtpgalleryImagesByCategory();;
		$thumbSize = $this->config("gallery.thumbnailSize");
	
		return new \Zend\View\Model\ViewModel(array(
			'category' => $category,
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
