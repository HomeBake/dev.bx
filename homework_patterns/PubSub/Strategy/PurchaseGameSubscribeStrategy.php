<?php

namespace Strategy;

use Entity\GameSubscribe;

interface PurchaseGameSubscribeStrategy
{
	public function purchaseGame(): GameSubscribe;

}