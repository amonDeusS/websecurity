<!DOCTYPE html>
<html>
<head>
<style>
#customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #4CAF50;
  color: white;
}
</style>
</head>
<body>
<?php
 include 'bag.php';

 ?>
<table id="customers">
  <?php 
        session_start();
        
        if (@!$_SESSION["admin"]) {
          echo " <script> alert('Bu Sayfayı Görmek İçin Lütfen Yetkili Hesabınıza Giriş Yapınız') </script> ";
          echo "<script> window.location.href='index.php' </script>";
          exit();
        }
        

      ?>
<?php
        include 'bag.php';
        $sonuc=$vt->query("select * from urunler ")->fetchALL();

      ?>
      

  
  <?php
      foreach ($sonuc as $konu) 
          {


    ?>
    <tr>
      <td><a class="btn btn-danger" href="sil.php?id=<?php echo $konu['id'] ?>"> Sil</a></td>
      <td> <?php echo $konu["id"] ?> </td>
      <td> <?php echo $konu["img"] ?> </td>
      <td> <?php echo $konu["baslik"] ?> </td>
      <td> <?php echo $konu["icerik"] ?> </td>
      <td> <?php echo $konu["icerik2"] ?> </td>
      <td> <?php echo $konu["onay"] ?> </td>
      <td> <?php echo $konu["yazar"] ?> </td>
      <td> <?php echo $konu["baslik2"] ?> </td>
      <td> <?php echo $konu["fiyat"] ?> </td>
      <td> <h3 class='text-success'><a href="ozelsayfa.php?id=<?php echo $konu['id']?>">Konuya Git</a></h3> </td>
      <td> <?php
        if ($konu["onay"]==0) {
          echo "<h3 class='text-danger'> Mesaj Yayında Değil! </h3> ";
          echo "<h6><a href='yayinla.php?id=".$konu["id"]."'>Yayınla</a></h6>";
        }
        else
        {
          echo "<h3 class='text-success'> Mesaj Yayında </h3> ";
          echo "<h6><a class='text-danger' href='yayindankaldir.php?id=".$konu["id"]."'>Yayından Kaldır</a></h6>";
        }
        
       ?> </td>
      <td><a href="adminguncelle.php?id=<?php echo $konu['id']?>" class="btn btn-primary">Mesajı Düzenle</a></td>

    </tr>

  <?php
  }
?>
</table>
<a href="konuekle.php">Konu Ekle</a>
<br>
<a href="index.php">Ana Sayfa</a>

</body>
</html>
