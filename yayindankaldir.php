<?php
    session_start();
    if ($_SESSION["admin"]) 
    {
        include 'bag.php';
        $ddid=$_GET["id"];
        $sonuc=$vt->prepare("update urunler set onay=0 where id=$ddid");
        $sonuc->execute();
        echo "<script> window.location.href='panel.php' </script>";
    }
    else
    {
        echo "<script> alert('bu sayfayı görmeye yetkiniz yok') </script>";
        echo "<script> window.location.href='index1.php' </script>";
    }
?>