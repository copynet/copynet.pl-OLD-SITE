<?
	$id_warsztat = mysql_real_escape_string($_GET['id_warsztat']);
	$select = "SELECT * FROM warsztaty WHERE warsztat_id = '$id_warsztat'";
	$query = mysql_query($select) or die(mysql_error());
	$row = mysql_fetch_array($query);
	
	$trescStrony .= '<div class="content szukaj_warsztatu">';
	
	$trescStrony .= '<div class="naglowek">'.$row['nazwa'].'</div>';
	
	$trescStrony .= '<div class="d_w">
	<img src="images/biblioteka/warsztaty/miniatury/'.$row['logo'].'" class="logo_warsztat" /><br />';
	$trescStrony .= '<div class="dane_warsztatu">';
		
		
		$trescStrony .= '<p>Adres:<br /><b>'.$row['miasto'].', '.$row['adres'].'</b></p>';
		$trescStrony .= '<p>Telefon:<br /><b>'.$row['telefon'].'</b></p>';
		if($row['email']!=''){ $trescStrony .= '<p>E-mail:<br /><b><a href="mailto:'.$row['email'].'">'.$row['email'].'</a></b></p>'; }
		if($row['strona_www']!=''){ $trescStrony .= '<p>Strona www:<br /><b><a href="'.$row['strona_www'].'">'.$row['strona_www'].'</a></b></p>'; }
		//if($row['szerokosc']!=''){ $trescStrony .= '<p>Strona www:<br /><b>'.$row['szerokosc'].'</b></p>'; }
		//if($row['wysokosc']!=''){ $trescStrony .= '<p>Strona www:<br /><b>'.$row['wysokosc'].'</b></p>'; }
		
		
		$trescStrony .= '</div>
		<br />
		<div id="map_canvas" style="width:290px; height:290px; float:right;"></div>
		
		</div>';
		$trescStrony .= '<br />'.$row['opis'].'<br /><br />';
				
				
				$selectF = "SELECT * FROM warsztaty_foto 
				WHERE warsztat_id = '$id_warsztat'";
				$queryF = mysql_query($selectF) or die(mysql_error());
				if(mysql_num_rows($queryF)>0){
					$trescStrony .= '<div class="galeria_warsztat">';
					while($rowF = mysql_fetch_array($queryF)){
						$trescStrony .= '
						<div class="foto_warsztat">
							<div class="tr">
								<div class="td">
									<a href="images/biblioteka/warsztaty/'.$rowF['nazwa_pliku'].'" class="pirobox" title="Foto '.$row['nazwa'].'">
										<img src="images/biblioteka/warsztaty/miniatury/'.$rowF['nazwa_pliku'].'" />
									</a>
								</div>
							</div>
						</div>';
					}
					$trescStrony .= '</div>';
				}
			
	
	$trescStrony .= '<table class="warsztat">
	<tr>
		<td>
		<p>Naprawiamy:</p>
		<ul>';
			
		if($row['auta_osobowe']==1){ $trescStrony .= '<li>Auta osobowe</li>'; }
		if($row['busy']==1){ $trescStrony .= '<li>Busy</li>'; }
		if($row['motocykle']==1){ $trescStrony .= '<li>Motocykle</li>'; }
		if($row['offroad']==1){ $trescStrony .= '<li>Offroad</li>'; }
			
		$trescStrony .= '</ul>
		</td>
	
	
		<td rowspan="2">';
		
		$trescStrony .= '<p>Specjalizacja rodzaju</p><ul>';
		
		if($row['blacharstwo_lakiernictwo']==1){ $trescStrony .= '<li>Blacharstwo, lakiernictwo</li>'; }
		if($row['naprawy_przegladowe']==1){ $trescStrony .= '<li>Naprawy przeglądowe</li>'; }
		if($row['naprawy_silnikow']==1){ $trescStrony .= '<li>Naprawy silników</li>'; }
		if($row['wulkanizacja']==1){ $trescStrony .= '<li>Wulkanizacja</li>'; }
		if($row['diagnostyka_komputerowa']==1){ $trescStrony .= '<li>Diagnostyka komputerowa</li>'; }
		if($row['tlumiki_wymiana']==1){ $trescStrony .= '<li>Tłumiki wymiana</li>'; }
		if($row['elektromechanika']==1){ $trescStrony .= '<li>Elektromechanika</li>'; }
		if($row['instalacje_gazowe']==1){ $trescStrony .= '<li>Instalacje gazowe</li>'; }
		if($row['serwis_klimatyzacji']==1){ $trescStrony .= '<li>Serwis klimatyzacji</li>'; }
		if($row['stacja_diagnostyczna']==1){ $trescStrony .= '<li>Stacja diagnostyczna</li>'; }
		if($row['turbosprezarki_naprawa']==1){ $trescStrony .= '<li>Turbosprężarki naprawa</li>'; }
		if($row['naprawa_skrzyni_biegow']==1){ $trescStrony .= '<li>Naprawa skrzyni biegów</li>'; }
		if($row['wtryski_regeneracja']==1){ $trescStrony .= '<li>Wtryski regeneracja</li>'; }
		
		$trescStrony .= '</ul>
		</td>
	</tr>
		<tr>
			<td>
			<p>Specjalizacja rodzaju</p>
			<ul>';
			if($row['auta_europejskie']==1){ $trescStrony .= '<li>Auta europejskie</li>'; }
			if($row['auta_azjatyckie']==1){ $trescStrony .= '<li>Auta azjatyckie</li>'; }
			if($row['auta_amerykanskie']==1){ $trescStrony .= '<li>Auta amerykańskie</li>'; }
			
			$trescStrony .= '</ul>
			</td>
		</tr>
	</table>';
	
	$trescStrony .= '</div>';
	
	$trescStrony .= '
	<div class="clearboth"></div>';	
	
	
	
	
