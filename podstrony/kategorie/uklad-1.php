<?PHP
/// tytuły + streszczenie + fotka
include 'funkcje/nawigacja_gora.php';

	$select2 = "SELECT alias_artykulu, tytul_artykulu, data_dodania 
	FROM artykuly 
	WHERE id_kategorii='".$row['id_kategoria']."'
	AND status = 3
	ORDER BY id_artykulu DESC
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
		<h2><a href="'.LANG.$alias_kategorii.'/'.$row2['alias_artykulu'].'.html">'.$row2['tytul_artykulu'].'</a></h2>
		</div>';
	}
	
include 'funkcje/nawigacja_dol.php';
?>