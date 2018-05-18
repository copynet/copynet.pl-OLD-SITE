<?PHP
/// tytuły + streszczenie
include 'funkcje/nawigacja_gora.php';

	$select2 = "SELECT alias_artykulu, tytul_artykulu, SUBSTRING(tresc_artykulu,0,301) as tresc_artykulu2, data_dodania 
	FROM artykuly 
	WHERE id_kategorii= '".$row['id_kategoria']."'
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
			<h2><a href="'.LANG.$alias_kategorii.'/'.$row2['alias_artykulu'].'.html">'.$row2['tytul_artykulu'].'</a></h2>
			<p>'.strip_tags($row2['tresc_artykulu2']).'... <a class="wiecej" href="'.LANG.$id_kategoria.'/'.$row2['alias_artykulu'].'.html">więcej...</a></p>
		</div>';
	}
	
include 'funkcje/nawigacja_dol.php';
?>