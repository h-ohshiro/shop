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

  商品追加<br>
  <br>
  <form action="pro_add_check.php" method="post" enctype="multipart/form-data">
  商品名を入力してください。<br>
  <input type="text" name="name" style="width:200px"><br>
  価格を入力してください。<br>
  <input type="text" name="price" style="width: 100px;"><br>
  画像を選んでください。,<br>
  <input type="file" name="gazou" style="width:400px"><br>
  <br>
  <input type="button" onclick="history.back()" value="戻る">
  <input type="submit" value="ＯＫ">
  </form>

</body>
</html>
