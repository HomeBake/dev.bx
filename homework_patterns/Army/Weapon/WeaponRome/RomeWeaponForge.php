<?php

namespace Army\Weapon\WeaponRome;

use Army\Weapon\Weapon;
use Army\Weapon\WeaponAbstractForge;

class RomeWeaponForge extends WeaponAbstractForge
{
	function createMeleeWeapon(): Weapon
	{
		return new RomeSword();
	}

	function createMagicWeapon(): Weapon
	{
		return new RomeStaff();
	}

	function createRangeWeapon(): Weapon
	{
		return new RomeRecursiveBow();
	}
}