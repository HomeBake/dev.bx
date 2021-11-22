<?php

function renderTemplate(string $path, array $templateData = []): string
{
	if (!file_exists($path))
	{
		return "2";
	}

	extract($templateData, EXTR_OVERWRITE);

	ob_start();

	include $path;

	return ob_get_clean();
}

function renderLayout(string $content, array $templateDate = []):void
{
	$data = array_merge($templateDate, [
		'content' => $content,

	]);
	$result = renderTemplate("./resources/pages/layout.php", $data);
	echo $result;
}