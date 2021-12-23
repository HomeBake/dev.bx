<?php

namespace Army\Weapon\WeaponBarbarian;

use Army\Weapon\Weapon;
use Army\Weapon\WeaponAbstractForge;

class BarbarianWeaponForge extends WeaponAbstractForge
{
	function createMeleeWeapon(): Weapon
	{
		return new BarbarianSword();
	}

	function createMagicWeapon(): Weapon
	{
		return new BarbarianStaff();
	}

	function createRangeWeapon(): Weapon
	{
		return new BarbarianBow();
	}
}