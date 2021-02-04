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
  <title>Document</title>
</head>
<body>
<?php
require_once('../common/common.php');
?>

ダウンロードしたい注文日を選択してください。<br>
<form action="order_download_done.php" method="post">
<?php pulldown_year() ?>
年
<?php pulldown_month() ?>
月
<?php pulldown_day() ?>
日
  <!-- <select name="year" >
  <option value="2019">2019</option>
  <option value="2020">2020</option>
  <option value="2021">2021</option>
  </select>
  年
  <form action="order_download_done.php" method="post">
  <select name="month" >
  <option value="1">1</option>
  <option value="2">2</option>
  <option value="3">3</option>
  <option value="4">4</option>
  <option value="5">5</option>
  <option value="6">6</option>
  <option value="7">7</option>
  <option value="8">8</option>
  <option value="9">9</option>
  <option value="10">10</option>
  <option value="11">11</option>
  <option value="12">12</option>
  </select>
  月
  <form action="order_download_done.php" method="post">
  <select name="day" >
  <option value="1">1</option>
  <option value="2">2</option>
  <option value="3">3</option>
  <option value="4">4</option>
  <option value="5">5</option>
  <option value="6">6</option>
  <option value="7">7</option>
  <option value="8">8</option>
  <option value="9">9</option>
  <option value="10">10</option>
  <option value="11">11</option>
  <option value="12">12</option>
  <option value="13">13</option>
  <option value="14">14</option>
  <option value="15">15</option>
  <option value="16">16</option>
  <option value="17">17</option>
  <option value="18">18</option>
  <option value="19">19</option>
  <option value="20">20</option>
  <option value="21">21</option>
  <option value="22">22</option>
  <option value="23">23</option>
  <option value="24">24</option>
  <option value="25">25</option>
  <option value="26">26</option>
  <option value="27">27</option>
  <option value="28">28</option>
  <option value="29">29</option>
  <option value="30">30</option>
  <option value="31">31</option>
   </select>
  日<br>
  <br> -->
  <br>
  <input type="submit" value="ダウンロードへ">
</form>

</body>
</html>
