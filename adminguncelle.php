<?php
	session_start();
	if (@$_SESSION["admin"])
	{
		$gelenid=$_GET["id"];
		include 'bag.php';
		$sonuc=$vt->query("select * from urunler where id=$gelenid")->fetch();
?>

	<!DOCTYPE html>
	<html>
	<head>
		<title>Mesajlaşma Panosu</title>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="stil.css">
		<link rel="stylesheet" type="text/css" href="bs/css/bootstrap.min.css">
		<script type="text/javascript" href="bs/js/jquery-3.4.1.min.js"></script>
		<script type="text/javascript" href="bs/js/bootstrap.min.js"></script>
	</head>
	<div class="form">
		<form action="guncelle.php">
			<input type="text" name="formid" value="<?php echo $sonuc['id'] ?>" readonly="">
			<input type="text" name="formimg" value="<?php echo $sonuc['img'] ?>" >
			<input type="text" name="formbaslik" value="<?php echo $sonuc['baslik'] ?>" >
			<input type="text" name="formicerik" value="<?php echo $sonuc['icerik'] ?>" >
			<input type="text" name="formicerik2" value="<?php echo $sonuc['icerik2'] ?>" >
			<input type="text" name="formonay" value="<?php echo $sonuc['onay'] ?>" >
			<input type="text" name="formyazar" value="<?php echo $sonuc['yazar'] ?>" >
			<input type="text" name="formfyt" value="<?php echo $sonuc['fiyat'] ?>" >
			<input type="submit" value="Değişiklikleri Kaydet" class="btn btn-success">
		</form>
	</div>

<?php
	}
	else
	{
		echo "<script> alert('bu sayfayı görmeye yetkiniz yok') </script>";
		echo "<script> window.location.href='index1.php' </script>";
	}
?>