<?php
/** @var array $page_config */
/** @var array $genres */
/** @var array $movies */

declare(strict_types = 1);
require_once "./lib/template-functions.php";
require_once "./config/config.php";
require_once "./lib/movies-info.php";
require_once "./lib/get-movie-by-id.php";



$page = renderTemplate("./resources/pages/info.php", [
	'movies' => getMovieByID($_GET['movie'],$movies)
]);

renderLayout($page, [
	'config' => $page_config,
	'genres'=> $genres
]);