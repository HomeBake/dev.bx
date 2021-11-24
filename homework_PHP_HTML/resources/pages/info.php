<?php
/** @var array $movies */
$m = $movies;
?>



<div class="info-content">
	<div class="info-content-name">
		<div class="info-content-name-title">
			<?= $movies['TITLE']." (".$movies['RELEASE_DATE'].")"?>
		</div>
		<div class="info-content-name-icon">
			<svg width="43" height="37" viewBox="0 0 43 37" fill="none" xmlns="http://www.w3.org/2000/svg">
				<path d="M21.5115 34.625L21.4999 34.625L21.4883 34.625C21.4719 34.6251 21.4556 34.622 21.4404 34.6158L20.6841 36.4673L21.4403 34.6158C21.4257 34.6098 21.4123 34.6011 21.4009 34.5901C21.4005 34.5897 21.4 34.5892 21.3996 34.5888L4.90146 18.0694C4.90047 18.0684 4.89948 18.0674 4.8985 18.0664C3.19983 16.3484 2.24707 14.0299 2.24707 11.6138C2.24707 9.19846 3.1992 6.88062 4.89681 5.16279C6.60875 3.45815 8.92634 2.50101 11.3424 2.50101C13.7604 2.50101 16.0797 3.45966 17.792 5.16681C17.7923 5.16703 17.7925 5.16725 17.7927 5.16747L20.0857 7.46047L21.4999 8.87468L22.9141 7.46047L25.2071 5.16747C25.2075 5.1671 25.2079 5.16673 25.2082 5.16635C26.9205 3.45949 29.2397 2.50101 31.6574 2.50101C34.0736 2.50101 36.3912 3.45821 38.1032 5.16294C39.8007 6.88075 40.7528 9.19852 40.7528 11.6138C40.7528 14.0298 39.8001 16.3483 38.1015 18.0663C38.1004 18.0673 38.0994 18.0684 38.0984 18.0694L21.6002 34.5888C21.5998 34.5892 21.5993 34.5897 21.5989 34.5901C21.5875 34.6011 21.5741 34.6098 21.5595 34.6158L21.5595 34.6158C21.5442 34.622 21.5279 34.6251 21.5115 34.625Z"  stroke-width="4"/>
			</svg>
		</div>
	</div>
	<div class="info-content-bottom-name">
		<div class="info-content-bottom-name-original"></div>
		<?= $movies['ORIGINAL_TITLE']?>
		<div class="info-content-bottom-name-age">
		<?= $movies['AGE_RESTRICTION'].'+'?></div>
	</div>
	<div class="info-content-main">
		<div class="info-content-main-left">
			<div class="info-content-main-image">
				<img src="./resources/images/movie_images/<?=$movies['ID']?>.jpg">
			</div>
		</div>
		<div class="info-content-main-right">
			<div class="info-content-main-description">
				<div class="info-content-main-description-rating-line">
					<?for ($i = 1; $i <= 10; $i++ ) {
						if ($i <= intval(round($movies['RATING'],PHP_ROUND_HALF_DOWN))){
							?><div class="rating-rectangle-active"></div><?
						} else {
							?><div class="rating-rectangle-inactive"></div><?
						}
					}?>

				</div>
				<div class="info-content-main-description-number">
					<?=$movies['RATING']?>
				</div>
				</div>
			<div class="info-content-main-description-about">
				О фильме
			</div>
			<div class="info-content-main-description-table">
				<div class="info-content-main-description-table-element">
					<div class="info-content-main-description-table-element-left">
						Год производства:
					</div>
					<div class="info-content-main-description-element-right">
						<?= $movies['RELEASE_DATE']?>
					</div>
				</div>
				<div class="info-content-main-description-table-element">
					<div class="info-content-main-description-table-element-left">
						Режиссер:
					</div>
					<div class="info-content-main-description-element-right">
						<?= $movies['DIRECTOR']?>
					</div>
				</div>
				<div class="info-content-main-description-table-element">
					<div class="info-content-main-description-table-element-left">
						В главных ролях:
					</div>
					<div class="info-content-main-description-element-right">
						<?= $movies['MOVIE_ACTOR']?>
					</div>
				</div>
			</div>
			<div class="info-content-main-description-lable">
				Описание
			</div>
			<div class="info-content-main-description-text">
				<?= $movies['DESCRIPTION']?>
			</div></div>

	</div>



</div>