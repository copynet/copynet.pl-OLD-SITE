<?PHP
/******* OBSŁUGA JĘZYKÓW ****/
$lang = (addslashes($_GET['lang']));
$select = "SELECT * FROM jezyki WHERE nazwa_jezyk='$lang'";
$query = mysql_query($select) or die(mysql_error());

if(mysql_num_rows($query)==1){
	$row = mysql_fetch_array($query);
	define("LANG", strtolower($row['nazwa_jezyk']).'/');
	define("ID_LANG", $row['id_jezyk']);
	
}else{
	define("LANG", "");
	define("ID_LANG", "1");
}
/************/

function usun_znaki_specjalne($tekst){
	$tekst = strtolower($tekst);
	$zamienLitery = array("%","ą", "Ą", "ś", "Ś", "ż", "Ż", "ź", "Ź", "ć", "Ć", "ę", "Ę", "ń", "Ń", "ł", "Ł", "Ó", "ó", "+", "-", ",", "'", "\"", "\\", ".", "(", ")","&amp;", "&quot;", "!", " ", "-", "%26quot%3", "+", "/", "„", 'ü', 'ö', 'ä', 'ë', 'ï','Ü', 'Ä','Ë','Ÿ');
	$zamienniki =    array("","a", "A", "s", "S", "z", "Z", "z", "Z", "c", "C", "e", "E", "n", "N", "l", "L", "O", "o", "-", "-",  "", "",  "",    "",  "",  "",  "", "i",     "",       "",  "_", "_", "_", "_", "_", "", 'u','o','a','e','i', 'U', 'A','E','Y');
	$nazwa1 = str_replace($zamienLitery, $zamienniki, trim($tekst));
	
	$nazwa2 = urlencode($nazwa1);
	return($nazwa2);
}

function menu($kat, $poziom=0){
	$select = "SELECT * FROM kategorie, uklad_kategorii 
	WHERE kategorie.id_parent = $kat 
	AND kategorie.status_kategorii = 1
	AND kategorie.id_uklad = uklad_kategorii.id_uklad
	AND kategorie.id_jezyk = '".ID_LANG."'
	ORDER BY kategorie.kolejnosc";
	$query = mysql_query($select) or die(mysql_error());
	
	$poziom++;
	$z=0;
	
	if(mysql_num_rows($query)>0){
		$menu .= '<ul class="menu'.$kat.'">';
		while($row = mysql_fetch_array($query)){
			//$selectP = "SELECT id_kategoria FROM kategorie WHERE id_parent = '".$row['id_kategoria']."'";
			//$queryP = mysql_query($selectP) or die(mysql_error());
			//if(mysql_num_rows($queryP)>0){
			//	$menu .= '<li>';
			//}else{
				$menu .= '<li';
				if($_GET['alias_kategorii'] == $row['alias_kategorii']) $menu .= ' class="menu_activ" ';
				$menu .= '>';
			//}
			if($row['id_uklad']!=5){
				$menu .= '<a ';
				$menu .= 'href="';
				if(LANG != 'pl'){
					$menu .= LANG;
				}
				
				if($row['id_parent']!=0){
					$selectA = "SELECT alias_kategorii FROM kategorie WHERE id_kategoria = '".$row['id_parent']."' AND alias_kategorii!='menu'";
					$queryA = mysql_query($selectA) or die(mysql_error());
					$rowA = mysql_fetch_array($queryA);
					$alias_kat = $rowA['alias_kategorii'].'/';
				}
				
				$menu .= $alias_kat.$row['alias_kategorii'].'/">'.$row['nazwa_kategorii'].'</a>';
			}else{
				$menu .= $row['nazwa_kategorii'];
			}
			
			
			$menu .= menu($row['id_kategoria'],$poziom);
			$z++;
			$menu .= '</li>';
		}
		$menu .= '</ul>';
	}
	$poziom--;
	return $menu;
}

function menu_modul($kat, $poziom=0, $modul){
	$select = "SELECT * FROM kategorie, uklad_kategorii, moduly
	WHERE kategorie.id_parent = $kat 
	AND kategorie.status_kategorii = 1
	AND kategorie.id_uklad = uklad_kategorii.id_uklad
	AND moduly.nazwa_modul = '$modul'
	AND kategorie.id_modul = moduly.id_modul
	AND kategorie.id_jezyk = '".ID_LANG."'
	ORDER BY kategorie.kolejnosc";
	$query = mysql_query($select) or die(mysql_error());
	$ile = mysql_num_rows($query);
	$poziom++;
	$z=0;
	
	if($ile>0){
		echo '<ul class="glowne '.$modul.'">';
		while($row = mysql_fetch_array($query)){
			$z1++;
			$selectP = "SELECT id_kategoria FROM kategorie WHERE id_parent = '".$row['id_kategoria']."'";
			$queryP = mysql_query($selectP) or die(mysql_error());
			echo '<li class="glowne">';
			
			if($row['id_uklad']!=5){
				echo '<a class="abc" href="';
				if(LANG != 'pl'){
					echo LANG.'';
				}
				echo $row['alias_kategorii'].'.html">'.$row['nazwa_kategorii'].'</a>';
			}else{
				echo $row['nazwa_kategorii'];
			}
			menu($row['id_kategoria'],$poziom);
			$z++;
			echo '</li>';
		}
		echo '</ul>';
	}
	$poziom--;
	return $menu;
}

require 'admin/PHPMailer/class.phpmailer.php';
     
function sendmailPHPM($odbiorca,$tytul,$tresclistu,$nadawca,$nadawca_mail,$zalacznik = NULL) {
     
     //Create a new PHPMailer instance
     $mail = new PHPMailer();     
     $mail->CharSet = 'UTF-8';          
     //Set who the message is to be sent from
     $mail->setFrom($nadawca_mail, $nadawca);
     //Set who the message is to be sent to
     $mail->addAddress($odbiorca);
     //Set the subject line
     $mail->Subject = $tytul;
     $mail->IsHTML(true);
     $mail->Body = nl2br($tresclistu);
     
     //$mail->AddEmbeddedImage(SITE_PATH."images/template/logo.jpg", "logo", "logo.jpg", "base64","image/jpg");
     //if(!empty($zalacznik)) $mail->addAttachment($zalacznik);

     //send the message, check for errors
     if (!$mail->send()) {
          return  "Mailer Error: " . $mail->ErrorInfo;
          return MESSAGE_NOT_SENT;
     } else {
          return MESSAGE_SENT.'<strong>'.$odbiorca.'</strong>';
     }
}
?>