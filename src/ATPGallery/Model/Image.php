<?php

namespace ATPGallery\Model;

class Image extends \ATP\ActiveRecord
{
	protected function createDefinition()
	{
		$this->hasData('Title', 'Url', 'PostDate', 'Image', 'Thumbnail', 'Description')
			->hasFiles('Image', 'Thumbnail')
			->tableNamespace("gallery");
	}
}
Image::init();