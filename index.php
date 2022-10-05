<?php if (isset($_COOKIE['PHPSESSID'])) {
  session_start();
} ?>
<?php if (isset($_POST['direct'])) {
  $sort = $_POST['sort'];
  $direct = $_POST['direct'];
} else {
  $sort = "id";
  $direct = "asc";
} ?>
<?php require 'functions/bdconfig.php';
require 'functions/addpost.php';
require 'functions/posts.php';
require 'functions/deletepost.php';

$cats = getCategories($sort, $direct);
if ($cats !== array()) {
  $cats = createTree($cats);
} else {
}
?>

<!DOCTYPE html>
<html lang="ru">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="assets/style.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
</head>


<body>
  <?php include 'assets/header.php'; ?>
  <div class="container">
    <div class="row">
      <h1 class="centertext"> Тестовое задание на вакансию РНР-разработчика </h1>
    </div>
    <div class="row">
      <h2 class="centertext"> Ноздрюхин Максим Александрович </h2>
    </div>
    <form method="POST" action="">
      <div class="form-group">
        <label for="InputName">Ваше имя</label>
        <input name="name" type="text" class="form-control" id="InputName" placeholder="Имя" value="<?php if (!empty($_SESSION['auth']) and $_SESSION['auth']) {
                                                                                                      echo $_SESSION['name'];
                                                                                                    } ?>">
      </div>
      <div class="form-group">
        <label for="InputText">Текст</label>
        <textarea rows="15" name="text" type="text" class="form-control" id="InputText" placeholder="Текст"></textarea>
      </div>
      <br />
      <button type="submit" class="btn btn-primary">Опубликовать</button>
    </form>
    <div class="col-md-12">
      <h2> Отзывы </h2>
      <form method="POST" action="">
        <label for="sort">Сортировать по</label>
        <select name="sort" id="sort">
          <option value="id">ID</option>
          <option value="title">Имени</option>
          <option value="text">Тексту</option>
          <option value="date">Дате</option>
        </select>
        <label for="direct">Порядок</label>
        <select name="direct" id="direct">
          <option value="ASC">По возрастанию</option>
          <option value="DESC">По убыванию</option>
        </select>
        <button type="submit" class="btn btn-secondary">Сортировать</button>
      </form>

      <?php echo renderTemplate('assets/list_asset.php', ['cats' => $cats], 0); ?>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
</body>

</html>