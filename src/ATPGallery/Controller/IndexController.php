<?php

namespace ATPGallery\Controller;

class IndexController extends \ATPCore\Controller\AbstractController
{
    protected function init()
    {
        $this->cacheFor(24*60*60);
    }

	public function indexAction()
	{
        $this->init();

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
        $this->init();

		$category = new \ATPGallery\Model\Category();
		$category->loadByUrl($this->params("id"));
		$images = $category->getAtpgalleryImagesByCategory(['orderBy' => "post_date DESC"]);
		$thumbSize = $this->config("gallery.thumbnailSize");
	
		return new \Zend\View\Model\ViewModel(array(
			'category' => $category,
			'images' => $images,
			'thumbnailSize' => $thumbSize,
		));
	}
	
	public function viewAction()
	{
        $this->init();

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
