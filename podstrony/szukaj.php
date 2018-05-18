<?PHP
$trescStrony .= '<p>Szukana fraza: <i>"'.$_POST['szukaj_fraze'].'"</i>';

$szukana_fraza = addslashes($_POST['szukaj_fraze']);
$select = "SELECT * FROM artykuly WHERE tresc_artykulu LIKE '%$szukana_fraza%'";
$query = mysql_query($select) or die(mysql_error());
if(mysql_num_rows($query)>0){
$trescStrony .= '<br />Znaleziono elementów: '.mysql_num_rows($query).'</p><br />';

while($row = mysql_fetch_array($query)){
		$trescStrony .= '
		<div class="streszczenia_artykulu">
			<h4><a href="'.$row['id_kategorii'].'/'.$row['id_artykulu'].'-'.usun_znaki_specjalne($row['tytul_artykulu']).'.html">
			'.$row['tytul_artykulu'].'</a></h4>
			<p>'.substr(strip_tags($row['tresc_artykulu']),0,$dlugoscSkroconegoArtykulu).'...</p>
		</div>';
	}
}else{
$trescStrony .= '<br />Znaleziono elementów: 0</p><br />';
}
?>