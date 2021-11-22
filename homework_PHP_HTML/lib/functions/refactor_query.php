<?php

//homework_PHP_HTML/lib/functions/refactor_query.php


function refactorActor(array $actors): array
{
	$keys = [];
	$items = [];
	foreach ($actors as $actor)
	{
		$keys[] = $actor['ID'];
		$items[] = [
			'NAME' => $actor['NAME']
		];
	}
	return array_combine($keys,$items);
}

function refactorGenre(array $genres): array
{

	$keys = [];
	$items = [];
	foreach ($genres as $genre)
	{
		$keys[] = $genre['ID'];
		$items[] = [
			'CODE' => $genre['CODE'],
			'NAME' => $genre['NAME']
		];
	}

	return array_combine($keys,$items);

}

function refactorMovieGenres(array $movies,$genres): array
{
	$result = $movies;
	foreach ($result as &$movie)
	{
		$movieGenresID = explode(',',$movie['MOVIE_GENRES']);
		$genreName = [];
		foreach ($movieGenresID as $movieGenreID)
		{
			$genreName[] = $genres[$movieGenreID]['NAME'];
		}
		$genresName = implode(',', $genreName);
		$movie['MOVIE_GENRES'] = $genresName;
	}

	return $result;
}


function refactorMovieActors(array $movies,$actors): array
{
	$result = $movies;
	$movieActorsID = explode(',',$result['MOVIE_ACTOR']);
	$genreName = [];
	foreach ($movieActorsID as $movieActorID)
	{
		$actorName[] = $actors[$movieActorID]['NAME'];
	}
	$actorsName = implode(',', $actorName);
	$result['MOVIE_ACTOR'] = $actorName;
	return $result;
	}

