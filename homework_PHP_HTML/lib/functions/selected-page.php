<?php

/* .\lib\movies-info.php */


function selectedPage():string
{
	$result = '';
	if (isset($_GET['genre']))
	{
		$result = $_GET['genre'];
	}
	else
	{
		$result = (basename($_SERVER['SCRIPT_NAME'],'.php'));
	}
	return $result;
}