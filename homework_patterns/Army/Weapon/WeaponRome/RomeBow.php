<?php

namespace Army\Weapon\WeaponRome;

use \Army\Weapon\RangeWeapon;

class RomeBow extends RangeWeapon
{
	public function durability(): int
	{
		return parent::durability() + 50;
	}
}