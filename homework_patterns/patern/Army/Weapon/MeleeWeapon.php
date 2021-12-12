<?php

namespace Army\Weapon;

class MeleeWeapon implements Weapon
{

	public function additionalPower(): int
	{
		return 10;
	}

	public function durability(): int
	{
		return 200;
	}

	public function range(): int
	{
		return 1;
	}

	public function damageType(): string
	{
		return 'physical';
	}
}