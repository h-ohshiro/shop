<?php

session_start();
session_regenerate_id(true);
if (isset($_SESSION['login']) == false) {
  print 'ログインされていません。';
  print '<a href = "./staff_login.html">ログイン画面へ</a>';
  exit();
} else {
  print $_SESSION['staff_name'];
  print 'さんログイン中です。';
  print '<br><br>';
}

?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ろくまる農園</title>
</head>
<body>

商品が選択されていません。<br>
<a href="pro_list.php">戻る</a>

</body>
</html>
