<?php

namespace State;

class ActiveSubscribeState extends AbstractGameSubscribeState
{

	public function active()
	{
		// TODO: Implement active() method.
	}

	public function cancel()
	{
		$this->gameSubscribe->setCancelData(new \DateTime());
		$this->gameSubscribe->setActivatedUntil(new \DateTime());
	}

	public function changeState(): CancelSubscribeState
	{
		return new CancelSubscribeState($this->gameSubscribe);
	}
}