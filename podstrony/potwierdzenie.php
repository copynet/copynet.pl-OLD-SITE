<?
$select = "SELECT tresc_artykulu FROM artykuly WHERE id_artykulu = 50";
$query = mysql_query($select) or die(mysql_error());
$rowArt = mysql_fetch_array($query);
$trescStrony .=  $rowArt['tresc_artykulu'];
?>