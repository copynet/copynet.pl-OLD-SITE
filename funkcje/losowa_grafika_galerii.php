<?php
$select = "SELECT fotki.*, artykuly.tytul_artykulu, artykuly.id_kategorii FROM fotki, artykuly
WHERE fotki.id_artykulu = artykuly.id_artykulu
ORDER BY RAND() LIMIT 2";
$query = mysql_query($select) or die(mysql_error());
while($row = mysql_fetch_array($query)){

echo '<center>
<a href="'.LANG.$row['id_kategorii'].'/'.$row['id_artykulu'].'-'.usun_znaki_specjalne($row['tytul_artykulu']).'.html">
<img src="images/biblioteka/miniatury/'.$row['nazwa_miniaturki'].'" border="0" />
</a>
</center>';
}
?>