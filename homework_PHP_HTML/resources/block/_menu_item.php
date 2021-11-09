<?php
/** @var string $genre */
/** @var string $selectedPage */
/** @var string $key */
?>

<!-- .\resources\block\_menu_item.php-->

<li class = "menu-item <?=
($selectedPage === $key ? 'menu-item--active' : '')?>">
	<a href="./index.php?genre=<?= $key?>"><?= $genre?></a>
</li>