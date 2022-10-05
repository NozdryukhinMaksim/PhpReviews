<?php if (isset($_POST['delete'])) {
    try {
        $query = "DELETE FROM `posts` WHERE id = :id OR `parent_id` = :id";
        $params = [
            ':id' => $_POST['delete']
        ];
        $stmt = $conn->prepare($query);
        $stmt->execute($params);
        $new_url = 'dashboard.php';
        header('Location: ' . $new_url);
    } catch (PDOException $e) {
        echo "Ошибка удаления: " . $e->getMessage();
    }
}
