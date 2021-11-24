<?php

/*homework_PHP_HTML/lib/functions/helper.php*/

function isNull($array,array $Null = ['']) :array
{
	if (is_null($array))
	{
		return $Null;
	}
	else
	{
		return $array;
	}
}
