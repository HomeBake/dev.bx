<?php

namespace Army\Weapon\WeaponRome;

use \Army\Weapon\MeleeWeapon;

class RomeSword extends MeleeWeapon
{
	public function durability() : int
	{
		return parent::durability() + 100;
	}
}