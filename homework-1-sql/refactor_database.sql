CREATE TABLE IF NOT EXISTS movie_title
(
	MOVIE_ID int not null,
	LANGUAGE_ID varchar(2) not null,
	TITLE varchar(50) not null,
	FOREIGN KEY FK_MT_MOVIE (MOVIE_ID)
		REFERENCES movie(ID)
		ON UPDATE RESTRICT
		ON DELETE RESTRICT,
	FOREIGN KEY FK_MT_LANGUAGE (LANGUAGE_ID)
	REFERENCES language (ID)
		ON UPDATE RESTRICT
        ON DELETE RESTRICT

	);


CREATE TABLE IF NOT EXISTS language
(
	ID varchar(2) not null,
	NAME varchar(50) not null,
	PRIMARY KEY (ID)
	);



INSERT INTO language (ID, NAME)
VALUES
	('ru','Русский'),
    ('en', 'English'),
    ('ua', 'Українська');



INSERT INTO movie_title (MOVIE_ID, LANGUAGE_ID, TITLE)
VALUES
	(1, 'en', 'Terminator'),
	(1, 'ua', 'Терміна́тор'),

	(2, 'en', 'Alien'),
	(2, 'ua', 'Чужий'),

	(3, 'en', 'The Thing'),
	(3, 'ua', 'Щось'),

	(4, 'en', 'The shining'),
	(4, 'ua', 'Сяйво'),

	(5, 'en', 'Avatar'),
	(5, 'ua', 'Аватар');



INSERT INTO movie_title (MOVIE_ID, LANGUAGE_ID, TITLE)
SELECT ID, 'ru' , TITLE FROM movie;



ALTER TABLE movie
DROP COLUMN TITLE;

/*select * from language;
select * from movie_title;
select * from movie;*/