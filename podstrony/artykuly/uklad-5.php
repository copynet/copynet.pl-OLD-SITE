<?PHP 

/* treść + formularz kontaktowy */
if(!isset($id_artykul)){
	$id_artykul = addslashes($_GET['id_artykul']);
}

$trescStrony .= stripslashes($row['tresc_artykulu']);
$trescStrony .= '
<div class="bg_kontakt">
	<img src="images/templatka/kontakt_image.jpg" class="fright" />
	<div class="form_kontaktowy">
		<h3>zadaj szybkie pytanie</h3>
		<form method="post" action="" enctype="multipart/form-data">
			<p>
			<input type="text" class="fleft" name="imie" value="" placeholder="Imie i nazwisko" /> 
			<input type="text" class="fright" name="telefon" value="" placeholder="E-mail" />
			</p>
			<p><textarea name="opis" rows="4" placeholder="Wiadomość"></textarea>
			<input type="submit" name="wyslij" value="wyślij" /></p>
		</form>
	<br /><br /><br />
	</div>
</div>';




if($tytulStrony == ''){
	$tytulStrony = stripslashes($row3['tytul_artykulu']);}

$opis_strony = stripslashes($row['opis_strony']);


if($opis_strony == ''){
	$tekst = str_replace('  ', ' ', stripslashes(strip_tags($row['tresc_artykulu'])));
	$tablica = array("\n", "\r", "\t", "  ");
	$tekst2 = str_replace($tablica, ' ', $tekst);
	$opis_strony = substr($tekst2, 0, 250);
}

$slowa_kluczowe = $row['slowa_kluczowe'];
include 'funkcje/wczytaj_mape.php';
include 'funkcje/wczytaj_zalaczniki.php';

?>