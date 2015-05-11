<?php

namespace ATPGallery\Model;

require_once("Image.php");

class Category extends \ATP\ActiveRecord
{
	public function displayName()
	{
		return $this->name;
	}
}
Category::init();