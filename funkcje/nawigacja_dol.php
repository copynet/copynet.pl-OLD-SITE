<?PHP
	if($ile_podstron > 1){
	$trescStrony .= '<br style="clear:both" />';
	$trescStrony .= '<div id="navigacja">';
		for($i=1;$i<=$ile_podstron;$i++){
			if($i==1){  /// wyswietlanie linku bez podstrony 1,23-Informacje.html tylko 23-Informacje.html
				$trescStrony .= '<a class="navi';
				if($page==0){ $trescStrony .= ' aktywny'; } ///doklejenie statusu aktywności do pierwszego elementów
				$trescStrony .= '" href="./'.usun_znaki_specjalne($row['alias_kategorii']).'.html">'.$i.'</a>';
			}else{
				$trescStrony .= '<a class="navi';
				if(($page+1)==$i){ $trescStrony .= ' aktywny'; } ///doklejenie statusu aktywności do pierwszego elementów
				$trescStrony .= '" href="./'.($i-1).','.usun_znaki_specjalne($row['alias_kategorii']).'.html">'.$i.'</a>';
			}
		}
	$trescStrony .= '</div>';
	}
?>