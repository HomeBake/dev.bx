<?php

namespace Army\Weapon\WeaponBarbarian;

use \Army\Weapon\MeleeWeapon;

class BarbarianSword extends MeleeWeapon
{
	public function additionalPower(): int
	{
		return parent::additionalPower() + 5;
	}

	public function durability(): int
	{
		return parent::durability() - 50; //Тут можно добавить логику, чтобы проверять на неотрицательность?
	}

}