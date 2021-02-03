<?php
session_start();
session_regenerate_id(true);
?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
<?php

try {
  $onamae=$_POST['onamae'];
  $email=$_POST['email'];
  $postal1=$_POST['postal1'];
  $postal2=$_POST['postal2'];
  $address=$_POST['address'];
  $tel=$_POST['tel'];

  print $onamae.'様<br>';
  print 'ご注文ありがとうございました。<br>';
  print $email.'にメールを送りましたのでご確認ください。<br>';
  print '商品は以下の住所に発送させていただきます。<br>';
  print $postal1.'-'.$postal2.'<br>';
  print $address.'<br>';
  print $tel.'<br>';

$honbun = "";
$honbun = $onamae."様 \n\n ご注文ありがとうございました。\n\n";
$honbun = "ご注文商品\n";
$honbun = "------------------\n";

$cart = $_SESSION['cart'];
$kazu = $_SESSION['kazu'];
$max = count($cart);

$dsn='mysql:dbname=shop;host=localhost;charset=utf8';
$user='root';
$password='';
$dbh=new PDO($dsn,$user,$password);
$dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

for ($i=0; $i < $max ; $i++) {
  $sql = 'SELECT name,price FROM mst_product WHERE code=?';
  $stmt = $dbh->prepare($sql);
  $data[0] = $cart[$i];
  $stmt->execute($data);

  $rec = $stmt->fetch(PDO::FETCH_ASSOC);

  $name=$rec['name'];
  $price=$rec['price'];
  $kakaku[]=$price;
  $suryo=$kazu[$i];
  $shokei=$price*$suryo;

  $honbun.=$name.' ';
  $honbun.=$price.'円×';
  $honbun.=$suryo.'個＝';
  $honbun.=$shokei."円\n";
}
$sql='LOCK TABLE dat_sales WRITE,dat_sales_product WRIRE';

$sql='INSERT INTO dat_sales(code_member,name,email,postal1,postal2,address,tel) VALUES(?,?,?,?,?,?,?)';
$stmt=$dbh->prepare($sql);
$data=array();
$data[]=0;
$data[]=$onamae;
$data[]=$email;
$data[]=$postal1;
$data[]=$postal2;
$data[]=$address;
$data[]=$tel;
$stmt->execute($data);

$sql='SELECT LAST_INSERT_ID()';
$stmt=$dbh->prepare($sql);
$stmt->execute();
$rec=$stmt->fetch(PDO::FETCH_ASSOC);
$lastcode=$rec['LAST_INSERT_ID()'];

for ($i=0; $i < $max; $i++) {
  $sql='INSERT INTO dat_sales_product(code_sales,code_product,price,quantity) VALUES(?,?,?,?)';
  $stmt=$dbh->prepare($sql);
  $data=array();
  $data[]=$lastcode;
  $data[]=$cart[$i];
  $data[]=$kakaku[$i];
  $data[]=$kazu[$i];
  $stmt->execute($data);
}
$sql='UNLOCK TABLES';
$stmt=$dbh->prepare($sql);
$stmt->execute();

$dbh=null;

$honbun.="送料は無料です。\n";
$honbun.="-----------------\n";
$honbun.="\n";
$honbun.="代金は以下の口座にお振込みください\n";
$honbun.="ろくまる銀行　やさい支店　普通口座　１２３４５６７\n";
$honbun.="入金確認が取れ次第、梱包、発送させていただきます。\n";
$honbun.="\n";
$honbun.="□□□□□□□□□□□□□□□□□□□□\n";
$honbun.=" ～安心野菜のろくまる農園～\n";
$honbun.="\n";
$honbun.="〇〇県六村123-4\n";
$honbun.="電話　090-2929-2929\n";
$honbun.="メール　info@rokumarunouen.no.jp\n";
$honbun.="□□□□□□□□□□□□□□□□□□□□\n";

// print nl2br($honbun);

$title='ご注文ありがとうございます。';
$header='From: info@rokumarunouen.co.jp';
$honbun=html_entity_decode($honbun,ENT_QUOTES,'UTF-8');
mb_language('japanese');
mb_internal_encoding('UTF-8');
mb_send_mail($email,$title,$honbun,$header);

$title='お客様からご注文がありました。';
$header='From: $email';
$honbun=html_entity_decode($honbun,ENT_QUOTES,'UTF-8');
mb_language('japanese');
mb_internal_encoding('UTF-8');
mb_send_mail('info@rokumarunouen.co.jp',$title,$honbun,$header);

  } catch (Exception $e) {
    print 'ただいま障害が発生しております。';
    exit();
  }
?>
<br>
<?php
if(isset($_COOKIE[session_name()])==true)
{
	setcookie(session_name(),'',time()-42000,'/');
}
session_destroy();
?>
<a href="shop_list.php">商品画面へ</a>

</body>
</html>