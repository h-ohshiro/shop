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

  $onamae=$_POST['onamae'];
  $email=$_POST['email'];
  $postal1=$_POST['postal1'];
  $postal2=$_POST['postal2'];
  $address=$_POST['address'];
  $tel=$_POST['tel'];
  $chumon=$_POST['chumon'];
  $pass=$_POST['pass'];
  $pass2=$_POST['pass2'];
  $danjo=$_POST['danjo'];
  $birth=$_POST['birth'];

  $okflg=true;
  if ($onamae == '' ) {
    print 'お名前が入力されていません。<br><br>';
    $okflg=false;
  } else {
    print 'お名前：';
    print $onamae.'<br>';
  }
  if (preg_match('/\A[\w\-\.]+\@[\w\-\.]+\.([a-z]+)\z/',$email)==0) {
    print 'メールアドレスを正確に入力してください。<br><br>';
    $okflg=false;
  }else {
    print 'メールアドレス：';
    print $email.'<br>';}
  if (preg_match('/\A[0-9]+\z/',$postal1)==0) {
    print '郵便番号は半角数字で入力してください。<br><br>';
    $okflg=false;
  }else {
    print '郵便番号：';
    print $postal1.'-'.$postal2.'<br>';}
  if (preg_match('/\A[0-9]+\z/',$postal2)==0) {
    print '郵便番号が正確に入力されていません。<br><br>';
    $okflg=false;
  }
  if ($address == '' ) {
    print '住所が入力されていません。<br><br>';
    $okflg=false;
  }else {
    print '住所：';
    print $address.'<br>';}
  if (preg_match('/\A\d{2,5}-?\d{2,5}-?\d{4,5}\z/',$tel)==0) {
    print '電話番号を正確に入力してください。<br><br>';
    $okflg=false;
  }else {
    print '電話番号：';
    print $tel.'<br>';}

  if ($chumon=='chumontouroku') {
    if($pass==''){
      print 'パスワードが入力されていません。<br><br>';
      $okflg=false;
    }
    if ($pass!=$pass2) {
      print 'パスワードが一致しません。';
      $okflg=false;
    }
    print '性別<br>';
    if ($danjo=='dan') {
      print '男性<br>';
    }
    if ($danjo=='jo') {
      print '女性<br><br>';
    }
    print '生まれ年<br>';
    print $birth.'年代<br><br>';
  }

          if ($okflg == true) {
            print '<form action="shop_form_done.php" method="post">';
            print '<input type="hidden" name="onamae" value="'.$onamae.'">';
            print '<input type="hidden" name="email" value="'.$email.'">';
            print '<input type="hidden" name="postal1" value="'.$postal1.'">';
            print '<input type="hidden" name="postal2" value="'.$postal2.'">';
            print '<input type="hidden" name="address" value="'.$address.'">';
            print '<input type="hidden" name="tel" value="'.$tel.'">';
            print '<input type="hidden" name="chumon" value="'.$chumon.'">';
            print '<input type="hidden" name="danjo" value="'.$danjo.'">';
            print '<input type="hidden" name="birth" value="'.$birth.'">';
            print '<input type="hidden" name="pass" value="'.$pass.'">';
            print '<input type="button" onclick="history.back()" value="戻る">';
            print '<input type="submit" value="ＯＫ">';
            print '</form>';
          } else {
            print '<form>';
            print '<input type="button" onclick="history.back()" value="戻る">';
            print '</form>';
          }
          ?>
</body>
</html>
