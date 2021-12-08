<?php

namespace Army\Weapon\WeaponBarbarian;

use Army\Weapon\RangeWeapon;

class BarbarianBow extends RangeWeapon
{
	public function additionalPower(): int
	{
		return parent::additionalPower() + 5;
	}
}