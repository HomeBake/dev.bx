<?php

namespace Entity;

use DateTime;

class GameSubscribe
{
	public const TYPES = [
		'YEAR' => 0,
		'MONTH'=> 1,
		'SIX_MONTH' => 2
	];

	private int $type;
	private DateTime $activationData;
	private DateTime $activatedUntil;
	private DateTime $cancelData;

	/**
	 * @return int
	 */
	public function getType(): int
	{
		return $this->type;
	}

	/**
	 * @param int $type
	 * @return GameSubscribe
	 */
	public function setType($type): GameSubscribe
	{
		$this->type = $type;
		return $this;
	}

	/**
	 * @return DateTime
	 */
	public function getActivationData(): DateTime
	{
		return $this->activationData;
	}

	/**
	 * @param DateTime $activationData
	 * @return GameSubscribe
	 */
	public function setActivationData(DateTime $activationData): GameSubscribe
	{
		$this->activationData = $activationData;
		return $this;
	}

	/**
	 * @return DateTime
	 */
	public function getActivatedUntil(): DateTime
	{
		return $this->activatedUntil;
	}

	/**
	 * @param DateTime $activatedUntil
	 * @return GameSubscribe
	 */
	public function setActivatedUntil(DateTime $activatedUntil): GameSubscribe
	{
		$this->activatedUntil = $activatedUntil;
		return $this;
	}

	/**
	 * @return DateTime
	 */
	public function getCancelData(): DateTime
	{
		return $this->cancelData;
	}

	/**
	 * @param DateTime $cancelData
	 * @return GameSubscribe
	 */
	public function setCancelData(DateTime $cancelData): GameSubscribe
	{
		$this->cancelData = $cancelData;
		return $this;
	}



}