<?php

session_start();
session_regenerate_id(true);
if (isset($_SESSION['member_login']) == false) {
  print 'ようこそゲスト様';
  print '<a href = "./member_login.html">会員ログイン</a>';
  print '<br><br>';
} else {
  print 'ようこそ';
  print $_SESSION['member_name'];
  print '様';
  print '<a href = "member_logout.php">ログアウト</a>';
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
    if (isset($_SESSION['cart']) == true) {
      $cart = $_SESSION['cart'];
    }
    $cart[] = $pro_code;
    $_SESSION['cart'] = $cart;

  } catch (Exception $e) {
    print 'ただいま障害により大変ご迷惑をお掛けしております。';
    exit();
  }

?>
カートに追加しました。<br>
<br>
<a href="shop_list.php">商品一覧に戻る</a>

</body>
</html>
