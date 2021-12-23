<?php

namespace Strategy;

use Event\EventBus;

class PurchaseGameSubscribeContext
{
	public static function purchaseGame(PurchaseGameSubscribeStrategy $gameSubscribe): \Entity\GameSubscribe
	{
		$gameSubscribe = $gameSubscribe->purchaseGame();

		EventBus::getInstance()->publish("onGameSubscribePurchase", $gameSubscribe);
		EventBus::getInstance()->publish("log", $gameSubscribe);

		return $gameSubscribe;
	}
}