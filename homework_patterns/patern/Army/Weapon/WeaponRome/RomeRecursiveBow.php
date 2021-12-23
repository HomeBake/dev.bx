<?php

namespace Army\Weapon\WeaponRome;
use \Army\Weapon\RangeWeapon;

class RomeRecursiveBow extends RangeWeapon
{
	public function additionalPower():int
	{
		return parent::additionalPower() + 3;
	}

	public function durability():int
	{
		return parent::durability() + 25;
	}

	public function range(): int
	{
		return parent::range() + 2;
	}
}