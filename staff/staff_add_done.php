<?php

// session_start();
// session_regenerate_id(true);
// if (isset($_SESSION['login']) == false) {
//   print 'ログインされていません。';
//   print '<a href = "./staff_login.html">ログイン画面へ</a>';
//   exit();
// } else {
//   print $_SESSION['staff_name'];
//   print 'さんログイン中です。';
//   print '<br><br>';
// }

?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>staff_add_done</title>
</head>
<body>
  <?php

  try {
    // require_once('../common/common.php');

    // $post = sanitize($_POST);

    $staff_name = $_POST['name'];
    $staff_pass = $_POST['pass'];

    $dsn ='mysql:dbname=shop;host=localhost;charset=utf8';
    $user = 'root';
    $password = '';
    $dbh = new PDO($dsn,$user,$password);
    $dbh -> setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

    $sql = 'INSERT INTO mst_staff(name,password) VALUES (?,?)';
    $stmt = $dbh->prepare($sql);
    $data[] = $staff_name;
    $data[] = $staff_pass;
    $stmt->execute($data);

    $dbh = null;

    print $staff_name;
    print 'さんを追加しました。<br>';

  } catch (Exception $e) {
    print 'ただいま障害により大変ご迷惑をお掛けしております。';

    exit();
  }

  ?>

<a href="staff_list.php">戻る</a>

</body>
</html>
