<?
	if(isset($_POST['zaloguj'])){
		$email = mysql_real_escape_string($_POST['email']);
		$password = md5($_POST['haslo']);
		
		$select = "SELECT warsztat_id, email_user 
		FROM warsztaty 
		WHERE email_user = '$email' 
		AND password = '$password'";
		$query = mysql_query($select) or die(mysql_error());
		if(mysql_num_rows($query)==1){
			$row = mysql_fetch_array($query);
			$_SESSION['zalogowany'] = 1;
			$_SESSION['email_user'] = $email;
			$_SESSION['warsztat_id'] = $row['warsztat_id'];
			header("Location: edycja_warsztatu.html");
		}
	}
	
	if(isset($_POST['zarejestruj'])){
		$email = mysql_real_escape_string($_POST['email']);
		$haslo = md5($_POST['haslo']);
		$select = "SELECT email_user FROM warsztaty WHERE email_user = '$email'";
		$query = mysql_query($select) or die(mysql_error());
		if(mysql_num_rows($query)==0){
			$insert = "INSERT INTO warsztaty(email_user,password, szerokosc, wysokosc) VALUE('$email','$haslo','50.85304', '20.615541')";
			$query = mysql_query($insert) or die(mysql_error());
			$_SESSION['msq'] = 'Konto zostało zarejestrowane. Zaloguj się i uzupełnij dane warsztatu.';
		}else{
			$_SESSION['msq'] = 'Ten adres e-mail istnieje już w naszej bazie danych';
		}
	}

	$ikona = $marker = '';
	$i = 0;
	
	$select = "SELECT * FROM warsztaty
	WHERE status = 1 ";
	if($_POST['adres']!=''){	
		$adres = mysql_real_escape_string($_POST['adres']);
		$select .= "AND adres LIKE '%$adres%'";
	}
	if(isset($_POST['szukaj'])){
		foreach($_POST as $key => $value){
			if($key != 'adres' AND $key != 'szukaj'){
				$key2 = mysql_real_escape_string($key);
				$value2 = mysql_real_escape_string($value);
				
				$select .= " AND `".$key2."` = '".$value."' ";
			}
		}
	}
	$query = mysql_query($select) or die(mysql_error());
	if(mysql_num_rows($query)==0){
		$lipa = '<br /><p class="lipa_info">Niestety nie znaleziono żadnego warsztatu. Spróbuj zaznaczyć inne opcje</p>';
	}
	while($row = mysql_fetch_array($query)){
		$ikona .= 'var ikona'.$i.' = new google.maps.MarkerImage("http://maps.google.com/mapfiles/ms/icons/red-dot.png", rozmiar, punkt_startowy, punkt_zaczepienia);';
		$marker .= 'dodajMarker({position: new google.maps.LatLng('.$row['szerokosc'].','.$row['wysokosc'].'), icon: ikona'.$i.'});';
		$markery .= 'var marker'.$i.' = new google.maps.Marker({position:new google.maps.LatLng('.$row['szerokosc'].','.$row['wysokosc'].'),icon:ikona'.$i.'});
					markers.push(marker'.$i.');
					marker'.$i.'.txt=\'<div class="dymek_mapka" style="width:250px; height:180px; overflow:hidden;"><p class="tytul"><a href="warsztat/'.$row['warsztat_id'].'/">'.$row['nazwa'].'</a></p>';
					
					$markery .= '<p>Adres: '.$row['miasto'].'<br /> ul. '.$row['adres'].'<br />Telefon: '.$row['telefon'].'</p><p>Strona www: <a target="_blank" href="'.$row['strona_www'].'">'.$row['strona_www'].'</a><br />Adres e-mail: <a href="mailto:'.$row['email'].'">'.$row['email'].'</a></p><p><a href="warsztat/'.$row['warsztat_id'].'/" class="btn">Przejdz do warsztatu</a></p></div>\';
					google.maps.event.addListener(marker'.$i.',"click",function()
					{
						dymek.setContent(marker'.$i.'.txt);
						dymek.open(map,marker'.$i.');
					});	 ';
		 $i++;
	}

	$trescStrony .= '<script src="https://maps.google.com/maps/api/js?sensor=false" type="text/javascript"></script>
	<script type="text/javascript" src="http://google-maps-utility-library-v3.googlecode.com/svn/trunk/markerclusterer/src/markerclusterer.js"></script>';
	
	$trescStrony .= '<div class="content szukaj_warsztatu">';
	$trescStrony .= '<div class="naglowek">Znajdź Warsztat w swojej okolicy</div>';
	$trescStrony .= '<form action="" method="post" class="form_szukajka">
		
		<p><b>Lokalizacja</b></p>
		<p><input type="text" name="adres" value="'.$_POST['adres'].'" placeholder="Miasto, ulica numer"/></p>
		
		<p><b>Naprawy</b></p>
		<p><input type="checkbox" name="auta_osobowe" value="1" '.(($_POST['auta_osobowe']=='1')?'checked="checked"':'').' />&nbsp;&nbsp;auta osobowe</p>
		<p><input type="checkbox" name="busy" value="1" '.(($_POST['busy']=='1')?'checked="checked"':'').'  />&nbsp;&nbsp;busy</p>
		<p><input type="checkbox" name="motocykle" value="1" '.(($_POST['motocykle']=='1')?'checked="checked"':'').'  />&nbsp;&nbsp;motocykle</p>
		<p><input type="checkbox" name="offroad" value="1" '.(($_POST['offroad']=='1')?'checked="checked"':'').'  />&nbsp;&nbsp;offroad4x4</p>
		
		<p><b>Specjalizacja rodzaju</b></p>
		<p><input type="checkbox" name="auta_europejskie" value="1" '.(($_POST['auta_europejskie']=='1')?'checked="checked"':'').'  />&nbsp;&nbsp;auta europejskie</p>
		<p><input type="checkbox" name="auta_azjatyckie" value="1" '.(($_POST['auta_azjatyckie']=='1')?'checked="checked"':'').'  />&nbsp;&nbsp;auta azjatyckie</p>
		<p><input type="checkbox" name="auta_amerykanskie" value="1" '.(($_POST['auta_amerykanskie']=='1')?'checked="checked"':'').'  />&nbsp;&nbsp;auta amerykanskie</p>
		
		<p><b>Specjalizacja napraw:</b></p>
		<p><input type="checkbox" name="blacharstwo_lakiernictwo" value="1" '.(($_POST['blacharstwo_lakiernictwo']=='1')?'checked="checked"':'').'  />&nbsp;&nbsp;blacharstwo, lakiernictwo</p>
		<p><input type="checkbox" name="naprawy_przegladowe" value="1" '.(($_POST['naprawy_przegladowe']=='1')?'checked="checked"':'').'  />&nbsp;&nbsp;naprawy przeglądowe</p>
		<p><input type="checkbox" name="naprawy_silnikow" value="1" '.(($_POST['naprawy_silnikow']=='1')?'checked="checked"':'').'  />&nbsp;&nbsp;naprawy silników</p>
		<p><input type="checkbox" name="wulkanizacja" value="1" '.(($_POST['wulkanizacja']=='1')?'checked="checked"':'').'  />&nbsp;&nbsp;wulkanizacja - wymiana opon</p>
		<p><input type="checkbox" name="diagnostyka_komputerowa" value="1" '.(($_POST['diagnostyka_komputerowa']=='1')?'checked="checked"':'').'  />&nbsp;&nbsp;diagnostyka komputerowa</p>
		<p><input type="checkbox" name="tlumiki_wymiana" value="1" '.(($_POST['tlumiki_wymiana']=='1')?'checked="checked"':'').'  />&nbsp;&nbsp;tłumiki wymiana</p>
		<p><input type="checkbox" name="elektromechanika" value="1" '.(($_POST['elektromechanika']=='1')?'checked="checked"':'').'  />&nbsp;&nbsp;elektromechanika</p>
		<p><input type="checkbox" name="instalacje_gazowe" value="1" '.(($_POST['instalacje_gazowe']=='1')?'checked="checked"':'').'  />&nbsp;&nbsp;instalacje gazowe</p>
		<p><input type="checkbox" name="serwis_klimatyzacji" value="1" '.(($_POST['serwis_klimatyzacji']=='1')?'checked="checked"':'').'  />&nbsp;&nbsp;serwis klimatyzacji</p>
		<p><input type="checkbox" name="stacja_diagnostyczna" value="1" '.(($_POST['stacja_diagnostyczna']=='1')?'checked="checked"':'').'  />&nbsp;&nbsp;stacja_diagnostyczna</p>
		<p><input type="checkbox" name="turbosprezarki_naprawa" value="1" '.(($_POST['turbosprezarki_naprawa']=='1')?'checked="checked"':'').'  />&nbsp;&nbsp;turbosprezarki naprawa</p>
		<p><input type="checkbox" name="naprawa_skrzyni_biegow" value="1" '.(($_POST['naprawa_skrzyni_biegow']=='1')?'checked="checked"':'').'  />&nbsp;&nbsp;naprawa skrzyni biegów</p>
		<p><input type="checkbox" name="wtryski_regeneracja" value="1" '.(($_POST['wtryski_regeneracja']=='1')?'checked="checked"':'').'  />&nbsp;&nbsp;wtryski regeneracja</p>
		<p>
			<input type="submit" name="szukaj" class="btn" value="Szukaj"  />
		</p>
	</form>
	
	<div class="narzedzia">
		<a class="btn mapa_warsztatow">Mapa warsztatów</a> 
		<a class="btn dodaj_warsztat">Dodaj Warsztat</a> 
		<a class="btn zaloguj_sie">Zaloguj się do warsztatu</a>
		
		'.$lipa.'
	</div>
	
	<div id="map_canvas"></div>
	
	<div class="rejestracja_div">
		<div class="logowanie btn">
			<form action="" method="post">
				<p class="header_logowania">Logowanie do warsztatu</p>
				<p><span>E-mail:</span><input type="text" name="email" value="" /></p>
				<p><span>Hasło:</span><input type="password" name="haslo" value="" /></p>
				<p class="center"><input type="submit" name="zaloguj" value="Zaloguj się" class="btn" />
			</form>
		</div>
	</div>
	
	<div class="logowanie_div">
		<div class="logowanie btn">
			<form action="" method="post">
				<p class="header_logowania">Rejestracja nowego warsztatu</p>
				<p><span>E-mail:</span><input type="text" name="email" value="" /></p>
				<p><span>Hasło:</span><input type="password" name="haslo" value="" /></p>
				<p class="center"><input type="submit" name="zarejestruj" value="Zarejestruj się" class="btn" />
			</form>
		</div>
	</div>
	';
	
	$trescStrony .= '</div>';
	$trescStrony .= '<div class="content szukaj_warsztatu">';
	$trescStrony .= '<div class="naglowek">Polecamy</div><br />';
	
	$select2 = "SELECT tresc FROM banery WHERE id = 13";
	$query2 = mysql_query($select2) or die(mysql_error());
	$row2 = mysql_fetch_array($query2);
	$trescStrony .= $row2['tresc'];
	$trescStrony .= '</div>';	
	$trescStrony .= '<div class="clearboth"></div>';	
	
	$trescStrony .= '<script type="text/javascript">
	
	$(".dodaj_warsztat").click(function(){
		$("#map_canvas").fadeOut();
		$(".logowanie_div").fadeIn();
		$(".rejestracja_div").hide();
	});
	
	$(".zaloguj_sie").click(function(){
		$("#map_canvas").fadeOut();
		$(".rejestracja_div").fadeIn();
		$(".logowanie_div").hide();
	});
	
	$(".mapa_warsztatow").click(function(){
		$("#map_canvas").fadeIn();
		$(".rejestracja_div").fadeOut();
		$(".logowanie_div").fadeOut();
	});
	
	
			var map;
			var mgr;
			var dymek = new google.maps.InfoWindow(); // zmienna globalna
			
			function dodajMarker(opcjeMarkera)
            {
                opcjeMarkera.map = map;
                var marker = new google.maps.Marker(opcjeMarkera);
            }
			
			function initialize() {
			lat = 50.85404 ;
			long = 20.615641; //set on kielce

			var latlng = new google.maps.LatLng(lat, long);
			var myOptions = {
				zoom: 7,
				center: latlng,
				mapTypeId: google.maps.MapTypeId.ROADMAP
			}
			;
			map = new google.maps.Map(document.getElementById("map_canvas"),myOptions);
			
			 // wspólne cechy ikon			
                var rozmiar = new google.maps.Size(32, 32);                
                var punkt_startowy = new google.maps.Point(0,0);
                var punkt_zaczepienia = new google.maps.Point(18, 17);					
				var markers= [];
				'.$ikona.'
				'.$markery.'				
			mgr = new MarkerClusterer(map,markers);
			}
			
		$(document).ready(function(){	
			initialize();
		});		
		</script>
	';
?>