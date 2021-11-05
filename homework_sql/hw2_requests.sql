# 1. Вывести список фильмов, в которых снимались одновременно Арнольд Шварценеггер* и Линда Хэмилтон*.
SELECT distinct
	a.ID,
	b.TITLE,
	c.NAME
FROM movie AS a, movie_title AS b, director AS c, (SELECT distinct MOVIE_ID FROM (SELECT distinct MOVIE_ID, ACTOR_ID FROM movie_actor WHERE ACTOR_ID = 1 OR ACTOR_ID = 3) t GROUP BY MOVIE_ID HAVING COUNT(MOVIE_ID) > 1) AS f
WHERE LANGUAGE_ID = 'ru' AND b.MOVIE_ID = a.ID AND c.ID = a.DIRECTOR_ID AND f.MOVIE_ID = a.ID;

#Подзапрос для посика ID фильмов с одновременным участием двух актёров
SELECT distinct
	MOVIE_ID
FROM (SELECT distinct MOVIE_ID, ACTOR_ID FROM movie_actor WHERE ACTOR_ID = 1 OR ACTOR_ID = 3) t
GROUP BY MOVIE_ID
HAVING COUNT(MOVIE_ID) > 1;

#Вывести список названий фильмов на англйском языке с "откатом" на русский, в случае если название на английском не задано.

(SELECT distinct
MOVIE_ID,
TITLE
FROM movie_title
LEFT JOIN movie m on m.ID = movie_title.MOVIE_ID
WHERE LANGUAGE_ID = 'en')
UNION
(select distinct
	 MOVIE_ID,
	 TITLE
 FROM movie_title AS a, (SELECT ID
                         FROM movie m
                         WHERE NOT EXISTS(SELECT 'x' FROM movie_title WHERE MOVIE_ID = m.ID AND LANGUAGE_ID = 'en')) AS b
 WHERE a.MOVIE_ID = b.ID)
ORDER BY MOVIE_ID;

#3. Вывести самый длительный фильм Джеймса Кэмерона*.

SELECT
m.ID,
t.TITLE,
m.LENGTH
FROM movie AS m, movie_title AS t, director AS d
WHERE m.ID= t.MOVIE_ID AND LANGUAGE_ID = 'ru' AND DIRECTOR_ID = d.ID AND d.ID = 1
ORDER BY LENGTH
DESC LIMIT 1;

#4. ** Вывести список фильмов с названием, сокращённым до 10 символов. Если название короче 10 символов – оставляем как есть. Если длиннее – сокращаем до 10 символов и добавляем многоточие.


SELECT
MOVIE_ID,
CAST(CASE WHEN char_length(TITLE)< 10 THEN TITLE ELSE CONCAT(LEFT(TITLE,10),'...') END AS char) AS TITLE
FROM movie_title;

#5. Вывести количество фильмов, в которых снимался каждый актёр.

SELECT
a.NAME,
c.COUNT
FROM actor AS a, (SELECT
	                  ACTOR_ID,
	                  COUNT(ACTOR_ID) AS COUNT
                  FROM movie_actor
                  GROUP BY ACTOR_ID) AS c
WHERE a.ID = c.ACTOR_ID;


#Подзапрос для подчета кол-ва фильмов каждого актёра
SELECT
	ACTOR_ID,
	COUNT(ACTOR_ID) AS COUNT
FROM movie_actor
GROUP BY ACTOR_ID;



#6. Вывести жанры, в которых никогда не снимался Арнольд Шварценеггер*.

SELECT
a.ID,
a.NAME
FROM genre AS a
LEFT JOIN (SELECT distinct
	           g.ID,
	           g.NAME
           FROM genre AS g, movie AS m, movie_genre AS mg
           WHERE EXISTS( SELECT 'x' FROM movie_actor WHERE MOVIE_ID = m.ID AND ACTOR_ID = '1') AND m.ID = mg.MOVIE_ID AND mg.GENRE_ID = g.ID
) AS B
ON a.ID = b.ID
WHERE b.ID is NULL;


#Подзапрос чтоб узнать жанры в которых снимался Арнольд
SELECT distinct
	g.ID,
	g.NAME
FROM genre AS g, movie AS m, movie_genre AS mg
WHERE EXISTS( SELECT 'x' FROM movie_actor WHERE MOVIE_ID = m.ID AND ACTOR_ID = '1') AND m.ID = mg.MOVIE_ID AND mg.GENRE_ID = g.ID;



#7. Вывести список фильмов, у которых больше 3-х жанров.
SELECT
m.ID,
mt.TITLE
FROM movie AS m, movie_title AS mt, (SELECT
	                                     MOVIE_ID
                                     FROM movie_genre
                                     group by MOVIE_ID
                                     having count(MOVIE_ID) > 3) AS x
WHERE LANGUAGE_ID = 'ru' AND m.ID = mt.MOVIE_ID AND m.ID = x.MOVIE_ID;

#Подзапрос, чтобы найти ид фильмов в котором больше трёх жанров
SELECT
MOVIE_ID
FROM movie_genre
group by MOVIE_ID
having count(MOVIE_ID) > 3;


#8. Вывести самый популярный жанр для каждого актёра.
# Хотел из этого запроса удалять повторения по полю actor, но не нашел способа. Был еще варант с MAX по COUNT, но тоже не получилось

SELECT distinct
a.NAME AS actor,
g.NAME AS ganre,
COUNT(g.NAME) AS COUNT
FROM actor AS a, genre AS g, movie_actor AS ma, movie_genre AS mg
WHERE a.ID = ma.ACTOR_ID AND ma.MOVIE_ID = mg.MOVIE_ID AND mg.GENRE_ID = g.ID
group by a.NAME, g.NAME
order by COUNT desc;







 select * FROM actor;
 select * FROM director;
 select * FROM genre;
 select * FROM language;
 select * FROM movie;
 select * FROM movie_actor;
 select * FROM movie_genre;
 select * FROM movie_title;
