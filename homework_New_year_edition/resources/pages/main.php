<?php
/** @var array $movies */
/** @var array $genres */
?><!--

<? if (!empty($movies))
{
	foreach ($movies as $movie)
	{
		echo renderTemplate('./resources/block/_movie_card.php', ['movie' => $movie,]);
	}
}
else
{
	echo renderTemplate('./resources/block/_no_found_movie.php',[]);
}
?>
