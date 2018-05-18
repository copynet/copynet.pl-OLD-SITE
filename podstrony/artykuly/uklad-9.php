<?PHP
/* przekierowanie na adres w treści */ 
header("Location: ".$domena.'/'.strip_tags($row['tresc_artykulu']));
?>