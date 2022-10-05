<?php if (isset($_COOKIE['PHPSESSID'])) {
  session_start();
} ?>
<!DOCTYPE html>
<html lang="ru">

<head>
  <?php require 'functions/posts.php';
  require 'functions/login.php';
  ?>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="assets/style.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
</head>

<body>
  <?php include 'assets/header.php'; ?>
  <div class="container">
    <form method="POST" action="">
      <div class="form-group">
        <label for="InputEmail">Email</label>
        <input name="email" type="email" class="form-control" id="InputEmail" aria-describedby="emailHelp" placeholder="Email">
      </div>
      <div class="form-group">
        <label for="InputPassword">Пароль</label>
        <input name="password" type="password" class="form-control" id="InputPassword" placeholder="Пароль">
      </div>
      <div class="form-check">
        <input name="remember" type="checkbox" class="form-check-input" id="remember">
        <label class="form-check-label" for="remember">Запомнить меня (cookie)</label>
      </div>
      <button type="submit" class="btn btn-primary">Авторизоваться</button>
    </form>




  </div>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
</body>

</html>