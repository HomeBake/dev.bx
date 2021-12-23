<?php

//homework_PHP_HTML/lib/functions/bd-function.php

function movieQuery(mysqli $database, string $where = ''):mysqli_result
{
	$query = 'SELECT
	d.NAME as DIRECTOR,
	m.ID,
	m.TITLE,
    m.ORIGINAL_TITLE,
	m.DESCRIPTION,
	m.DURATION,
	m.AGE_RESTRICTION,
	m.RELEASE_DATE,
	m.RATING,
	(SELECT GROUP_CONCAT(GENRE_ID)
	    FROM movie_genre as mg
	    WHERE mg.MOVIE_ID = m.ID) as MOVIE_GENRES,
    (SELECT GROUP_CONCAT(ACTOR_ID)
        FROM movie_actor as ma
        WHERE m.ID = ma.MOVIE_ID) as MOVIE_ACTOR
FROM movie as m
join director d on d.ID = m.DIRECTOR_ID
'.$where;
	$result = mysqli_query($database,$query);
	if (!$result)
	{
		$error = mysqli_errno($database). ':' . mysqli_error($database);
		trigger_error($error, E_USER_ERROR);
	}
	return $result;
}

