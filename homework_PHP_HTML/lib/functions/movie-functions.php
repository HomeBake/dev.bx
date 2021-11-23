<?php

/* ./lib/movie-functions.php*/

function getMovies($database,array $array):array
{
	$select = 'g.GENRE_ID,g2.CODE,';
	$join = 'join movie_genre g on m.ID = g.MOVIE_ID join genre g2 on g2.ID = g.GENRE_ID ';
	if (!is_null($_GET['search']))
	{
		$Title = defence($database, "%".$_GET['search']."%");
		$result =  movieQuery($database,$select,$join.'WHERE m.TITLE LIKE '.$Title.' GROUP BY m.TITLE');
		$rows = [];
		while ($row = mysqli_fetch_assoc($result))
		{
			$rows[] = $row;
		}
		return refactorMovieGenres($rows,$array);
	}
	elseif (!is_null($_GET['genre']))
	{
		$genreNAME = defence($database, $_GET['genre']);
		$result =  movieQuery($database,$select,$join.'WHERE g2.CODE ='.$genreNAME);
		$rows = [];
		while ($row = mysqli_fetch_assoc($result))
		{
			$rows[] = $row;
		}
		return refactorMovieGenres($rows,$array);
	}
	elseif (!is_null($_GET['movie']))
	{
		$movieID = defence($database, $_GET['movie'], true);
		$result =  movieQuery($database,'','WHERE m.ID = '.$movieID);
		$row = mysqli_fetch_assoc($result);
		$row = isNull($row);
		return refactorMovieActors($row,$array);

	}
	else{
		$result = movieQuery($database);
		$rows = [];
		while ($row = mysqli_fetch_assoc($result))
		{
			$rows[] = $row;
		}
		return refactorMovieGenres($rows,$array);
	}

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



