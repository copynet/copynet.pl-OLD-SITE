<?PHP
     ob_start();
     session_start();
     //print_r($_GET);
     if(!isset($_SESSION['panel']['login'])){
		 
     }
	 
	 include 'baza.php';
     include 'config.php';
     include 'funkcje/menu.php';
     include 'podstrony/start.php';
     $id_jezyk = ID_LANG;
     $select = "SELECT * FROM ustawienia WHERE id_jezyk = '$id_jezyk'";
     $query = mysql_query($select) or die(mysql_error());
     $row = mysql_fetch_array($query); 
	
     $robots = $row['robots'];
     if($slowa_kluczowe==''){
          $slowa_kluczowe = $row['keywords'];
     }
     if($opis_strony==''){
          $opis_strony = $row['description'];
     }
     if($tytulStrony==''){
          $tytulStrony = $row['title'];
     }
     
     
     if(isset($_POST['wyslij'])){
          $imieE = addslashes($_POST['imie']);
          $telefonE = addslashes($_POST['telefon']);
          $emailE = addslashes($_POST['email']);
          $wiadomoscE2 = addslashes($_POST['opis']);
          
          $headers  = "From: Strona www<noreply@copynet.pl>\r\n";
          $headers .= "Reply-To: info@copynet.pl\r\n";
          $headers .= "Return-Path: info@copynet.pl\r\n";
          $headers .= "X-Mailer: copynet.pl\n";
          $headers .= 'MIME-Version: 1.0' . "\n";
          $headers .= 'Content-type: text/plain; charset=utf-8' . "\r\n";
          $subject = 'Strona copynet.pl';
          
$wiadomoscE = 'Wiadomość od: '.$imieE.' 
'.$wiadomoscE2.' 
tel.: '.$telefonE;
          
              // if(mail('info@copynet.pl', $subject, $wiadomoscE, $headers)){
            if(mail('info@copynet.pl', $subject, $wiadomoscE, $headers)){
                    $_SESSION['msq'] = 'Wiadomość została wysłana!';
            }

          unset($_POST);

     }
     
     if(isset($_POST['newsletter'])){
          $email = mysql_real_escape_string($_POST['newsletter']);
          $select = "SELECT email FROM newsletters_email WHERE email = '$email'";
          $query = mysql_query($select) or die(mysql_error());
          if(mysql_num_rows($query)==0){
               $_SESSION['msq'] = 'Dziękujemy, zostałeś zapisany do newslettera';
               $insert = "INSERT INTO newsletters_email VALUES('', '$email', now())";
               $query = mysql_query($insert) or die(mysql_error());
               
               
          }else{
               $_SESSION['msq'] = 'Dziękujemy, już jesteś zapisany do newslettera';
          }
     }
     
?>
<!DOCTYPE html>
<html xmlns="https://www.w3.org/1999/xhtml">
<head>
     <base href="<?PHP echo $domena; ?>" />
     <meta http-equiv="content-type" content="text/html;charset=utf-8" />
	 <meta http-equiv="X-UA-Compatible" content="IE=Edge"/>
     <meta http-equiv="content-language" content="pl" />
     <title>COPYNET - drukarnia wielkoformatowa - 24h/7</title>
     <meta name="author" content="jarek@net-atak.pl" />
     <meta name="robots" content="<?PHP echo $robots; ?>" />
     <meta name="keywords" content="<?PHP echo $slowa_kluczowe; ?>" />
     <meta name="description" content="<?PHP echo $opis_strony; ?>" />
     <link rel="stylesheet" type="text/css" href="css/templatka.css?<?=time();?>" />
     <link rel="stylesheet" type="text/css" href="css/skin.css?<?=time();?>" />
     <link rel="stylesheet" type="text/css" href="css/jquery.fancybox.css?<?=time();?>" />
     <link rel="stylesheet" type="text/css" href="css/jquery.bxslider.css?<?=time();?>" />
