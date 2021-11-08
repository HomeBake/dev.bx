<?php

/** @var array $page_config */
/** @var array $genres */
/** @var array $movies */

declare(strict_types = 1);
require_once "./config/config.php";
require_once "./lib/template-functions.php";
require_once "./lib/movies-info.php";
require_once "./lib/movie-functions.php";
require_once "./lib/selected-page.php";

$page = renderTemplate("./resources/pages/main.php", ['movies' => getMovies($movies,$genres)]);



renderLayout($page, [
	'config' => $page_config,
	'genres'=> $genres,
	'homeId' => $page_config['menu']['home'],
	'favoriteId' =>$page_config['menu']['favorite'],
	'selectedPage' => selectedPage()
]);

