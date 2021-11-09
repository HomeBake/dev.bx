<?php

/* ./lib/movie-functions.php*/

function getMovies(array $movies,array $genres) :array
{
	$result = [];
	if (isset($_GET['search']))
	{
		$search = $_GET['search'];
		foreach ($movies as $movie)
		{
			$title = mb_strtolower($movie['title']);
			if (strripos($title, $search) !== false)
			{
				$result[] = $movie;
			}
		}
	}
	elseif (isset($_GET['genre']))
	{
		$getGenre = $genres[$_GET['genre']];
		foreach ($movies as $movie)
		{
			if (in_array($getGenre,$movie['genres']))
			{
				$result[] = $movie;
			}
		}
	}
	else
	{
		$result = $movies;
	}
	return $result;
}

function getMovieByID(string $id, array $movies = []): array
{
	$result = [];
	if (!is_integer($id) and is_numeric($id))
	{
		$id = (int)$id;
	}
	else
	{
		return $result;
	}
	foreach ($movies as $movie)
	{
		$result = ($movie['id'] === $id) ? $movie : $result;
	}

	return $result;
}