<?php

namespace Army\Builder;

use Army\WarriorTemplate;


class Director
{
	public static function build(WarriorBuilder $warriorBuilder): WarriorTemplate
	{
		return $warriorBuilder
			->createWarriorTemplate()
			->addLeftHandArmor()
			->addLeftHandWeapon()
			->addRightHandWeapon()
			->getWarrior()
		;
	}
}