</head>
<body>
	<div class="menu">
		<div class="container">
			<a class="logo" href="<?=$domena;?>"><img src="images/templatka/logo.jpg" alt="copy net" /></a>
			<a class="sklep" href="https://goprint24.pl"><img src="images/templatka/btn_sklep.jpg" alt="sklep" /></a>
			<div class="content_menu">
				<?=menu(8,0);?>
			</div>
		</div>
		<div class="clr"></div>
	</div>
	
	<div class="header">
		<?
		 if($_GET['alias_kategorii']=='kontakt'){
		?>
			<div id="mapa" style="height:356px; width:100%"></div>
			<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAV-4E3l2RN0HalM-mVDp_Yx9MF1JqK5Vw" type="text/javascript"></script>
<script type="text/javascript">
var myLatlng = new google.maps.LatLng(50.868437,20.641515);
var styles = [{"featureType":"water","elementType":"geometry","stylers":[{"color":"#e9e9e9"},{"lightness":17}]},{"featureType":"landscape","elementType":"geometry","stylers":[{"color":"#f5f5f5"},{"lightness":20}]},{"featureType":"road.highway","elementType":"geometry.fill","stylers":[{"color":"#ffffff"},{"lightness":17}]},{"featureType":"road.highway","elementType":"geometry.stroke","stylers":[{"color":"#ffffff"},{"lightness":29},{"weight":0.2}]},{"featureType":"road.arterial","elementType":"geometry","stylers":[{"color":"#ffffff"},{"lightness":18}]},{"featureType":"road.local","elementType":"geometry","stylers":[{"color":"#ffffff"},{"lightness":16}]},{"featureType":"poi","elementType":"geometry","stylers":[{"color":"#f5f5f5"},{"lightness":21}]},{"featureType":"poi.park","elementType":"geometry","stylers":[{"color":"#dedede"},{"lightness":21}]},{"elementType":"labels.text.stroke","stylers":[{"visibility":"on"},{"color":"#ffffff"},{"lightness":16}]},{"elementType":"labels.text.fill","stylers":[{"saturation":36},{"color":"#333333"},{"lightness":40}]},{"elementType":"labels.icon","stylers":[{"visibility":"on"}]},{"featureType":"transit","elementType":"geometry","stylers":[{"color":"#f2f2f2"},{"lightness":19}]},{"featureType":"administrative","elementType":"geometry.fill","stylers":[{"color":"#fefefe"},{"lightness":20}]},{"featureType":"administrative","elementType":"geometry.stroke","stylers":[{"color":"#fefefe"},{"lightness":17},{"weight":1.2}]}];

var styledMap = new google.maps.StyledMapType(styles,
    {name: "Copy Net"});

var mapOptions = {
  zoom: 17,
  center: myLatlng,
  mapTypeId: google.maps.MapTypeId.ROADMAP,
	mapTypeControlOptions: {
    mapTypeIds: [google.maps.MapTypeId.ROADMAP, 'map_style']
  }
};
var map = new google.maps.Map(document.getElementById("mapa"),
    mapOptions);
map.mapTypes.set('map_style', styledMap);
map.setMapTypeId('map_style');
var marker = new google.maps.Marker({
    position: myLatlng,
    title: 'Hello World!'
});
marker.setMap(map);

</script>
			 
		<?
		}else{
		
			$selectF = "SELECT * FROM fotki WHERE id_artykulu = '$id_artykul'";
			$queryF = mysql_query($selectF) or die(mysql_error());
			if(mysql_num_rows($queryF)>0){
				$src_header = '<ul id="bx_slider">';
				while($rowFotka = mysql_fetch_array($queryF)){
					$src_header .= '<li><img src="images/biblioteka/'.$rowFotka['nazwa_pliku'].'" /></li>';
				}
				$src_header .= '</ul>';
			}else{
				$src_header = '<img src="images/templatka/header_top_default.jpg" alt="copy net" />';
			}
		
			echo $src_header;
		} ?>
		
	</div>
	
	<div class="content">
		<div class="container <?=$_GET['alias_kategorii'];?>">
			<?=$trescStrony;?>
		</div>
	</div>
	
	<div class="jcarousel slider jcarousel-skin-tango"  id="mycarousel">
		<?
		$select = "SELECT tresc_artykulu FROM artykuly WHERE alias_artykulu = 'suwak_nad_stopka'";
		$query = mysql_query($select) or die(mysql_error());
		$row = mysql_fetch_array($query);
		echo $row['tresc_artykulu'];
		?>
	</div>
	
	<div class="footer_pink">
		<p>Chcesz dowiedzieć się <b>więcej</b>? porozmawiać z naszym <b>handlowcem</b>?</p>
		<div class="btn"><a href="<?=$domena;?>/kontakt/"><img src="images/templatka/btn_skontaktuj.jpg" /></a></div>
	</div>
	
	<div class="footer">
		<div class="container">
		
			<div class="fright menu_stopka">
				<?=menu(8,0);?>
			</div>
			
			<div class="ico">
				<a href="https://copynet.pl/dodatkowe_tresci/24_7_dni.html"><img src="images/templatka/ico1.jpg" /></a>
				<a href="https://copynet.pl/dodatkowe_tresci/darmowa_dostawa.html"><img src="images/templatka/ico2.jpg" /></a>
				<a href="https://www.facebook.com/copynet.kielce/?fref=ts"><img src="images/templatka/ico3.jpg" /></a>
				<!-- <a href="https://copynet.pl/dodatkowe_tresci/sklep1.html"><img src="images/templatka/ico4.jpg" /></a> -->
			</div>
			
			<div class="fleft">
				<p>
					<b>COPY NET</b><br />
					ul. Źrodłowa 14, <br />
					25-335 Kielce
				</p>
				<p>
					tel. +48 41 344 50 70<br />
					<a href="mailto:info@copynet.pl">info@copynet.pl</a>
				</p>
				<p>
					<b>godziny otwarcia:</b><br />
					CZYNNE 24h 7 dni w tygodniu
				</p>
			</div>
			
			<div class="clr"></div>
		</div>
	</div>
