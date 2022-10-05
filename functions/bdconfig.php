<?php
//конфигурационные данные MySQL
try {
  $conn = new PDO(
    'mysql:
    host=localhost;
    dbname=nozdryukhin',
    'root',
    ''
  );
} catch (PDOException $e) {
  print "Ошибка!: " . $e->getMessage();
  die();
}
?>