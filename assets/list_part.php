<?php
//Шаблон для вывода категорий
foreach ($cats as $cat) :
?>
	<li class="liclass">
		<h2><?php echo $cat['title']; ?></h2>
		<p> <?php echo $cat['text'];
			?> </p>
		<p> <?php echo $cat['date'];
			?> </p>
		<div class="row">
			<div class="col-1">
				<a href="answer.php?p_id=<?php echo $cat['id']; ?>"><button type="submit" class="btn btn-primary">Ответить</button></a>
			</div>
			<?php if (!empty($_SESSION['auth']) and $_SESSION['auth']) {

				if ($_SESSION['admin'] == 1) { ?>
					<div class="col-11">
						<form method="POST" action="">
							<input style="display:none" name="delete" type="text" id="id" value="<?php echo $cat['id']; ?>">
							<button type="submit" class="btn btn-danger pad">Удалить отзыв</button>


						</form>
					</div>
		</div>
	<?php }
			}


			if (count($cat['children']) > 0) { ?>


	<?php echo renderTemplate('assets/list_part.php', ['cats' => $cat['children']], ['id' => $cat['id']]); ?>
	</li>
<?php  } else { ?>
	</li> <?php } ?>
<?php endforeach; ?>