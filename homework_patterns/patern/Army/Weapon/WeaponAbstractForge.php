<?php

namespace Army\Weapon;

abstract class WeaponAbstractForge
{
	abstract function createMeleeWeapon(): Weapon;
	abstract function createMagicWeapon(): Weapon;
	abstract function createRangeWeapon(): Weapon;
}