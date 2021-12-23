<?php

namespace Decorator;


class AdvertisementDecorator extends AbstractAdvertisementDecorator
{

	function getAdvertisementBody(): string
	{
		$this->originalAdvertisementBody = $this->advertisement->getBody();
		return $this->originalAdvertisementBody;
	}

	function applyBody(): string
	{
		$this->decoratedAdvertisementBody = "<h1>Заголовок</h1>" . $this->getAdvertisementBody() . "<h2>Футер<h2>";
		return $this->decoratedAdvertisementBody;
	}
}
