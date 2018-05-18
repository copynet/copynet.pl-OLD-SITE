<?
if(!isset($_SESSION['warsztat_id'])){
	header("Location: index.php");
}

$id = mysql_real_escape_string($_SESSION['warsztat_id']);

if(isset($_POST['usun_foto'])){
	$foto_id = mysql_real_escape_string($_POST['usun_foto']);
	
	$select = "SELECT nazwa_pliku FROM warsztaty_foto WHERE foto_id = '$foto_id' AND warsztat_id = '$id'";
	$query = mysql_query($select) or die(mysql_error());
	$row = mysql_fetch_array($query);
	
	@unlink('images/biblioteka/warsztaty/miniatury/'.$row['nazwa_pliku']);
	@unlink('images/biblioteka/warsztaty/'.$row['nazwa_pliku']);
	
	$delete = "DELETE FROM warsztaty_foto WHERE foto_id = '$foto_id'";
	$query = mysql_query($delete) or die(mysql_error());
}

$trescStrony .= '
<script type="text/javascript" src="js/tinymce/tiny_mce.js"></script>
<script type="text/javascript">
	tinyMCE.init({
		// General options
		mode : "textareas",
		width : "800",
		theme : "advanced",
		content_css : "style/tiny_mce.css",
		plugins : "iframe,safari,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdekatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,wordcount,ezfilemanager",

		// Theme options
		theme_advanced_buttons1 : "save,newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,styleselect,formatselect,fontselect,fontsizeselect",
		theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdekent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,cleanup,help,code,|,insertdekate,inserttime,preview|,forecolor,backcolor",
		theme_advanced_buttons3 : "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,media,iframe,advhr,|,print,|,ltr,rtl,|,fullscreen,|,ezfilemanager",
		//theme_advanced_buttons4 : "insertlayer,moveforward,movebackward,absolute,|,styleprops,|,cite,abbr,acronym,del,ins,attribs,|,visualchars,nonbreaking,template,pagebreak",
        file_browser_callback: "CustomFileBrowser",
		extended_valid_elements : "a[href|target|name],noscript,iframe[src|name|width|height|align|frameborder|marginwidth|marginheight|scrolling],script",
		theme_advanced_toolbar_location : "top",
		theme_advanced_toolbar_align : "left",
		theme_advanced_statusbar_location : "bottom",
		theme_advanced_resizing : true

		
	});
