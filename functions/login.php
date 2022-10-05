<?php
//Авторизация
if (isset($_POST['email']) && isset($_POST['password'])) {
    require 'salt.php';
    include 'bdconfig.php';
    $email = $_POST['email'];
    $password = $_POST['password'];

    try {
        $stmt = $conn->prepare("SELECT * FROM `users` WHERE `email` = :email");
        $stmt->execute([
            'email' => $email
        ]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo "Ошибка: " . $e->getMessage();
    }
    if (!empty($user)) {
        $salt = $user['salt'];
        $saltedPassword = md5($password . $salt);
        if ($user['password'] == $saltedPassword) {
            session_destroy();
            session_start();
            $_SESSION['auth'] = true;
            $_SESSION['name'] = $user['name'];
            $_SESSION['login'] = $user['email'];
            $_SESSION['admin'] = $user['admin'];

            if (isset($_POST['remember'])) {
                //Сформировал случайную строку для куки
                $key = generateSalt();
                setcookie('login', $user['email'], time() + 60 * 60 * 24 * 30); //логин
                setcookie('key', $key, time() + 60 * 60 * 24 * 30); //случайная строка
                try {
                    //Запись в БД
                    $query = 'UPDATE `users` SET `cookie` = :key WHERE `email` = :email';
                    $params = [
                        ':email' => $email,
                        ':key' => $key
                    ];
                    $stmt = $conn->prepare($query);
                    $stmt->execute($params);
                    $new_url = 'dashboard.php';
                    header('Location: ' . $new_url);
                } catch (PDOException $e) {
                    echo "Ошибка записи: " . $e->getMessage();
                }
            }
        }
        //Если соленый пароль из базы НЕ совпадает с соленым паролем из формы
        else {
            echo 'не совпадает';
        }
    } else {
        echo 'не совпадает';
    }
}
