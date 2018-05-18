<?PHP
$select2 = "SELECT * 
	FROM artykuly 
	WHERE id_kategorii='".$row['id_kategoria']."'
	ORDER BY data_dodania DESC";
$query2 = mysql_query($select2) or die(mysql_error());
$ile_wszystkich = mysql_num_rows($query2);
$ile_podstron = ceil($ile_wszystkich/$iloscArtykulowWKategorii);

if(!isset($_GET['page'])){
	$page = 0;
}else{
	$page = addslashes($_GET['page']);
}

$start = $page*$iloscArtykulowWKategorii;
?>