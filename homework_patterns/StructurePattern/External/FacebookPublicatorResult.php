<?php

namespace External;

class FacebookPublicatorResult
{
	public string $targetingName;

	/**
	 * @return string
	 */
	public function getTargetingName(): string
	{
		return $this->targetingName;
	}

	/**
	 * @param string $targetingName
	 * @return FacebookPublicatorResult
	 */
	public function setTargetingName(string $targetingName): FacebookPublicatorResult
	{
		$this->targetingName = $targetingName;
		return $this;
	}
}