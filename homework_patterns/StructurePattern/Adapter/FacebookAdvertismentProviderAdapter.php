<?php

namespace Adapter;

use Entity\Advertisement;
use Entity\AdvertisementResponse;
use External\FacebookAdvertisement;
use External\FacebookPublicator;
use Service\AdvertisementProviderInterface;

class FacebookAdvertismentProviderAdapter implements AdvertisementProviderInterface
{

	public function publicate(Advertisement $advertsement): AdvertisementResponse
	{
		$FacebookAdvertisement = new FacebookAdvertisement();

		if (!$advertsement->getTitle())
		{
			$advertsement->setTitle("default");
		}
		$FacebookAdvertisement
			->setTitle($advertsement->getTitle())
			->setMessageBody($advertsement->getBody());

		$result = (new FacebookPublicator())->publicate($FacebookAdvertisement);

		return (new AdvertisementResponse())->setTargeting($result->getTargetingName());
	}
}