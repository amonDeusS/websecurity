<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title></title>
</head>
<body>
 <?php 
        session_start();
        include 'bag.php';
        if (@!$_SESSION["admin"]) {
          echo " <script> alert('bu sayfayı görmenize izin yok') </script> ";
          echo "<script> window.location.href='index1.php' </script>";
          exit();
        }
        

      ?>
    <form>
      <div id="iletisimo">
        <div id="formgroup">
          <div id="solform">
            <input type="text" name="imgurl" placeholder="İMGURL" required="" class="formcontrol">
            <input type="text" name="baslik1" placeholder="Başlık" required="" class="formcontrol">

          </div>

          <div id="sagform">
            <input type="text" name="icerik1" placeholder="İçerik1" required="" class="formcontrol">
            <input type="text" name="icerik2" placeholder="İçerik2" required="" class="formcontrol">
            <input type="text" name="onay1" placeholder="Onay" required="" class="formcontrol">
            <input type="text" name="yazar1" placeholder="Yazar" required="" class="formcontrol">
            <input type="text" name="baslik2" placeholder="Başlık2" required="" class="formcontrol">
            <input type="text" name="fiyat" placeholder="Fiyat" required="" class="formcontrol">
          </div>

        </div>
        <input type="submit" value="Gönder">
      </form>
      <?php
      if (isset($_GET["baslik1"]))
      {
        $img=$_GET["imgurl"];
        $bslik=$_GET["baslik1"];
        $icrk=$_GET["icerik1"];
        $icrk2=$_GET["icerik2"];
        $onay=$_GET["onay1"];
        $yazar=$_GET["yazar1"];
        $bslik2=$_GET["baslik2"];
        $fyt=$_GET["fiyat"];
        $ekle=$vt->prepare("insert into urunler(img,baslik,icerik,icerik2,onay,yazar,baslik2,fiyat) values(?,?,?,?,?,?,?,?)");
        $ekle->execute(array($img,$bslik,$icrk,$icrk2,$onay,$yazar,$bslik2,$fyt));
        echo "<script> alert('Konu Başarıyla Eklenmiştir.') </script>";
        echo "<script> window.location.href='panel.php' </script>";
      }
    ?>

</body>
</html>