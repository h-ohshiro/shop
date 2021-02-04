<?php

function gengo($seireki){
  if(1868 <= $seireki && $seireki <= 1911){
    $gengo = '明治';
  }
  if(1912 <= $seireki && $seireki <= 1925){
    $gengo = '大正';
  }
  if(1926 <= $seireki && $seireki <= 1988){
    $gengo = '昭和';
  }
  if(1989 <= $seireki && $seireki <= 2019){
    $gengo = '平成';
  }
  if(2000 <= $seireki){
    $gengo = '令和';
  }
  return $gengo;
}

function sanitize($before){
  foreach ($before as $key => $value)
  {
    $after[$key] = htmlspecialchars($value,ENT_QUOTES,'UTF-8');
    return $after;
  }
}

function pulldown_year(){
  print '<form action="order_download_done.php" method="post">';
  print '<select name="year" >';
  print '<option value="2019">2019</option>';
  print '<option value="2020">2020</option>';
  print '<option value="2021">2021</option>';
  print '</select>';
}

function pulldown_month(){
  print '<form action="order_download_done.php" method="post">';
  print '<select name="month" >';
  print '<option value="1">1</option>';
  print '<option value="2">2</option>';
  print '<option value="3">3</option>';
  print '<option value="4">4</option>';
  print '<option value="5">5</option>';
  print '<option value="6">6</option>';
  print '<option value="7">7</option>';
  print '<option value="8">8</option>';
  print '<option value="9">9</option>';
  print '<option value="10">10</option>';
  print '<option value="11">11</option>';
  print '<option value="12">12</option>';
  print '</select>';
}

function pulldown_day(){
  print '<form action="order_download_done.php" method="post">';
  print '<select name="day" >';
  print '<option value="1">1</option>';
  print '<option value="2">2</option>';
  print '<option value="3">3</option>';
  print '<option value="4">4</option>';
  print '<option value="5">5</option>';
  print '<option value="6">6</option>';
  print '<option value="7">7</option>';
  print '<option value="8">8</option>';
  print '<option value="9">9</option>';
  print '<option value="10">10</option>';
  print '<option value="11">11</option>';
  print '<option value="12">12</option>';
  print '<option value="13">13</option>';
  print '<option value="14">14</option>';
  print '<option value="15">15</option>';
  print '<option value="16">16</option>';
  print '<option value="17">17</option>';
  print '<option value="18">18</option>';
  print '<option value="19">19</option>';
  print '<option value="20">20</option>';
  print '<option value="21">21</option>';
  print '<option value="22">22</option>';
  print '<option value="23">23</option>';
  print '<option value="24">24</option>';
  print '<option value="25">25</option>';
  print '<option value="26">26</option>';
  print '<option value="27">27</option>';
  print '<option value="28">28</option>';
  print '<option value="29">29</option>';
  print '<option value="30">30</option>';
  print '<option value="31">31</option>';
  print ' </select>';
}
?>