$trescStrony .= "</div>

<script src=\"https://maps.google.com/maps/api/js?sensor=false\" type=\"text/javascript\"></script>
<script type=\"text/javascript\" src=\"http://google-maps-utility-library-v3.googlecode.com/svn/trunk/markerclusterer/src/markerclusterer.js\"></script>
<script>

var map;
			var mgr;
			var dymek = new google.maps.InfoWindow(); // zmienna globalna
			
			lat=".$row['szerokosc'].";  
			lng=".$row['wysokosc'].";  
			zoom=6;  			 
			
			function dodajMarker(opcjeMarkera)
            {
                opcjeMarkera.map = map;
                var marker = new google.maps.Marker(opcjeMarkera);
            }
			
			function initialize() {
			lat = ".$row['szerokosc'].";
			long = ".$row['wysokosc']."; //set on kielce

			var latlng = new google.maps.LatLng(lat, long);
			var myOptions = {
				zoom: 10,
				center: latlng,
				mapTypeId: google.maps.MapTypeId.ROADMAP
			}
			;
			map = new google.maps.Map(document.getElementById(\"map_canvas\"),myOptions);
			
		
			
			 // wspólne cechy ikon			
                var rozmiar = new google.maps.Size(230, 500);                
                var punkt_startowy = new google.maps.Point(0,0);
                var punkt_zaczepienia = new google.maps.Point(18, 17);					
				var markers= [];
				
				//var ikona1 = new //google.maps.MarkerImage(\"http://www.sendme2space.com/images/biblioteka/dokumenty/min/Bez_nazwy_120130928140020.jpg\", //rozmiar, punkt_startowy, punkt_zaczepienia);
					 
				var marker1 = new google.maps.Marker({position:new google.maps.LatLng(".$row['szerokosc'].",".$row['wysokosc'].")/*,icon:ikona1*/});
				markers.push(marker1);
				marker1.txt='';
				google.maps.event.addListener(marker1,\"click\",function()
				{
					//dymek.setContent(marker1.txt);
					//dymek.open(map,marker1);
				});

	 				
			mgr = new MarkerClusterer(map,markers);
			}
			
		$(document).ready(function(){	
			initialize();
		});		

</script>";
?>