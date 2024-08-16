<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="bs/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="bs/css/s3.css">
    <script src="bs/js/bootstrap.min.js"></script>
  <meta charset="utf-8">
  <script src="https://kit.fontawesome.com/c20485228a.js" crossorigin="anonymous"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <title>Özel Sayfa</title>
<style type="text/css">
.btn {
 padding: 15px 40px;
 background: none;
 border: 2px solid #fff;
 font-size: 15px;
 color: #131313;
 cursor: pointer;
 position: relative;
 overflow: hidden;
 transition: all 0.3s;
 border-radius: 12px;
 background-color: #ecd448;
 font-weight: bolder;
 box-shadow: 0 2px 0 2px #000;
}

.btn:before {
 content: "";
 position: absolute;
 width: 100px;
 height: 120%;
 background-color: #ff6700;
 top: 50%;
 transform: skewX(30deg) translate(-150%, -50%);
 transition: all 0.5s;
}

.btn:hover {
 background-color: #4cc9f0;
 color: #fff;
 box-shadow: 0 2px 0 2px #0d3b66;
}

.btn:hover::before {
 transform: skewX(30deg) translate(150%, -50%);
 transition-delay: 0.1s;
}

.btn:active {
 transform: scale(0.9);
}
</style>


  <link rel="stylesheet" href="bs/js/owl.carousel.min.css">
<link rel="stylesheet" href="bs/js/owl.theme.default.min.css">
</head>
<body>
  <?php
  if(isset($_GET["id"])){
    $gelenid=$_GET["id"];
  }
  else
  {
    echo "<script> alert('veri gönderilmedi') <script>";
    echo "<script> windown.location.href='index.php' <script>";
  }
?>
    <div class="container">
    <div id="logo"> 
        <a href="index.php"><img id="logoimg" src="img/ozgurelektriklogo.png"></a>
    </div>
    
    <div id="menusag">
        <nav>

            <a href="index.php" id="aid"><i class="fas fa-home ic"></i> Ana Sayfa</a>
            <?php 
            session_start(); // Oturumu başlat
            if(isset($_SESSION['kullanici'])) { // Eğer kullanıcı oturum açmışsa
                echo '<a href="#" id="aid"><i class="fas fa-user ic"></i>'. $_SESSION['kullanici'] .'</a>'; // Kullanıcı adını ekrana yazdır
                echo '<a href="oturumkapat.php">Oturumu Kapat</a>';
            } else {
                echo '<a href="iletisim.php" id="aid"><i class="fas fa-user ic"></i> Giriş Yap</a>'; // Kullanıcı oturum açmamışsa, Giriş Yap bağlantısı göster
            }
            ?>
             
        </nav>
    </div>
</div>
 
  <?php 

    include 'bag.php';
    $foto=$vt->query("select * from urunler where id=$gelenid")->fetch();

  ?>

 



  <section style=" background-color: #f8f9fb;
        padding: 50px;
        text-align: center;
        text-transform: capitalize;
        font-weight: 600;
        ">
    <?php          
        include 'bag.php';
        $sonuc=$vt->query("select * from urunler where id=$gelenid")->fetch();
       ?>
    <h3 class="h3id" style="color: #445c6e;">
            <?php echo $sonuc["baslik2"] ?>


    </h3>
    <div class="container" style="height: 1080px;">
      <div id="sol" style="margin-top: 70px;">
         
        <h5 id="h5sol">
          <img width="100%" style="padding-right: 40px" src="img/<?php echo $foto['img'] ?>">
          
        </h5>
      
      </div>


      <div id="sag" style="margin-top: 70px;">
        <?php          
        include 'bag.php';
        $sonuc=$vt->query("select * from urunler where id=$gelenid")->fetch();
       ?>

       <div class="row" style="border-bottom: 1px black solid;">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <p id="psag">
                <?php echo $sonuc["icerik2"] ?>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                consequat. 
            </p>
        </div>
        <div class="col-md-2"></div> 
        </div>

        <div class="row" style="background-color: #fadfad; margin-top: 25px;">
            <div class="col-md-4"><i class="fas fa-credit-card" style="margin-right: 5px;"></i>Güvenli Ödeme</div>
            <div class="col-md-4"><i class="fas fa-truck" style="margin-right: 5px;"></i>Hızlı Kargo</div>
            <div class="col-md-4"><i class="fas fa-reply" style="margin-right: 5px;"></i>İade Politikası</div>


            
        </div>

        <div class="row" style="margin-top: 50px;">
            <div class="col-md-2"></div>
            <div class="col-md-2" style="text-align: center;padding: 15px 20px; font-size: 18px;"><p><?php echo $sonuc["fiyat"]?>TL</p></div>
            <div class="col-md-2" style="text-align: center;padding: 15px 20px;">★★★★★</div>
            <button class="btn"> Satın Al </button>
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