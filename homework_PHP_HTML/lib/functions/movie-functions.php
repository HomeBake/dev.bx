<?php

/* ./lib/movie-functions.php*/

function getMovies($database,$genres,$genreNAME = null):array
{
	if (is_null($genreNAME))
	{
		$result = movieQuery($database);
	}
	else{
		$genreNAME = '"'.htmlspecialchars($genreNAME).'"';
		$result = movieQuery($database,'g2.CODE ='.$genreNAME);
	}
	$rows = [];
	while ($row = mysqli_fetch_assoc($result))
	{
		$rows[] = $row;
	}


	return refactorMovieGenres($rows,$genres);

}

function getAll(mysqli $database, string $tables): array
{
	$query = 'SELECT * FROM '.$tables;
	$result = mysqli_query($database,$query);

	if (!$result)
	{
		$error = mysqli_errno($database). ':' . mysqli_error($database);
		trigger_error($error, E_USER_ERROR);
	}
	$rows = [];
	while ($row = mysqli_fetch_assoc($result))
	{
		$rows[] = $row;
	}
	if ($tables === 'genre')
	{
		return refactorGenre($rows);
	}
	elseif ($tables === 'actor')
	{
		return refactorActor($rows);
	}
	return [];
}




function getMovieByID(mysqli $database,array $actors, string $movieID): array
{
	$movieID = htmlspecialchars($movieID);
	$where = 'MOVIE_ID = '.$movieID;
	$result =  movieQuery($database,$where);
	$row = mysqli_fetch_assoc($result);
	return refactorMovieActors($row,$actors);
}