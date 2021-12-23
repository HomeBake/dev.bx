<?php

namespace State;

interface GameSubscribeState
{
	public function active();
	public function cancel();

	public function changeState();
}