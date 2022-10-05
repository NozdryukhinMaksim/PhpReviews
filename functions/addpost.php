<?php
//Запись в БД

if (isset($_POST['name']) && isset($_POST['text'])) {
    $date = date('Y-m-d H:i:s');
    if (isset($_POST['parent'])) {
        $parent_id = $_POST['parent'];
    } else {
        $parent_id = 0;
    }
    try {
        $query = "INSERT INTO `posts`(`parent_id`, `title`, `text`, `date`) VALUES (:parent_id, :title, :text, :date)";
        $params = [
            ':parent_id' => $parent_id,
            ':title' => $_POST['name'],
            ':text' => $_POST['text'],
            ':date' => $date
        ];
        $stmt = $conn->prepare($query);
        $stmt->execute($params);
    } catch (PDOException $e) {
        echo "Ошибка записи: " . $e->getMessage();
    }
} else {
}
