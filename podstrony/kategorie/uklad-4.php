<?PHP
// bezpośredni link do artykulu
	$select2 = "SELECT * 
	FROM artykuly 
	WHERE id_kategorii='".$row['id_kategoria']."'
	ORDER BY id_artykulu LIMIT 1";
	$query2 = mysql_query($select2) or die(mysql_error());
	$row = mysql_fetch_array($query2);
  if(mysql_num_rows($query2)>0){
	$id_artykul = $row['id_artykulu'];
	include 'podstrony/artykuly/uklad-'.$row['id_uklad'].'.php';
  }else{
    $trescStrony .= '<b>Podstrona w trakcie budowy</b>';
  }
	
	
?>