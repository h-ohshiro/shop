<?php
	session_start();
	session_regenerate_id(true);

	// require_once("../common/common.php");　なぜか機能しない。

// $post=sanitize($_POST);

	$max=$_POST['max'];
	for($i=0;$i<$max;$i++)
	{
		if(preg_match("/\A[0-9]+\z/",$_POST['kazu'.$i])==false){
			print '入力に誤りがあります。半角数字で入力してください。<br>';
			print '<a href="shop_cartlook.php">カートへ戻る</a>';
			exit();
		}
		if ($_POST['kazu'.$i] < 0 || $_POST['kazu'.$i] > 10) {
			print '数量は1～10までで入力してください。<br>';
			print '<a href="shop_cartlook.php">カートへ戻る</a>';
			exit();
		}
		$kazu[]=$_POST['kazu'.$i];
	}

	$cart=$_SESSION['cart'];

	for($i=$max;0<=$i;$i--)
	{
		if(isset($_POST['sakujo'.$i])==true)
		{
			array_splice($cart,$i,1);
			array_splice($kazu,$i,1);
		}
	}

	$_SESSION['cart']=$cart;
	$_SESSION['kazu']=$kazu;

	header('Location:shop_cartlook.php');
?>
