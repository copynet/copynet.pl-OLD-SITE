<?PHP
//treść + galeria u gory

//$trescStrony .= '<div class="naglowek">'.stripslashes($row['tytul_artykulu']).'</div><br style="clear:left" />';

if($row3['sonda']==1){
	include 'funkcje/sonda.php';
}

$select_galeria = "SELECT * FROM fotki WHERE id_artykulu = '$id_artykul'";
$query_galeria = mysql_query($select_galeria) or die(mysql_error());

$trescStrony .= '<center>
<div>';
while($row_galeria = mysql_fetch_array($query_galeria)){
	$trescStrony .= '
 <a class="pirobox galeria" href="images/biblioteka/'.$row_galeria['nazwa_pliku'].'" title="'.$row['tytul_artykulu'].' - Foto '.$row_galeria['id_fotki'].'">
  <div class="obrazek-galerii" style="background: white url(images/biblioteka/'.$row_galeria['nazwa_miniaturki'].') no-repeat center;"></div>
  </a>
	';
}

$trescStrony .= '
</div>
</center>
<br style="clear:both"/>';

$trescStrony .= stripslashes($row['tresc_artykulu']);
if($tytulStrony == ''){
	$tytulStrony = stripslashes($row['tytul_artykulu']);}

$opis_strony = stripslashes($row['opis_strony']);
if($opis_strony == ''){
	$tekst = str_replace('  ', ' ', stripslashes(strip_tags($row['tresc_artykulu'])));
	$tablica = array("\n", "\r", "\t", "  ");
	$tekst2 = str_replace($tablica, ' ', $tekst);
	$opis_strony = substr($tekst2, 0, 250);
}

$slowa_kluczowe = stripslashes($row['slowa_kluczowe']);

include 'funkcje/wczytaj_mape.php';
include 'funkcje/wczytaj_zalaczniki.php';
?>