<?php

$mbango = $_POST['mbango'];

$hoshi['M1']='カニ星雲';
$hoshi['M31']='アンドロメダ星雲';
$hoshi['M42']='オリオン大星雲';
$hoshi['M45']='すばる';
$hoshi['M57']='ドーナツ星雲';

foreach ($hoshi as $key => $value) {
  print $key.'は'.$value;
  print '<br>';
}

print 'あなたが選んだ星は';
print $hoshi[$mbango];

?>
