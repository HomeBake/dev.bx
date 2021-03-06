<!--#./resources/block/_movie_card.php
--><?php
$hours = floor($movie['DURATION'] / 60);
$minutes = $movie['DURATION'] % 60;
/*var_dump($movie['id'])*/
?>
<div class="content-entity">
	<div class="content-gradient">
		<form action="./movie-info.php?">
			<div class="content-gradient-button">
				<input type="submit" name="movie" id="sat" value="<?=$movie['ID']?>" style="height: 56px;width: 220px;padding-top: 10px;opacity:0%;position: absolute" >
				Подробнее
			</div>
		</form>

	</div>
	<div class="content-entity-image">
		<img src="./resources/images/movie_images/<?=$movie['ID']?>.jpg" alt="Фильм">

	</div>
	<div class="content-entity-text">
		<div class="content-entity-text-title">
			<?= $movie['TITLE'].' ('.$movie['RELEASE_DATE'].')'?>
		</div>
		<div class="content-entity-text-title-english">
			<?= $movie['ORIGINAL_TITLE']?>
		</div>
		<div class="content-entity-text-description">
			<?= $movie['DESCRIPTION']?>
		</div>
		<div class="content-entity-text-info">
			<div class="content-entity-text-info-icon">
				<svg width="19" height="19" viewBox="0 0 19 19" fill="none" xmlns="http://www.w3.org/2000/svg">
					<path d="M9.58334 18.1667C14.3238 18.1667 18.1667 14.3238 18.1667 9.58334C18.1667 4.84289 14.3238 1 9.58334 1C4.84289 1 1 4.84289 1 9.58334C1 14.3238 4.84289 18.1667 9.58334 18.1667Z" stroke="#CCCCCC" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
					<path d="M9.58337 4.90152V9.58334L12.7046 12.7046" stroke="#CCCCCC" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
				</svg>
			</div>
			<div class="content-entity-text-info-time">
				<?= $movie['DURATION']?> мин. /
				<?= "$hours".":".$minutes
				?>
			</div>
			<div class="content-entity-text-info-genre">
				<?= $movie['MOVIE_GENRES'];?>
			</div>
		</div>
	</div>
</div>
