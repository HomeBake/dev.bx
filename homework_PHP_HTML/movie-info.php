<?php
/** @var array $page_config */
/** @var array $bd_config */

declare(strict_types = 1);
require_once "./config/config.php";
require_once "./lib/bd-function.php";
require_once "./lib/template-functions.php";
require_once "./lib/movie-functions.php";
require_once "./lib/selected-page.php";
require_once "./lib/connect-to-bd.php";
require_once "./lib/refactor-query.php";
require_once "./lib/helper.php";


$database = connectToBd($bd_config);
$actors = getAll($database,'actor');
$movies = getMovies($database, $actors);

if (!array_key_exists(0,$movies))
{
	$page = renderTemplate("./resources/pages/info.php", [
		'movies' => $movies
	]);
}
else
{
	$page = renderTemplate('./resources/block/_no_found_movie.php',[]);
}


$database = connectToBd($bd_config);



renderLayout($page, [
	'config' => $page_config,
	'genres'=> getAll($database,'genre'),
	'homeId' => $page_config['menu']['home'],
	'favoriteId' =>$page_config['menu']['favorite'],
	'selectedPage' => selectedPage()
]);