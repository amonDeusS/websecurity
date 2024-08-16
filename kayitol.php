 <?php 
        session_start();
        if (isset($_SESSION['kullanici'])) {
        session_destroy();
        }
        include 'bag.php';

      ?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="bs/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="bs/css/s3.css">
  	<script src="bs/js/bootstrap.min.js"></script>
	<meta charset="utf-8">
	<script src="https://kit.fontawesome.com/c20485228a.js" crossorigin="anonymous"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<title>Kayıt Ol</title>

	<link rel="stylesheet" href="bs/js/owl.carousel.min.css">
<link rel="stylesheet" href="bs/js/owl.theme.default.min.css">
<style>
body {font-family: Arial, Helvetica, sans-serif;}
* {box-sizing: border-box;}

.input-container {
  display: -ms-flexbox; 
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
  cursor: pointer;
  width: 100%;
  opacity: 0.9;
  border: 1px solid;
  margin-top:3px;
}

.btn:hover {
  opacity: 1;
}

.aab{
    margin-top: 5px;
    background-color: #003666;

}
</style>
</head>
<body>
<div class="container">
    <div id="logo"> <a href="index.php"><img id="logoimg" src="img/ozgurelektriklogo.png"></a>
    </div>
    
    <div id="menusag">
      <nav>
      <a href="index.php" id="aid"><i class="fas fa-home ic"></i> <b>Ana Sayfa</b></a>
      <a href="iletisim.php" id="aid"><i class="fas fa-user ic"></i> <b>Giriş Yap</b></a>
      </nav>
    </div>
  </div>

	<section id="aekip">
		<div class="container" style="height: 720px;">	
			<span style="display: block; margin-bottom: 70px;">
			<h3 id="ekiph3">Kayıt Ol</h3>
			</span>
		<div class="row">
			<div class="col-md-5">
				<img src="img/profil.jpg" class="img-fluid">
				
			</div>

			<div class="container">
				<div class="col-md-1"></div>

				<div class="col-md-6">
<form style="max-width:500px;margin:auto">
  <div class="input-container">
    <i class="fa fa-user icon"></i>
    <input class="input-field" type="text" placeholder="Kullanıcı Adı" name="kullaniciadi" required>
  </div>
    <div class="input-container">
    <i class="fa fa-envelope icon"></i>
    <input class="input-field" type="mail" placeholder="E-Posta" name="eposta" required>
  </div>
  
  <div class="input-container">
    <i class="fa fa-key icon"></i>
    <input class="input-field" type="password" placeholder="Şifre" name="kullanicisifre" required>
  </div>
  <button type="submit" class="btn">Kayıt Ol</button>
</form>

<?php
//
if (isset($_GET["kullaniciadi"]) && isset($_GET["eposta"]) && isset($_GET["kullanicisifre"])) {
    $kulad = $_GET["kullaniciadi"];
    $epst = $_GET["eposta"];
    $sifr = $_GET["kullanicisifre"];

    // E-posta mı diye kontrol
    if (!(strpos($epst, "@gmail.com") !== false || strpos($epst, "@hotmail.com") !== false)) {
        die("<span style='color:white'>E-posta adresi @gmail.com veya @hotmail.com ile bitmelidir.</span>");
    }

    // 8 Harften uzun, büyük küçük harf ve noktalama işaret kontrolü
    if (strlen($sifr) < 8 || !preg_match('/[A-Z]/', $sifr) || !preg_match('/[\W]/', $sifr)) {
        die("<span style='color:white'>Parola en az 8 karakter, 1 büyük harf ve 1 noktalama işareti içermelidir.</span>");
    }

    // Veritabanında kullanıcı adının veya e-postanın mevcutluğu
    $kontrol = $vt->prepare("SELECT COUNT(*) FROM kullanici WHERE kullaniciadi = ? OR eposta = ?");
    $kontrol->execute(array($kulad, $epst));
    $sonuc = $kontrol->fetchColumn();

    if ($sonuc > 0) {
        // Kullanıcı adı veya e-posta zaten varsa kayıt işlemi yapma
        echo "<script>alert('Kullanıcı adı veya e-posta zaten mevcut');</script>";
    } else {
        // PW'nin Hashlenmesi
        $hashedPassword = password_hash($sifr, PASSWORD_DEFAULT); 

        // Veritabanına kayıt işlemi
        $ekle = $vt->prepare("INSERT INTO kullanici (kullaniciadi, eposta, kullanicisifre) VALUES (?, ?, ?)");
        $ekle->execute(array($kulad, $epst, $hashedPassword));
        echo "<script>alert('Başarıyla Kayıt Olunmuştur');</script>";
        echo "<script>window.location.href='index.php';</script>";
    }
}
?>

				</div>		


				</div>
			</div>
		</div>
</section>
  <section id="fronter">
        <div class="container">
            <div class="row" style="margin-bottom: 15px;">
            <div class="col-md-2">
                
            </div>
            <div class="col-md-2">
                <a href="index.php#logo" style="color: white; border-bottom: white solid;">Ana Sayfa</a>
            </div>
            <div class="col-md-2">
                <a href="index.php#hakk" style="color: white; border-bottom: white solid;">Hakkımızda</a>
            </div>
            <div class="col-md-2">
                <a href="iletisim.php" style="color: white; border-bottom: white solid;">Giriş Yap</a>
            </div>
            <div class="col-md-2">
                <a href="kayitol.php" style="color: white; border-bottom: white solid;">Kayıt Ol</a>
            </div>

        </div>
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-4">Nest Wonders Shop Copryrighted | 2024</div>
        </div>
        </div>
    </section>
		


	<script
  src="https://code.jquery.com/jquery-3.6.0.slim.min.js"
  integrity="sha256-u7e5khyithlIdTpu22PHhENmPcRdFiHRjhAuHcs05RI="
  crossorigin="anonymous"></script>
	<script src="bs/js/owl.carousel.min.js"></script>
	<script src="bs/js/script.js"></script>
</body>
</html>