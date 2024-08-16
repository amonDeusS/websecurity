<?php
	session_start();
	if (@!$_SESSION["admin"]) {
		echo " <script> alert('bu sayfayı görmenize izin yok') </script> ";
		echo "<script> window.location.href='index.php' </script>";
		exit();
	}
	else
	{
		include 'bag.php';
		if (isset($_GET["id"])) 
		{
			$gelenid=$_GET["id"];
			$sil=$vt->prepare("delete from urunler where id=?");
			$sil->execute(array($gelenid));
			echo "<script> alert('silme işlemi başarı ile tamamlandı') </script>";
			echo "<script> window.location.href='panel.php' </script>";
		}
	}
?>