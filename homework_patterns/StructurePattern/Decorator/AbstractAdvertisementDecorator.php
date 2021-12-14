<?php

namespace Decorator;

use Entity\Advertisement;

abstract class AbstractAdvertisementDecorator
{
	protected Advertisement $advertisement;
	protected string $originalAdvertisementBody;
	protected string $decoratedAdvertisementBody;


	public function __construct(Advertisement $advertisement)
	{
		$this->advertisement = $advertisement;
	}

	abstract function getAdvertisementBody();


	abstract function applyBody();
}