<?
if(isset($_SESSION['msq'])){
     echo '<div class="maska" style="position:fixed; top:0px; left:0px; width:100%; height:100%; background:rgba(0,0,0,0.3); box-shadow:inset 0px 0px 500px black; z-index:1000;">     </div>
     
     <div class="okno" style="position:fixed; left:50%; top:50%; margin-left:-150px; margin-top:-50px; z-index:1001; padding:30px; padding-bottom:30px; width:300px; background:white; border-radius:2px;">
     <p>'.$_SESSION['msq'].'</p>
     <p style="text-align:center; width:300px;">
          <input type="button" class="btn click" style="	padding:10px 20px;
	background:#ef009a;
	box-sizing:border-box;
	margin-bottom:10px;
	margin-top:20px;
	cursor:pointer;
	border:none;
	color:white;
	font-size:12px;" value="OK"  />
     </p>
     </div>';
     unset($_SESSION['msq']);
}
?>
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/jquery.jcarousel.min.js"></script>
<script type="text/javascript" src="js/jquery.fancybox.pack.js"></script>
<script type="text/javascript" src="js/jquery.bxslider.js"></script>
<script>
	<?=$script;?>
	$(document).ready(function(){
	
		var htmlek = $('.jcarousel ul').html();
		$('.jcarousel ul').html(htmlek+htmlek+htmlek+htmlek+htmlek+htmlek+htmlek+htmlek+htmlek+htmlek+htmlek+htmlek+htmlek);
		$('.jcarousel ul').css('position','absolute');
		$('.jcarousel ul').css('left','0');
		
		function slideauti(){
			setTimeout(function(){
				var left = parseFloat($('.jcarousel ul').css('left'));
				var ile =  left-0.5;
				$('.jcarousel ul').css('left',ile+'px');
				slideauti();
			}, 10);
		}
		
		slideauti();
	
          $('.click').click(function(){
               $('.maska, .okno').fadeOut('fast');
          });

		$('#bx_slider').bxSlider({
			mode: 'fade',
			auto: true,
			adaptiveHeight: true,
			infiniteLoop: true,
			hideControlOnEnd: true
		});
		 
		 $(".fancybox").fancybox({
				'transitionIn'	:	'elastic',
				'transitionOut'	:	'elastic',
				'speedIn'		:	600, 
				'speedOut'		:	200, 
				'overlayShow'	:	false,
				'titleShow'		:	false
			});
	});
</script>
</body>
</html>