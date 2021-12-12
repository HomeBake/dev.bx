<?php

namespace Army\Weapon;

class RangeWeapon implements Weapon
{

	public function additionalPower(): int
	{
		return 5;
	}

	public function durability(): int
	{
		return 100;
	}

	public function range(): int
	{
		return 10;
	}
	public function damageType(): string
	{
		return 'physical';
	}

}