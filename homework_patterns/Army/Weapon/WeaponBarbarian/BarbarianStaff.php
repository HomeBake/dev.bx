<?php

namespace Army\Weapon\WeaponBarbarian;

use Army\Weapon\MagicWeapon;

class BarbarianStaff extends MagicWeapon
{
	public function range() :int
	{
		return parent::range() + 5;
	}
}