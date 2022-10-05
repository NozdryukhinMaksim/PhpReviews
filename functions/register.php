<?php
include 'bdconfig.php';
require 'salt.php';

if (isset($_POST['admin'])) {
    $admin = 1;
} else {
    $admin = 0;
}
if (isset($_POST['email']) && isset($_POST['name']) && isset($_POST['pass']) && isset($_POST['passrepeat'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['pass'];
    $password_confirm = $_POST['passrepeat'];
    //Если пароль и его подтверждение совпадают
    if ($password == $password_confirm) {
        try {
            $stmt = $conn->prepare("SELECT * FROM `users` WHERE `email` = :email");
            $stmt->execute([
                'email' => $email
            ]);
            $isLoginFree = $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Ошибка: " . $e->getMessage();
        }
        if (empty($isLoginFree)) {
            if (isset($_POST['admin'])) {
                $admin = 1;
            } else {
                $admin = 0;
            }
            $salt = generateSalt(); //генерируем соль
            $saltedPassword = md5($password . $salt); //соленый пароль
            try {
                //Запись в БД
                $query = "INSERT INTO `users`(`name`, `email`, `password`, `salt`, `admin`) VALUES (:name, :email, :password, :salt, :admin)";
                $params = [
                    ':name' => $name,
                    ':email' => $email,
                    ':password' => $saltedPassword,
                    ':salt' => $salt,
                    ':admin' => $admin
                ];
                $stmt = $conn->prepare($query);
                $stmt->execute($params);
            } catch (PDOException $e) {
                echo "Ошибка записи: " . $e->getMessage();
            }
        } else {
            echo 'Такой логин уже занят!';
        }
    } else {
        echo 'Пароли не совпадают!';
    }
} else {
}
