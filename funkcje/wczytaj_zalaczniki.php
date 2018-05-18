<?PHP

$select_zalaczniki = "SELECT * FROM files WHERE id_artykulu = '$id_artykul'";
$query_zalaczniki = mysql_query($select_zalaczniki) or die(mysql_error());
if(mysql_num_rows($query_zalaczniki)>0){
	$trescStrony .= '<div class="zalaczniki">';
	while($row_zalaczniki = mysql_fetch_array($query_zalaczniki)){
		if(strpos($row_zalaczniki['nazwa_pliku'], '.doc')!==false){
			$trescStrony .='<p class="file_doc">';
		}
		elseif(strpos($row_zalaczniki['nazwa_pliku'], '.docx')!==false){
			$trescStrony .='<p class="file_docx">';
		}
		elseif(strpos($row_zalaczniki['nazwa_pliku'], '.pdf')!==false){
			$trescStrony .='<p class="file_pdf">';
		}
		elseif(strpos($row_zalaczniki['nazwa_pliku'], '.xls')!==false){
			$trescStrony .='<p class="file_xls">';
		}else{
			$trescStrony .='<p class="file_x">';
		}
		
		$trescStrony .= '
			<a href="images/biblioteka/zalaczniki/'.$row_zalaczniki['nazwa_pliku'].'">'.$row_zalaczniki['nazwa_wyswietlana'].'</a>
		</p>';
	}
	$trescStrony .= '</div>';
}

?>