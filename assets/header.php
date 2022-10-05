<?php
//Проверка, авторизован ли пользователь
if (!empty($_SESSION['auth']) and $_SESSION['auth']) { ?>
  <header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <a class="navbar-brand" href="/">Главная</a>
      <div class="collapse navbar-collapse" id="navbarText">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="dashboard.php">Личный кабинет </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="functions/logout.php">Выйти</a>
          </li>

        </ul>

      </div>
    </nav>
  </header>
<?php } else { ?>
  <header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <a class="navbar-brand" href="/">Главная</a>
      <div class="collapse navbar-collapse" id="navbarText">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="register.php">Зарегестрироваться</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="login.php">Авторизоваться</a>
          </li>
        </ul>

      </div>
    </nav>
  </header>
<?php } ?>