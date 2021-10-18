<?php




function checkInput()
{
	echo "Введите возраст: \n >> ";
	$age = readline();
	while (!is_numeric($age) || ($age < 0) || ($age > 150))
	{
		exit; //Для возможности повтора ввода данных нужно убрать эту строку
		echo "Нужно ввести положительное, целое число меньше 150! Повторите ввод: \n >> ";
		$age = readline();
	}

	return (int)$age;
}

function getMoviesByAge(int $age, Array $movies)
{
	$counter = 0;
	foreach ($movies as $current_movie)
	{
		if ($age >= $current_movie['age_restriction'])
			{
				$counter ++;
				echo "$counter. $$current_movie[title] ($$current_movie[release_year]), $$current_movie[age_restriction]+. Rating - $current_movie[rating] \n";
			}
	}
}
