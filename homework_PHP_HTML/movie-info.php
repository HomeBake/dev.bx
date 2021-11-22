<?php
/** @var array $page_config */
/** @var array $bd_config */

declare(strict_types = 1);
require_once "./config/config.php";
require_once "./lib/functions/bd-function.php";
require_once "./lib/functions/template-functions.php";
require_once "./lib/functions/movie-functions.php";
require_once "./lib/functions/selected-page.php";
require_once "./lib/functions/connect-to-bd.php";
require_once "./lib/functions/refactor_query.php";


$database = connectToBd($bd_config);
$actors = getAll($database,'actor');
$page = renderTemplate("./resources/pages/info.php", [
	'movies' => getMovieByID($database,$actors,$_GET['movie'])
]);

$database = connectToBd($bd_config);

renderLayout($page, [
	'config' => $page_config,
	'genres'=> getAll($database,'genre'),
	'homeId' => $page_config['menu']['home'],
	'favoriteId' =>$page_config['menu']['favorite'],
	'selectedPage' => selectedPage()
]);