<?php
//Вызов первой ветки категорий - родительских категорий
echo renderTemplate('assets/list_part.php', ['cats' => $cats], 0);
