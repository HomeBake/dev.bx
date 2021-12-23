<?php

namespace Army\Weapon\WeaponRome;

use \Army\Weapon\MagicWeapon;

class RomeStaff extends MagicWeapon
{
	public function durability(): int
	{
		return parent::durability() + 5;
	}
}