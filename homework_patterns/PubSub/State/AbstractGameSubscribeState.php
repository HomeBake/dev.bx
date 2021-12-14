<?php

namespace State;

use Entity\GameSubscribe;

abstract class AbstractGameSubscribeState implements GameSubscribeState
{
	protected GameSubscribe $gameSubscribe;

	/**
	 * @param GameSubscribe $gameSubscribe
	 */
	public function __construct(GameSubscribe $gameSubscribe)
	{
		$this->gameSubscribe = $gameSubscribe;
	}

}