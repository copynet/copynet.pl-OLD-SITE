<?PHP
/// tytuły + streszczenie + fotka
include 'funkcje/nawigacja_gora.php';

$trescStrony .= '<div class="naglowek">'.stripslashes($row['nazwa_kategorii']).'</div><br style="clear:left" />';

	$select2 = "SELECT id_artykulu, alias_artykulu, tytul_artykulu, tresc_artykulu, data_dodania
	FROM artykuly 
	WHERE id_kategorii='".$row['id_kategoria']."'
	AND status = 3
	ORDER BY data_dodania DESC
	LIMIT $start,$iloscArtykulowWKategorii";
	
	$query2 = mysql_query($select2) or die(mysql_error());
	
	if(mysql_num_rows($query2)==0){
		$trescStrony = 'Niestety nie znaleziono odpowiedniej podstrony';
		header("HTTP/1.0 404 Not Found");
		//header("Location: index.php");
	}
	while($row2 = mysql_fetch_array($query2)){
		$trescStrony .= '
		<div class="streszczenia_artykulu">
		<h2><a href="'.LANG.$alias_kategorii.'/'.$row2['alias_artykulu'].'.html">'.$row2['tytul_artykulu'].'</a></h2>';
		
		$selectFoto1 = "SELECT * FROM fotki WHERE id_artykulu='".$row2['id_artykulu']."'";

		$queryFoto1 = mysql_query($selectFoto1) or die(mysql_error());
		// jesli znalazł foty to je wyswietl
		if(mysql_num_rows($queryFoto1)>0){
			while($rowFoto1 = mysql_fetch_array($queryFoto1)){
				$trescStrony .= '
					<a class="pirobox galeria" href="images/biblioteka/'.$rowFoto1['nazwa_pliku'].'" title="Foto '.$rowFoto1['id_fotki'].'">
					 <div class="obrazek-galerii" style="background: url(images/biblioteka/'.$rowFoto1['nazwa_miniaturki'].') no-repeat center;"></div>
					</a>
				';
			}
		}
		
		$trescStrony .= '
			<p style="clear:both;">'.substr(strip_tags($row2['tresc_artykulu']),0,200).'...<a class="wiecej" href="'.LANG.$id_kategoria.'/'.$row2['alias_artykulu'].'.html">więcej...</a></p>
		</div>';
	}
	
include 'funkcje/nawigacja_dol.php';
?>