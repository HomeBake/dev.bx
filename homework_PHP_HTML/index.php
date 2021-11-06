<?php

/** @var array $page_config */
/** @var array $genres */
/** @var array $movies */

declare(strict_types = 1);
require_once "./lib/template-functions.php";
require_once "./config/config.php";
require_once "./lib/movies-info.php";


$page = renderTemplate("./resources/pages/main.php", ['movies' => $movies]);



renderLayout($page, [
	'config' => $page_config,
	'genres'=> $genres
]);

