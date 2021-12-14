<?php

namespace State;

class GameSubscribeContext
{
	/**
	 * @var GameSubscribeState
	 */
	private $state;

	/**
	 * @param GameSubscribeState $initialState
	 */
	public function __construct(GameSubscribeState $initialState)
	{
		$this->state = $initialState;
	}

	public function changeState(): GameSubscribeContext
	{
		$this->state = $this->state->changeState();

		return $this;
	}

	/**
	 * @return GameSubscribeState
	 */
	public function getState(): GameSubscribeState
	{
		return $this->state;
	}
}