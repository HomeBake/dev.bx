<?php
?>

<!--#./resources/block/_movie_card.php
--><?php
$hours = floor($movie['duration'] / 60);
$minutes = $movie['duration'] % 60;
/*var_dump($movie['id'])*/
?>
<div class="content-entity">
	<div class="no-found" style="margin: 300px auto auto 130px">
		Не найдено!
	</div>
</div>
