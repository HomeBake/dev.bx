<?php

/** @var array $page_config */
/** @var array $bd_config */
/** @var array $genres */
/** @var array $movies */

declare(strict_types = 1);
require_once "./config/config.php";
require_once "./lib/bd-function.php";
require_once "./lib/template-functions.php";
require_once "./lib/movie-functions.php";
require_once "./lib/connect-to-bd.php";
require_once "./lib/selected-page.php";
require_once "./lib/refactor-query.php";
require_once "./lib/helper.php";

$database = connectToBd($bd_config);
$genres = getAll($database,'genre');
$page = renderTemplate("./resources/pages/main.php", ['movies' => getMovies($database,$genres)]);
/*$moviese = getMovies($database,$genres,$_GET['genre']);*/


renderLayout($page, [
	'config' => $page_config,
	'genres'=> $genres,
	'homeId' => $page_config['menu']['home'],
	'favoriteId' =>$page_config['menu']['favorite'],
	'selectedPage' => selectedPage(),

]);
