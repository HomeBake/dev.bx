<?php

namespace External;

class FacebookPublicator
{
	public function publicate(FacebookPublicator $advertisement): FacebookPublicatorResult
	{
		//...

		return (new FacebookPublicatorResult())->setTargetingName("response");
	}
}