</script>
<!-- /TinyMCE -->';



	if(isset($_POST['zapisz'])){
	
		$update = "UPDATE warsztaty SET
		szerokosc = '".mysql_real_escape_string($_POST['szerokosc'])."',
		wysokosc = '".mysql_real_escape_string($_POST['wysokosc'])."',
		nazwa = '".mysql_real_escape_string($_POST['nazwa'])."',
		miasto = '".mysql_real_escape_string($_POST['miasto'])."',
		adres = '".mysql_real_escape_string($_POST['adres'])."',
		telefon = '".mysql_real_escape_string($_POST['telefon'])."',
		strona_www = '".mysql_real_escape_string($_POST['strona_www'])."',
		email = '".mysql_real_escape_string($_POST['email'])."',
		opis = '".mysql_real_escape_string($_POST['opis'])."',
		auta_osobowe = '".mysql_real_escape_string($_POST['auta_osobowe'])."',
		busy = '".mysql_real_escape_string($_POST['busy'])."',
		motocykle = '".mysql_real_escape_string($_POST['motocykle'])."',
		offroad = '".mysql_real_escape_string($_POST['offroad'])."',
		auta_europejskie = '".mysql_real_escape_string($_POST['auta_europejskie'])."',
		auta_azjatyckie = '".mysql_real_escape_string($_POST['auta_azjatyckie'])."',
		auta_amerykanskie = '".mysql_real_escape_string($_POST['auta_amerykanskie'])."',
		blacharstwo_lakiernictwo = '".mysql_real_escape_string($_POST['blacharstwo_lakiernictwo'])."',
		naprawy_przegladowe = '".mysql_real_escape_string($_POST['naprawy_przegladowe'])."',
		naprawy_silnikow = '".mysql_real_escape_string($_POST['naprawy_silnikow'])."',
		wulkanizacja = '".mysql_real_escape_string($_POST['wulkanizacja'])."',
		diagnostyka_komputerowa = '".mysql_real_escape_string($_POST['diagnostyka_komputerowa'])."',
		tlumiki_wymiana = '".mysql_real_escape_string($_POST['tlumiki_wymiana'])."',
		elektromechanika = '".mysql_real_escape_string($_POST['elektromechanika'])."',
		instalacje_gazowe = '".mysql_real_escape_string($_POST['instalacje_gazowe'])."',
		serwis_klimatyzacji = '".mysql_real_escape_string($_POST['serwis_klimatyzacji'])."',
		stacja_diagnostyczna = '".mysql_real_escape_string($_POST['stacja_diagnostyczna'])."',
		turbosprezarki_naprawa = '".mysql_real_escape_string($_POST['turbosprezarki_naprawa'])."',
		naprawa_skrzyni_biegow = '".mysql_real_escape_string($_POST['naprawa_skrzyni_biegow'])."',
		wtryski_regeneracja = '".mysql_real_escape_string($_POST['wtryski_regeneracja'])."'
		WHERE warsztat_id = '$id'";
		$query = mysql_query($update) or die(mysql_error());
		
		
		
		$ile_plikow = count($_FILES['plik']['name']);
		
		for($i=1; $i<=$ile_plikow; $i++){
		
			$folder_user = 'images/biblioteka/warsztaty/';
			$folder_user_miniatury = 'images/biblioteka/warsztaty/miniatury/';
			
			if(!is_dir($folder_user)){
				mkdir($folder_user);
				chmod($folder_user, 0777);
			}
			
			if(!is_dir($folder_user_miniatury)){
				mkdir($folder_user_miniatury);
				chmod($folder_user_miniatury, 0777);
			} 
				
				$rozszerzenie = pathinfo($_FILES['plik']['name'][($i-1)]);
				
				$fileType = $rozszerzenie['extension'];
				
				$fileNameReal = $_FILES['plik']['name'][($i-1)];
				$zmiennaDaty = date("Ymd-hsi").'-'.rand(0,10000);
				$fileName = $zmiennaDaty.'.'.$fileType;
				$fileName_do_bazy = $zmiennaDaty.'.'.$fileType;
			
			if($_FILES['plik']['tmp_name'][($i-1)]!=''){
				if($fileType == 'jpg' or $fileType == 'jpeg' or $fileType == 'gif' or $fileType == 'png'){
					if(move_uploaded_file($_FILES['plik']['tmp_name'][($i-1)], $folder_user.$fileName)){
						
						$insert = "INSERT INTO warsztaty_foto VALUES('','$id','$fileName')";
						$query = mysql_query($insert) or die(mysql_error());
						
						//// wykonanie miniatury ////
						$image_tempname = $folder_user.$fileName;
						list($width, $height, $type, $attr) = getimagesize($image_tempname);
						
						$thumb_height = 120;
						$thumb_width = $width/($height/120);
						
						if($type == 2){
							$largeimage = imagecreatefromjpeg($image_tempname);
							$f = 'imagejpeg';
						}
						
						if($type == 1){
							$largeimage = imagecreatefromgif($image_tempname);
								$f = 'imagegif';}
						
						if($type == 3){
							$largeimage = imagecreatefrompng($image_tempname);
							imagealphablending($largeimage, false);
							imagesavealpha($largeimage, true);
								$f = 'imagepng';
						}
							
						$thumb = imagecreatetruecolor($thumb_width, $thumb_height);
						imagealphablending($thumb, false);
						imagesavealpha($thumb, true);
						imagecopyresampled($thumb, $largeimage, 0,0,0,0, $thumb_width, $thumb_height, $width, $height);
						$f($thumb, $folder_user_miniatury.$fileName);
						imagedestroy($largeimage);
						imagedestroy($thumb);
						/////////////////////////////
						
						//// wykonanie podgladu ////						
						$image_tempname = $folder_user.$fileName;
						
						list($width, $height, $type, $attr) = getimagesize($image_tempname);
						
							if($height>600){
								$thumb_height = 600;
								$thumb_width = $width/($height/$thumb_height);
								
								if($type == 2){
								$largeimage = imagecreatefromjpeg($image_tempname);
								$f = 'imagejpeg';
							}
							
							if($type == 1){
								$largeimage = imagecreatefromgif($image_tempname);
									$f = 'imagegif';}
							
							if($type == 3){
								$largeimage = imagecreatefrompng($image_tempname);
								imagealphablending($largeimage, false);
								imagesavealpha($largeimage, true);
									$f = 'imagepng';
							}
								
							$thumb = imagecreatetruecolor($thumb_width, $thumb_height);
							imagealphablending($thumb, false);
							imagesavealpha($thumb, true);
							imagecopyresampled($thumb, $largeimage, 0,0,0,0, $thumb_width, $thumb_height, $width, $height);
							
							$f($thumb, $folder_user.$fileName, 100);
							
						}
						/////////////////////////////		
						
					}else{
						//echo 'nie udalo sie';
					}
				}else{
					//echo 'plik niepoprawnego formatu';
				}
			}else{
				//echo 'brak pliku';
			}
		}
		
		
		/////////////// logo ////////////
		$ile_plikow = count($_FILES['logo']['name']);
		
		for($i=1; $i<=$ile_plikow; $i++){
		
			$folder_user = 'images/biblioteka/warsztaty/';
			$folder_user_miniatury = 'images/biblioteka/warsztaty/miniatury/';
			
			if(!is_dir($folder_user)){
				mkdir($folder_user);
				chmod($folder_user, 0777);
			}
			
			if(!is_dir($folder_user_miniatury)){
				mkdir($folder_user_miniatury);
				chmod($folder_user_miniatury, 0777);
			} 
				
				$rozszerzenie = pathinfo($_FILES['logo']['name'][($i-1)]);
				
				$fileType = $rozszerzenie['extension'];
				
				$fileNameReal = $_FILES['logo']['name'][($i-1)];
				$zmiennaDaty = date("Ymd-hsi").'-'.rand(0,10000);
				$fileName = $zmiennaDaty.'.'.$fileType;
				$fileName_do_bazy = $zmiennaDaty.'.'.$fileType;
			
			if($_FILES['logo']['tmp_name'][($i-1)]!=''){
				if($fileType == 'jpg' or $fileType == 'jpeg' or $fileType == 'gif' or $fileType == 'png'){
					if(move_uploaded_file($_FILES['logo']['tmp_name'][($i-1)], $folder_user.$fileName)){
					
						$foto_id = mysql_real_escape_string($_POST['usun_foto']);
	
						$select = "SELECT logo FROM warsztaty WHERE warsztat_id = '$id'";
						$query = mysql_query($select) or die(mysql_error());
						$row = mysql_fetch_array($query);
						
						@unlink('images/biblioteka/warsztaty/miniatury/'.$row['nazwa_pliku']);
						@unlink('images/biblioteka/warsztaty/'.$row['nazwa_pliku']);
							
						$insert = "UPDATE warsztaty SET logo = '$fileName' WHERE warsztat_id = '$id'";
						$query = mysql_query($insert) or die(mysql_error());
						
						/////// wykonanie miniatury ///////
						$image_tempname = $folder_user.$fileName;
						list($width, $height, $type, $attr) = getimagesize($image_tempname);
						
						$thumb_height = 120;
						$thumb_width = $width/($height/120);
						
						if($type == 2){
							$largeimage = imagecreatefromjpeg($image_tempname);
							$f = 'imagejpeg';
						}
						
						if($type == 1){
							$largeimage = imagecreatefromgif($image_tempname);
								$f = 'imagegif';}
						
						if($type == 3){
							$largeimage = imagecreatefrompng($image_tempname);
							imagealphablending($largeimage, false);
							imagesavealpha($largeimage, true);
								$f = 'imagepng';
						}
							
						$thumb = imagecreatetruecolor($thumb_width, $thumb_height);
						imagealphablending($thumb, false);
						imagesavealpha($thumb, true);
						imagecopyresampled($thumb, $largeimage, 0,0,0,0, $thumb_width, $thumb_height, $width, $height);
						$f($thumb, $folder_user_miniatury.$fileName);
						imagedestroy($largeimage);
						imagedestroy($thumb);
						/////////////////////////////
						
					}else{
						//echo 'nie udalo sie';
					}
				}else{
					//echo 'plik niepoprawnego formatu';
				}
			}else{
				//echo 'brak pliku';
			}
		}
		/////////////// logo ////////////
		$_SESSION['msq'] = 'Wprowadzone zmiany zostały zapisane.';
	}

	$select = "SELECT * FROM warsztaty WHERE warsztat_id = '$id'";
	$query = mysql_query($select) or die(mysql_error());
	$row = mysql_fetch_array($query);
	
	$trescStrony .= '<div class="content szukaj_warsztatu">';
	$trescStrony .= '<div class="naglowek">
	
	<p style="float:right; margin-top:-10px;"><input type="submit" name="wyloguj" value="Wyloguj się" class="btn" /></p>
	
	Edycja warsztatu
	
	</div>';
	$trescStrony .= '<form action="" method="post" style="width:100%;" enctype="multipart/form-data">
	
				<input id="latitude" type="hidden" name="szerokosc" value="'.$row['szerokosc'].'" />
				<input id="longitude" type="hidden" name="wysokosc" value="'.$row['wysokosc'].'" />';
	
	if($row['status']==0){			
		$trescStrony .= '<p style="padding:10px; background:#EEEEEE">Warsztat jest jeszcze nieaktywny, wkrótce zostanie potwierdzony i włączony w naszym systemie.</p>';
	}
	
	$trescStrony .= '
	<p><input type="submit" name="zapisz" value="Zapisz zmiany" class="btn" /></p><br />
	
		<div class="tdek">
			<p><span>Nazwa:</span> <input type="text" name="nazwa" value="'.$row['nazwa'].'" /></p>
			<p><span>Telefon:</span> <input type="text" name="telefon" value="'.$row['telefon'].'" /></p>
		</div>
		
		<div class="tdek">
			<p><span>Strona www:</span> <input type="text" name="strona_www" value="'.$row['strona_www'].'" /></p>
			<p><span>E-mail:</span> <input type="text" name="email" value="'.$row['email'].'" /></p>
		</div>
		
		<div class="tdek">
			<p><span>Adres:</span> <input type="text" name="adres" value="'.$row['adres'].'" /></p>
			<p><span>Miasto:</span> <input type="text" name="miasto" value="'.$row['miasto'].'" /></p>
		</div>
		
		<br style="clear:both;" />
		<br style="clear:both;" />
		<div style="float:left;">
			<textarea name="opis" style="width:800px; height:400px;">'.$row['opis'].'</textarea>
			<br style="clear:both;" />
			
			
			<div class="galeria_warsztatu">
				<p><b>Dodaj logo warsztatu</b></p>
				
				<p><input type="file" name="logo[]" /></p>
			
				<p><b>Galeria warsztatu</b></p>
				
				<p><input type="file" name="plik[]" multiple="multiple"/></p>
				
				<div class="" style="clear:left; float:left; width:800px;">';
				
				$selectF = "SELECT * FROM warsztaty_foto WHERE warsztat_id = '$id'";
				$queryF = mysql_query($selectF) or die(mysql_error());
				while($rowF = mysql_fetch_array($queryF)){
					$trescStrony .= '
					<div class="foto_warsztat">
						<div class="tr">
							<div class="td">
								<img src="images/biblioteka/warsztaty/miniatury/'.$rowF['nazwa_pliku'].'" />
								<input type="submit" name="usun_foto" class="usun" value="'.$rowF['foto_id'].'" />
							</div>
						</div>
					</div>';
				}
				
		$trescStrony .= '</div>
		
			<br style="clear:both;" /><br style="clear:both;" />
			
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script>
<script type="text/javascript" src="http://google-maps-utility-library-v3.googlecode.com/svn/trunk/markerclusterer/src/markerclusterer.js"></script>
			<p>Przesuń punkt na mapie, aby zaktualizować lokalizacje:</p>
			<div id="map_canvas" style="height:300px;"></div>
		
			</div>
		</div>
		<div style="float:right; margin-right:30px;">
			<p><b>Naprawy</b></p>
			<p><input type="checkbox" name="auta_osobowe" value="1" '.(($row['auta_osobowe']=='1')?'checked="checked"':'').' />&nbsp;&nbsp;auta osobowe</p>
			<p><input type="checkbox" name="busy" value="1" '.(($row['busy']=='1')?'checked="checked"':'').'  />&nbsp;&nbsp;busy</p>
			<p><input type="checkbox" name="motocykle" value="1" '.(($row['motocykle']=='1')?'checked="checked"':'').'  />&nbsp;&nbsp;motocykle</p>
			<p><input type="checkbox" name="offroad" value="1" '.(($row['offroad']=='1')?'checked="checked"':'').'  />&nbsp;&nbsp;offroad4x4</p>
			
			<p><b>Specjalizacja rodzaju</b></p>
			<p><input type="checkbox" name="auta_europejskie" value="1" '.(($row['auta_europejskie']=='1')?'checked="checked"':'').'  />&nbsp;&nbsp;auta europejskie</p>
			<p><input type="checkbox" name="auta_azjatyckie" value="1" '.(($row['auta_azjatyckie']=='1')?'checked="checked"':'').'  />&nbsp;&nbsp;auta azjatyckie</p>
			<p><input type="checkbox" name="auta_amerykanskie" value="1" '.(($row['auta_amerykanskie']=='1')?'checked="checked"':'').'  />&nbsp;&nbsp;auta amerykanskie</p>
			
			<p><b>Specjalizacja napraw:</b></p>
			<p><input type="checkbox" name="blacharstwo_lakiernictwo" value="1" '.(($row['blacharstwo_lakiernictwo']=='1')?'checked="checked"':'').'  />&nbsp;&nbsp;blacharstwo, lakiernictwo</p>
			<p><input type="checkbox" name="naprawy_przegladowe" value="1" '.(($row['naprawy_przegladowe']=='1')?'checked="checked"':'').'  />&nbsp;&nbsp;naprawy przeglądowe</p>
			<p><input type="checkbox" name="naprawy_silnikow" value="1" '.(($row['naprawy_silnikow']=='1')?'checked="checked"':'').'  />&nbsp;&nbsp;naprawy silników</p>
			<p><input type="checkbox" name="wulkanizacja" value="1" '.(($row['wulkanizacja']=='1')?'checked="checked"':'').'  />&nbsp;&nbsp;wulkanizacja - wymiana opon</p>
			<p><input type="checkbox" name="diagnostyka_komputerowa" value="1" '.(($row['diagnostyka_komputerowa']=='1')?'checked="checked"':'').'  />&nbsp;&nbsp;diagnostyka komputerowa</p>
			<p><input type="checkbox" name="tlumiki_wymiana" value="1" '.(($row['tlumiki_wymiana']=='1')?'checked="checked"':'').'  />&nbsp;&nbsp;tłumiki wymiana</p>
			<p><input type="checkbox" name="elektromechanika" value="1" '.(($row['elektromechanika']=='1')?'checked="checked"':'').'  />&nbsp;&nbsp;elektromechanika</p>
			<p><input type="checkbox" name="instalacje_gazowe" value="1" '.(($row['instalacje_gazowe']=='1')?'checked="checked"':'').'  />&nbsp;&nbsp;instalacje gazowe</p>
			<p><input type="checkbox" name="serwis_klimatyzacji" value="1" '.(($row['serwis_klimatyzacji']=='1')?'checked="checked"':'').'  />&nbsp;&nbsp;serwis klimatyzacji</p>
			<p><input type="checkbox" name="stacja_diagnostyczna" value="1" '.(($row['stacja_diagnostyczna']=='1')?'checked="checked"':'').'  />&nbsp;&nbsp;stacja_diagnostyczna</p>
			<p><input type="checkbox" name="turbosprezarki_naprawa" value="1" '.(($row['turbosprezarki_naprawa']=='1')?'checked="checked"':'').'  />&nbsp;&nbsp;turbosprezarki naprawa</p>
			<p><input type="checkbox" name="naprawa_skrzyni_biegow" value="1" '.(($row['naprawa_skrzyni_biegow']=='1')?'checked="checked"':'').'  />&nbsp;&nbsp;naprawa skrzyni biegów</p>
			<p><input type="checkbox" name="wtryski_regeneracja" value="1" '.(($row['wtryski_regeneracja']=='1')?'checked="checked"':'').'  />&nbsp;&nbsp;wtryski regeneracja</p>
		</div>
	</form>';
	$trescStrony .= '</div><div class="clearboth"></div>';
	
	
	
