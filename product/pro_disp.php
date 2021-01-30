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
  <?php

  try {

    $pro_code = $_GET['procode'];

    $dsn='mysql:dbname=shop;host=localhost;charset=utf8';
    $user='root';
    $password='';
    $dbh=new PDO($dsn,$user,$password);
    $dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

    $sql='SELECT name,price,gazou FROM mst_product WHERE code=?';
    $stmt=$dbh->prepare($sql);
    $data[] = $pro_code;
    $stmt->execute($data);

    $rec=$stmt->fetch(PDO::FETCH_ASSOC);
    $pro_name = $rec['name'];
    $pro_price = $rec['price'];
    $pro_gazou_name = $rec['gazou'];

    $dbh = null;

    if ($pro_gazou_name == '') {
      $disp_gazou = "";
    } else {
      $disp_gazou = '<img src="./gazou/'.$pro_gazou_name.'">';
    }

  } catch (Exception $e) {
    print 'ただいま障害により大変ご迷惑をお掛けしております。';
    exit();
  }

?>
商品情報参照<br>
<br>
商品コード<br>
<?php print $pro_code;?>
<br>
商品名<br>
<?php print $pro_name;?>
<br>
価格<br>
<?php print $pro_price.'円';?>
<br>
商品画像<br>
<?php print $disp_gazou; ?>
<br>
<br>
<form>
<input type="button" onclick="history.back()" value="戻る">
</form>

</body>
</html>
