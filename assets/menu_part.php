<?php
//Шаблон для вывода категорий
foreach ($cats as $cat) :
?>
	<li class="liclass"><?php echo $cat['title']; ?>
		<?php if (count($cat['children']) > 0) { ?>

	</li>
	<?php echo renderTemplate('assets/list_part.php', ['cats' => $cat['children']], ['id' => $cat['id']]); ?>
<?php  } else { ?>
	</li> <?php } ?>
<?php endforeach; ?>