$trescStrony .= '<script type="text/javascript">

	var map ;
	var marker ;
	 
	function initialize() { ';
		if($row['szerokosc']==''){
			$trescStrony .= 'var lat = 50.85404 ;
			var long = 20.615641 ;';
		}else{
			$trescStrony .= 'var lat = '.$row['szerokosc'].' ;
			var long = '.$row['wysokosc'].';';
		}
		
		$trescStrony .= '
		var latlng = new google.maps.LatLng(lat, long);
		var myOptions = {
			zoom: 9,
			center: latlng,
			mapTypeId: google.maps.MapTypeId.ROADMAP
		}
		;
		map = new google.maps.Map(document.getElementById("map_canvas"),myOptions);
		google.maps.event.addListener(map, \'click\', function(event) {
				add_marker(event.latLng, \'miejsce\', \'opis\' );
			}
		);
			
		
		var opcjeMarkera =
		{
			position: latlng,
			map: map,
			draggable: true
		}
		var marker2 = new google.maps.Marker(opcjeMarkera);
		google.maps.event.addListener(marker2, \'drag\', function() {
			updateMarkerPosition(marker2.getPosition());
		}
		);
	}

	function updateMarkerPosition(latLng) {   	
		 $("#latitude").val([latLng.lat()]);
		 $("#longitude").val([latLng.lng()]);
	}
	 

	$(document).ready(function(){
		initialize();		
	});
	
	
	</script>';
?>