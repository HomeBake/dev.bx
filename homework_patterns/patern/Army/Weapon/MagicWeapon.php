<?php

namespace Army\Weapon;

class MagicWeapon implements Weapon
{

	public function additionalPower(): int
	{
		return 100;
	}

	public function durability(): int
	{
		return 10;
	}

	public function range(): int
	{
		return 5;
	}

	public function damageType(): string
	{
		return 'magic';
	}
}