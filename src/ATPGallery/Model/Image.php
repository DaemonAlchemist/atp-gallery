<?php

namespace ATPGallery\Model;

class Image extends \ATP\ActiveRecord
{
	protected function createDefinition()
	{
		$this->setTableNamespace("gallery");
	}
}
Image::init();