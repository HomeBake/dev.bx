<?php

namespace State;

class CancelSubscribeState extends AbstractGameSubscribeState
{
	public function active()
	{
		$this->gameSubscribe->setActivationData(new \DateTime());
	}

	public function cancel()
	{

	}

	public function changeState()
	{
		return new $this;
	}
}