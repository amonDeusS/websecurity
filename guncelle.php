<?php
      if (isset($_GET["formid"]))
      {
        include 'bag.php';
        
        $baslik=$_GET["formbaslik"];
        $idd=$_GET["formid"];
        $foto=$_GET["formimg"];
        $yzr=$_GET["formyazar"];
        $icrk=$_GET["formicerik"];
        $icrk2=$_GET["formicerik2"];
        $ony=$_GET["formonay"];
        $ekle=$vt->prepare("update urunler set img=?,baslik=?,icerik=?,icerik2=?,onay=?,yazar=? where id='$idd'");
        $ekle->execute(array($foto,$baslik,$icrk,$icrk2,$ony,$yzr));
         echo "<script> alert('Haber Başarıyla Güncellenmiştir.') </script>";
        echo "<script> window.location.href='panel.php' </script>";
      }
    ?>