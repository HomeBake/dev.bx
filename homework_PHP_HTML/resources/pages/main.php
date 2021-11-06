<?php
/** @var array $movies */
$count = 0;
$count2 = 0?>

<?if ($_GET['search']!=''){
	foreach ($movies as $movie)
	{

		if (strpos($movie['title'],$_GET['search']) !== false){
			$count2 +=1;
			?><div class="content-entity">
			<?echo renderTemplate('./resources/block/_movie_card.php', ['movie' => $movie])?>
			</div> <?
		}
	}
	if ($count2 == 0){
		?><div class="content-entity">
		<?echo renderTemplate('./resources/block/_no_found_movie.php')?>
		</div> <?
	}
	$count = 1
;}
?>
<? foreach ($movies as $movie) {
	if (is_null($_GET['genre']) and $count == 0)
	{
		?><div class="content-entity">
		<?echo renderTemplate('./resources/block/_movie_card.php', ['movie' => $movie])?>
		</div> <?
	}
	else{
		foreach ($movie['genres'] as $keys => $genre){
			if (($_GET['genre'] == $genre)) {
				?><div class="content-entity">
				<?echo renderTemplate('./resources/block/_movie_card.php', ['movie' => $movie])?>
				</div>
			<?}
		}
	}
}?>


