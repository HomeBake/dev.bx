<?php

function getMovieByID(string $id, array $movies = []):array
{
	$result = [];
	foreach ($movies as $movie)
	{
		$result = ($movie['id'] == $id) ? $movie : $result;
	}

	return $result;
}