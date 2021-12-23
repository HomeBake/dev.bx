<?php

namespace Army\Weapon;

interface Weapon
{
	public function additionalPower();

	public function durability();

	public function range();

	public function damageType();
}