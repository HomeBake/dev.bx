<?php


function formatMessage(string $text,$fillSymbol = "#", int $outputLength = 40): string
{
	$result = str_repeat($fillSymbol, $outputLength) . "\n";
	$result .= "Lorem" . "\n";
	$result .= str_repeat($fillSymbol, $outputLength);

	return $result
}

$text = "Lorem ipsum";
echo formatMessage($text);