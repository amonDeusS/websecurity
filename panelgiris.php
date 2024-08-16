<?php
  session_start();
?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- Add icon library -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
body {font-family: Arial, Helvetica, sans-serif;}
* {box-sizing: border-box;}

.input-container {
  display: -ms-flexbox; /* IE10 */
  display: flex;
  width: 100%;
  margin-bottom: 15px;
}

.icon {
  padding: 10px;
  background: dodgerblue;
  color: white;
  min-width: 50px;
  text-align: center;
}

.input-field {
  width: 100%;
  padding: 10px;
  outline: none;
}

.input-field:focus {
  border: 2px solid dodgerblue;
}

.btn {
  background-color: dodgerblue;
  color: white;
  padding: 15px 20px;
  border: none;
  cursor: pointer;
  width: 100%;
  opacity: 0.9;
}

.btn:hover {
  opacity: 1;
}
a{
  text-decoration: none;
  color: white;
}
.aab{
    margin-top: 5px;
    background-color: #003666;

}
</style>
</head>
<body>
  <?php
        include 'bag.php';
        
      ?>
<form action="panelgiris.php" method="post" style="max-width:500px;margin:auto">
  <h2 style="text-align: center;">Panel Giriş</h2>
  <div class="input-container">
    <i class="fa fa-user icon"></i>
    <input class="input-field" type="text" placeholder="Kullanıcı Adı" name="ka">
  </div>
  
  <div class="input-container">
    <i class="fa fa-key icon"></i>
    <input class="input-field" type="password" placeholder="Şifre" name="sfr">
  </div>

  <button type="submit" class="btn">Giriş Yap</button>
  <a href="index.php" style="border: 2px solid black; color: black; padding:15px 20px;width: 100%; text-align: center; margin-top: 5px;background-color: darkcyan; float: left;">Ana Sayfa</a>
</form>

  <?php
        if (isset($_POST["ka"])) {
          $k=$_POST["ka"];
          $s=$_POST["sfr"];
          $sonuc=$vt->query("select * from admin where adminid='$k' ")->fetch();
          if ($sonuc)
          {
            if ($sonuc["adminsifre"]==$s) 
            {
              $_SESSION["admin"]=$k;
              echo "<script> alert('Giriş Yapıldı') </script>";
              echo "<script> window.location.href='panel.php' </script>";
            }
            else
            {
              echo "<script> alert ('Şifreniz Hatalı') </script>";
            }
          }
          else
          {
            echo "<script> alert ('Böyle bir kullanıcı yok') </script>";
          }
        }
      ?>
</body>
</html>
