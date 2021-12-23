<?php

// homework_PHP_HTML/lib/functions/connect-to-bd.php

function connectToBd(array $config = []):mysqli
{
	$database = mysqli_init();
	$host = $config['host'];
	$username = $config['user'];
	$password = $config['password'];
	$dbName = $config['bdName'];

	if (!$database)
	{
		trigger_error("Ошибка инициализации бд", E_USER_ERROR);
	}

	$connectionResult = mysqli_real_connect(
		$database,
		$host,
		$username,
		$password,
		$dbName
	);

	if (!$connectionResult)
	{
		$error = mysqli_connect_errno($database). ":" . mysqli_connect_error($database);
		trigger_error($error, E_USER_ERROR);
	}

	$result = mysqli_set_charset($database, 'utf8');

	if (!$result)
	{
		trigger_error(mysqli_error($database), E_USER_ERROR);
	}

	return $database;
}