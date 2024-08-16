

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="bs/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="bs/css/s3.css">
  	<script src="bs/js/bootstrap.min.js"></script>
	<meta charset="utf-8">
	<script src="https://kit.fontawesome.com/c20485228a.js" crossorigin="anonymous"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<title>Giriş Yap</title>

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
<div class="container" >
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
			<span style="display: block; margin-bottom: 70px;" >
			<h3 id="ekiph3">Giriş</h3>
			</span>
		<div class="row">
			<div class="col-md-5">
				<img src="img/profil.jpg" class="img-fluid">	
			</div>

			<div class="container">
				<div class="col-md-1"></div>

				<div class="col-md-6">
						  <?php
        include 'bag.php';
        
      ?>
<form action="iletisim.php" method="post" style="max-width:500px;margin:auto">
  <div class="input-container">
    <i class="fa fa-user icon"></i>
    <input class="input-field" type="text" placeholder="Kullanıcı Adı" name="ka">
  </div>
  
  <div class="input-container">
    <i class="fa fa-key icon"></i>
    <input class="input-field" type="password" placeholder="Şifre" name="sfr">
  </div>
  <div class="col-md-6">
  <button type="submit" class="btn">Giriş Yap</button>
  </div>
  <div class="col-md-6">
  <a href="kayitol.php" class="btn" style="color: white; border: 1px solid white;">Kayıt Ol</a>
  </div>
</form>

<?php
session_start();

if (isset($_SESSION['kullanici'])) {
    session_destroy();
    echo "<script>window.location.href='iletisim.php';</script>";
}

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer-master/src/Exception.php';
require 'PHPMailer-master/src/PHPMailer.php';
require 'PHPMailer-master/src/SMTP.php';

if (isset($_POST["ka"]) && isset($_POST["sfr"])) {
    $k = $_POST["ka"];
    $s = $_POST["sfr"];

    // Kullanıcı tablosunda kullanıcıyı kontrol et
    $user_query = $vt->prepare("SELECT * FROM kullanici WHERE kullaniciadi = ?");
    $user_query->execute(array($k));
    $user = $user_query->fetch(PDO::FETCH_ASSOC);

    // Admin tablosunda kullanıcıyı kontrol et
    $admin_query = $vt->prepare("SELECT * FROM admin WHERE adminid = ?");
    $admin_query->execute(array($k));
    $admin = $admin_query->fetch(PDO::FETCH_ASSOC);

    // Eğer kullanıcı veya admin tablosunda var ise
    if ($user || $admin) {
        // Eğer kullanıcı ise, onun şifresini kontrol et
        if ($user) {
            if (password_verify($s, $user["kullanicisifre"])) {
                $_SESSION["kullanici"] = $k; // Oturum değişkenini ata
                // Şifre doğruysa doğrulama kodu oluştur
                $dogrulama_kodu = mt_rand(100000, 999999);
                // Doğrulama kodunu oturumda sakla
                $_SESSION['dogrulama_kodu'] = $dogrulama_kodu;

                // Kullanıcının e-posta adresi
                $email = $user['eposta'];

                // E-posta gönderme işlemi
                $mail = new PHPMailer(true);
                try {
                    //SMTP ayarları
                    $mail->isSMTP();
                    $mail->Host = 'smtpout.secureserver.net'; // Godaddy SMTP sunucu adresi
                    $mail->SMTPAuth = true;
                    $mail->Username = 'support@nestwondersshop.com'; 
                    $mail->Password = 'Ozgurozan2158.'; 
                    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; 
                    $mail->Port = 587; // Godaddy SMTP port numarası

                    // Alıcı ve içerik ayarları
                    $mail->setFrom('support@nestwondersshop.com', 'NestWondersShop'); 
                    $mail->addAddress($email);
                    $mail->Subject = 'Dogrulama Kodu';
                    $mail->Body = 'Sayın ' . $k .', Doğrulama Kodunuz: ' . $dogrulama_kodu;

                    // E-postayı gönder
                    if ($mail->send()) {
                        // E-posta gönderildiyse, kullanıcıya doğrulama kodunu girmesi için bir alert göster
                        echo "<script>
                            var girilenKod = prompt('Doğrulama kodunu giriniz.');
                            if (girilenKod == $dogrulama_kodu) {
                                alert('Doğrulama başarılı.');
                                window.location.href='index.php';
                            } else {
                                alert('Doğrulama kodu yanlış. Lütfen tekrar deneyiniz.');
                                window.location.href='iletisim.php';
                            }
                        </script>";
                    } else {
                        // E-posta gönderilemediyse hata mesajı ver
                        echo "Mailer Error: " . $mail->ErrorInfo;
                    }
                } catch (Exception $e) {
                    // Eğer hata oluşursa, hata mesajını göster
                    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                }
            } else {
                // Şifre yanlışsa, hata mesajı göster
                echo "<script>alert('Kullanıcı adı veya şifre yanlış. Lütfen tekrar deneyiniz.');</script>";
                echo "<script>window.location.href='iletisim.php';</script>";
            }
        } elseif ($admin) {
            // Eğer admin ise, onun şifresini kontrol et
            if ($admin["adminsifre"]==$s) {
                $_SESSION["admin"] = $k; // Oturum değişkenini ata
                // Admin anasayfaya yönlendir
                echo "<script>window.location.href='panel.php';</script>";
            } else {
                // Şifre yanlışsa, hata mesajı göster
                echo "<script>alert('Kullanıcı adı veya şifre yanlış. Lütfen tekrar deneyiniz.');</script>";
                echo "<script>window.location.href='iletisim.php';</script>";
            }
        }
    } else {
        // Eğer kullanıcı ve admin tablolarında bulunamadıysa, hata mesajı göster
        echo "<script>alert('Kullanıcı adı veya şifre yanlış. Lütfen tekrar deneyiniz.');</script>";
        echo "<script>window.location.href='iletisim.php';</script>";
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