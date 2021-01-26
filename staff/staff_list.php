<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>staff_add_list</title>
</head>
<body>
  <?php

  try {
    $dsn='mysql:dbname=shop;host=localhost;charset=utf8';
    $user='root';
    $password='';
    $dbh=new PDO($dsn,$user,$password);
    $dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

    $sql='SELECT code,name FROM mst_staff WHERE 1';
    $stmt=$dbh->prepare($sql);
    $stmt->execute();

    $dbh = null;

    print 'スタッフ一覧<br><br>';

    print '<form action="staff_branch.php" method="post">';

    while (true) {
      $rec = $stmt->fetch(PDO::FETCH_ASSOC);
      if($rec == false){
        break;
      }
      print '<input type="radio" name="staffcode" value="'.$rec['code'].'">';
      print $rec['name'];
      print '<br>';
    }

    print '<input type="submit" name="disp" value="参照">';
    print '<input type="submit" name="add" value="追加">';
    print '<input type="submit" name="edit" value="修正">';
    print '<input type="submit" name="delete" value="削除">';
    print '</form>';


  } catch (Exception $e) {
    print 'ただいま障害により大変ご迷惑をお掛けしております。';
    exit();
  }

?>
</body>
</html>
