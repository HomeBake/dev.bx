<?php

//homework_PHP_HTML/lib/functions/bd-function.php

function movieQuery(mysqli $database, string $where = 'm.ID = m.ID'):mysqli_result
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
    g.GENRE_ID,
    g2.CODE,
	(SELECT GROUP_CONCAT(GENRE_ID)
	    FROM movie_genre as mg
	    WHERE mg.MOVIE_ID = m.ID) as MOVIE_GENRES,
    (SELECT GROUP_CONCAT(ACTOR_ID)
        FROM movie_actor as ma
        WHERE m.ID = ma.MOVIE_ID) as MOVIE_ACTOR
FROM movie as m
join director d on d.ID = m.DIRECTOR_ID
join movie_genre g on m.ID = g.MOVIE_ID
join genre g2 on g2.ID = g.GENRE_ID
WHERE '.$where;
	$result = mysqli_query($database,$query);
	if (!$result)
	{
		$error = mysqli_errno($database). ':' . mysqli_error($database);
		trigger_error($error, E_USER_ERROR);
	}
	return $result;
}