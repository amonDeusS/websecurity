<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="bs/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="bs/css/s3.css">
  	<script src="bs/js/bootstrap.min.js"></script>
	<meta charset="utf-8">
	<script src="https://kit.fontawesome.com/c20485228a.js" crossorigin="anonymous"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<title>Test</title>
	<link rel="stylesheet" href="bs/js/owl.carousel.min.css">
	<link rel="stylesheet" href="bs/js/owl.theme.default.min.css">
	<style type="text/css">
		#overlay-container {
    position: fixed;
    top: 0;
    left: 0;
    height: 100%;
    width: 100%;
    z-index: 1000;
    animation: colorChange 10s infinite;
    opacity: 0.8;
}

#overlay-content {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    text-align: center;
    background-color: rgba(255, 255, 255, 0.8);
    padding: 20px;
    border-radius: 5px;
    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.5);

}

#overlay-content p {
    margin-bottom: 10px;

}

#overlay-content button {
    padding: 10px 20px;
    border-radius: 5px;
    border: none;
    background-color: blue;
    color: white;
    cursor: pointer;

}

#overlay-content button:hover {
    background-color: darkblue;
}

@keyframes colorChange {
    0% {
        background-color: rgba(0, 0, 255, 1);
    }
    10% {
        background-color: rgba(0, 127, 255, 1);
    }
    20% {
        background-color: rgba(0, 255, 255, 1);
    }
    30% {
        background-color: rgba(127, 255, 0, 1);
    }
    40% {
        background-color: rgba(255, 255, 0, 1);
    }
    50% {
        background-color: rgba(255, 127, 0, 1);
    }
    60% {

        background-color: rgba(255, 0, 0, 1);
    }
    70% {
        background-color: rgba(127, 0, 0, 1);
    }
    80% {
        background-color: rgba(0, 0, 127, 1);
    }
    90% {
        background-color: rgba(0, 0, 255, 1);
    }
    100% {
        background-color: rgba(0, 0, 255, 1);
    }
}
	</style>
</head>

<body>
		<div id="overlay-container" style="visibility: hidden;">
    <div id="overlay-content">
        <p><b>This website is for school project. Please don't enter your personal information or credit card information. <b></p>
        	<hr>
        <p><b>Bu web site okul projesi içindir. Lütfen kişisel bilgilerinizi veya kart bilgilerinizi girmeyiniz.<b></p>
        	<span style="font-size:7pt">Onay verildikten sonra kişisel bilgilerin girilmesi sonucu yaşanacak durumlar sorumluluk dışındadır.</span>
        	<br>
        <button id="confirm-button">Tamam</button>
    </div>
</div>
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


	<section id="banner">
		<div id="ghost">
		</div>
		
		<div id="icerik">
			<h3 class="h3id">Nest Wonders Shop</h3>
			<hr width="70%">
			<p style="font-size: 20pt;">Eviniz İçin En İyisi
			</p>
		</div>
	</section>

	<section id="hakk">
		<h3 class="hakki">Hakkımızda</h3>
		<div class="container">
			<h4 style="color: #445c6e;font-style: italic; ">Nest Wonders Shop olarak sizlere sonsuz iç dekor çesitliliği sunuyoruz.</h4>
			<div id="sol">
				<p class="h5sol">
					<p style="font-size: 22pt;padding-top: 35px";>Misyonumuz</p>
					<br>
					<p style="font-size: 22pt;padding-top: 35px">Vizyonumuz</span></p>
				</p>
			</div>

			<div id="sag">
					<p id="psag">
						<p>Ev, hayatımızın en özel köşesi, ve biz buradayız çünkü senin evin için daha fazla özel kılmak istiyoruz. İçimizdeki duygusal bağları evlerimizde hissediyoruz, bu yüzden senin için özel ve anlamlı dekorasyonları sunmaktan gurur duyuyoruz.</p>
						<br>	
						<p>Vizyonumuz, her evdeki yaşam deneyimini daha keyifli, daha konforlu ve daha anlamlı hale getirmektir.</p>

					</p>
			</div>

			<img src="img/about1.jpg" class="img-fluid mt100">
		</div>
	</section>

	<section id="isler">
		<?php include 'bag.php';
				$sonuc=$vt->query("select * from urunler where onay=1")->fetchALL();
				?>
		<div class="container">
			<h3 class="hakki">Ürünler</h3>
			
			<div class="owl-carousel owl-theme" >
				<?php       	 
				
				foreach ($sonuc as $konu) 
					{
		
            	?>
				<a href="ozelsayfa.php?id=<?php echo $konu['id'] ?>">
					<div class="kart" data-merge=1.5>
						<img class="img-fluid" src="img/<?php echo $konu['img']?>">
						<h5 class="h5kart">	<?php echo $konu["baslik"] ?></h5>
						<p class="kartp">	<?php echo $konu["icerik"] ?></p>
						<p class="kartp" style="text-align:right;">	<?php echo $konu["yazar"] ?></p>
					</div>
				</a>
				<?php  } ?>
				
			</div>
			
		</div>
	</section>

	<section id="fronter">
		<div class="container">
			<div class="row" style="margin-bottom: 15px;">
			<div class="col-md-2">
				
			</div>
			<div class="col-md-2">
				<a href="#logo" style="color: white; border-bottom: white solid;">Ana Sayfa</a>
			</div>
			<div class="col-md-2">
				<a href="#hakk" style="color: white; border-bottom: white solid;">Hakkımızda</a>
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
  			crossorigin="anonymous">
  	</script>
	<script src="bs/js/owl.carousel.min.js"></script>
	<script src="bs/js/script.js"></script>
	<script type="text/javascript">
	const confirmButton = document.getElementById("confirm-button");

confirmButton.addEventListener("click", function() {
    document.getElementById("overlay-container").style.display = "none";
});

document.addEventListener("DOMContentLoaded", function() {
    document.getElementById("overlay-container").style.display = "block";
});
	</script>
</body>
</html>