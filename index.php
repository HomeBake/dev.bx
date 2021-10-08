<?php

$socket = fsockopen("test.shelenkov.com", 80, $errorCode, $errorString);
if (!$socket)
{
	echo "$errorCode ($errorString)<br />\n";
	die();
}

$result  = "" . "\r\n";
$result .= "" . "\r\n";
$result .= "" . "\r\n";
$result .= "\r\n";

fwrite($socket, $result);
while (!feof($socket))
{
	echo fgets($socket);
}
fclose($socket);









