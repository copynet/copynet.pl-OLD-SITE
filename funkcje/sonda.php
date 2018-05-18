<?php

if(isset($_POST['glosuj'])){
	$id_pytania = addslashes($_POST['id_pytania']);
	$odpowiedz = addslashes($_POST['odpowiedz']);
	$ip_user = $_SERVER['REMOTE_ADDR'];
	
	$select = "SELECT id_sonda_pytanie FROM sonda_odpowiedzi WHERE id_sonda_odpowiedz = '$odpowiedz'";
	$query = mysql_query($select) or die(mysql_error());
	$row = mysql_fetch_array($query);
	
	$insert = "INSERT INTO sonda_glosy VALUES ('', '".$row['id_sonda_pytanie']."', '$odpowiedz', '$ip_user')";
	$query = mysql_query($insert) or die(mysql_error());	
}

$ip_user = $_SERVER['REMOTE_ADDR'];
$selectOdpowiedzi = "SELECT sonda_glosy.id_sonda_glosy, 
							sonda_pytanie.id_sonda_pytanie, 
							sonda_pytanie.id_artykulu
					FROM sonda_glosy, sonda_pytanie
					WHERE sonda_pytanie.id_artykulu = '$id_artykul'
					AND sonda_glosy.id_sonda_pytanie = sonda_pytanie.id_sonda_pytanie
					AND sonda_glosy.ip_user = '$ip_user'";
					
$queryOdpowiedzi = mysql_query($selectOdpowiedzi) or die(mysql_error());
$ile_glosow = mysql_num_rows($queryOdpowiedzi);

$select = "SELECT * FROM sonda_pytanie WHERE sonda_pytanie.id_artykulu = '$id_artykul' ORDER BY id_sonda_pytanie";
$query = mysql_query($select) or die(mysql_error());

$trescStrony .= '
<div id="sonda">';
$trescStrony .= '<form action="" method="post">';
while($row = mysql_fetch_array($query)){
	
	$trescStrony .= '<p class="pytanie">'.$row['sonda_pytanie'].'</p>
	<input type="hidden" name="id_pytania" value="'.$row['id_sonda_pytanie'].'" />';
	
		$select2 = "SELECT * FROM sonda_odpowiedzi WHERE id_sonda_pytanie = '".$row['id_sonda_pytanie']."'";
		$query2 = mysql_query($select2) or die(mysql_error());
		while($row2 = mysql_fetch_array($query2)){
			if($ile_glosow > 0){ // jesli juz oddałes głos zobacz wyniki
						//// liczmy oddane glosy ////
						$trescStrony .= '<p class="odpowiedzi">'.$row2['sonda_odpowiedz'].'</p>';
						$selectIleGlosow = "SELECT COUNT(sonda_glosy.id_sonda_pytanie) AS wszystkie, sonda_pytanie.id_sonda_pytanie FROM sonda_glosy, sonda_pytanie
						WHERE sonda_pytanie.id_artykulu = '$id_artykul'
						AND sonda_glosy.id_sonda_pytanie = sonda_pytanie.id_sonda_pytanie
						GROUP BY sonda_glosy.id_sonda_pytanie";
						$queryIleGlosow = mysql_query($selectIleGlosow) or die(mysql_error());
						$wszystkie++;
						while($rowek = mysql_fetch_array($queryIleGlosow)){
							$wszystkie += $rowek['wszystkie'];
						}
						
				
						$selectGlosy = "SELECT COUNT(id_sonda_odpowiedz) as ile FROM sonda_glosy WHERE id_sonda_odpowiedz = '".$row2['id_sonda_odpowiedz']."'";
						$queryGlosy = mysql_query($selectGlosy) or die(mysql_error());
						$ile = mysql_fetch_array($queryGlosy);
						if($wszystkie > 0){
							$procent = round($ile['ile']/$wszystkie * 100,2);
							$trescStrony .= '<span style="margin-top:-5px; float:right; font-size:8px; color:gray;">'.$procent.'% </span>
							<div style="height:5px; width:83%; background:silver;">
							<div style="height:5px; display:block; width:'.$procent.'%; background:red;"></div>
							</div>';
						}
						///////// ///// //// /// / // / ////// ///
			}else{ // jesli nie odales glosu wyswietl form
			
				$trescStrony .= '<p class="odpowiedzi">
				<input type="radio" name="odpowiedz" value="'.$row2['id_sonda_odpowiedz'].'" />
				'.$row2['sonda_odpowiedz'].'</p>';
			
			}
		}
}
	$trescStrony .= '<input type="submit" name="glosuj" value="Głosuj" /></form>';
$trescStrony .= '
</div>';

?>