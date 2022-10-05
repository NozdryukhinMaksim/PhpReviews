<?php if (isset($_COOKIE['PHPSESSID'])) {
    session_start();
} ?>
<!DOCTYPE html>
<html lang="ru">

<head>
    <?php require 'functions/bdconfig.php';
    require 'functions/posts.php';
    require 'functions/addpost.php';
    require 'functions/deletepost.php';
    $post = getPost();
    ?>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="assets/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
</head>

<body>
    <?php include 'assets/header.php'; ?>


    <div class="container">
        <div class="row">
            <form method="POST" action="/">
                <div class="form-group">
                    <label for="InputTitle">Ваше имя</label>
                    <input name="name" type="text" class="form-control" id="InputTitle" placeholder="Ваше имя" value="<?php if (!empty($_SESSION['auth']) and $_SESSION['auth']) {
                                                                                                                            echo $_SESSION['name'];
                                                                                                                        } ?>">
                </div>
                <div class="form-group">
                    <label for="InputText">Текст</label>
                    <textarea rows="15" name="text" type="text" class="form-control" id="InputText" placeholder="Текст"></textarea>
                </div>
                <input style="display:none" name="parent" type="text" id="parent" value="<?php echo $post['id']; ?>">
                <button type="submit" class="btn btn-primary">Ответить</button>
            </form>
        </div>



        <div class="row">

        </div>
    </div>


    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
</body>

</html>