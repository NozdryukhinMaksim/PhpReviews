<?php
function db_connect()
{
  include 'bdconfig.php';
  return $conn;
}
function getCategories($sort, $direct)
{
  $postss = array();
  $conn = db_connect();
  try {
    $postss = $conn->query("SELECT * FROM `posts` ORDER BY `$sort` $direct")->fetchAll(PDO::FETCH_ASSOC);
  } catch (PDOException $e) {
    print "Ошибка!: " . $e->getMessage();
    die();
  }

  return $postss;
}

function createTree($arr)
{
  $parents_arr = array();
  foreach ($arr as $key => $item) {
    $parents_arr[$item['parent_id']][$item['id']] = $item;
  }
  $treeElem = $parents_arr[0];
  generateElemTree($treeElem, $parents_arr);
  return $treeElem;
}
function generateElemTree(&$treeElem, $parents_arr)
{
  foreach ($treeElem as $key => $item) {
    if (!isset($item['children'])) {
      $treeElem[$key]['children'] = array();
    }
    if (array_key_exists($key, $parents_arr)) {
      $treeElem[$key]['children'] = $parents_arr[$key];
      generateElemTree($treeElem[$key]['children'], $parents_arr);
    }
  }
}
function renderTemplate($path, $arr, $id1)
{

  $output = '';
  if (file_exists($path)) {
    extract($arr);
    ob_start();

    if (empty($id1['id'])) {
?>

      <ul name="ba0" id="ba0">

      <?php
    } else {
      ?>

        <ul name="ba<?php echo $id1['id']; ?>" id="ba<?php echo $id1['id']; ?>">

        <?php
      }
      include $path;
        ?> </ul> <?php
                  $output = ob_get_clean();
                }

                return $output;
              }
              function getPost()
              {
                $label = 'p_id';
                $id = false;
                if (!empty($_GET[$label])) {
                  $id = $_GET[$label];
                }

                $post = array();
                $conn = db_connect();
                try {
                  $post = $conn->query("SELECT * FROM `posts` WHERE `id` = $id")->fetch(PDO::FETCH_ASSOC);
                } catch (PDOException $e) {
                  print "Ошибка!: " . $e->getMessage();
                  die();
                }
                return $post;
              }

              function getPosts($sort, $direct)
              {
                $post = array();
                $conn = db_connect();
                try {
                  $post = $conn->query("SELECT * FROM `posts` ORDER BY `$sort` $direct")->fetchAll(PDO::FETCH_ASSOC);
                } catch (PDOException $e) {
                  print "Ошибка!: " . $e->getMessage();
                  die();
                }
                return $post;
              }
