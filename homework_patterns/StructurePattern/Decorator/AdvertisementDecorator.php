<?php

namespace Decorator;

class AdvertisementDecorator extends AbstractAdvertisementDecorator
{

	function getAdvertisementBody()
	{
		$this -> originalAdvertisementBody = $this-> advertisement->getBody();
	}

	function changeBody()
	{
		$this -> decoratedAdvertisementBody = "<h1>Заголовок</h1>".$this->originalAdvertisementBody."<h2>Футер<h2>";
	}

	function applyBody(): string
	{
		return $this ->decoratedAdvertisementBody;
	}
}