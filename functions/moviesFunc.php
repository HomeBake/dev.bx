<?php

require 'movies.php';


function checkInput()
{
	echo "Введите возраст: \n >> ";
	$age = readline();
	while (!is_numeric($age) or ($age < 0) or ($age > 150))
	{
		echo "Нужно ввести положительное, целое число меньше 150! Повторите ввод: \n >> ";
		$age = readline();
	}

	return $age;
}

function compareAge(int $age, Array $movies)
{
	$filtered_mov = [];
	foreach ($movies as $current_mov)
	{
		$iterable_mov = $current_mov;
		if ($age >= $iterable_mov['age_restriction'])
			{
				$filtered_mov[] = $current_mov;
			}
	}
	return $filtered_mov;
}

function displayMovie($movies)
{
	$filtered_mov = compareAge(checkInput(),$movies);
	$counter = 0;
	foreach ($filtered_mov as $current_mov)
	{
		$counter ++;
		echo "$counter. $current_mov[title] ($current_mov[release_year]), $current_mov[age_restriction]+. Rating - $current_mov[rating] \n";
	}
}