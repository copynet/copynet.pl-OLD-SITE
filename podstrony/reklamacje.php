<?
if(isset($_POST['wyslij_zwrot'])){
	$zwracajacy = $_POST['zwracajacy'];
	$i=0;
	$trescListu .= '<p><b>Zwracajacy:</b><br />'.$zwracajacy.'</p>
	
	<table style="padding:10px; border:1px solid black; border-collapse:collapse;"><tr>
			<td style="padding:10px; border:1px solid black;"></td>
			<td style="padding:10px; border:1px solid black;">Symbol</td>
			<td style="padding:10px; border:1px solid black;">Ilość</td>
			<td style="padding:10px; border:1px solid black;">Numer</td>
			<td style="padding:10px; border:1px solid black;">Przyczyna</td>
			</tr>';
		
	foreach($_POST['symbol'] as $k => $v){
		if($v != ''){
			$i++;
			$symbol = $v;
			$ilosc = $_POST['ilosc'][$k];
			$numer = $_POST['numer'][$k];
			$przyczyna = $_POST['przyczyna'][$k];
			$trescListu .= '<tr>
			<td style="padding:10px; border:1px solid black;">'.$i.'.</td>
			<td style="padding:10px; border:1px solid black;">'.$symbol.'</td>
			<td style="padding:10px; border:1px solid black;">'.$ilosc.'</td>
			<td style="padding:10px; border:1px solid black;">'.$numer.'</td>
			<td style="padding:10px; border:1px solid black;">'.$przyczyna.'</td>
			</tr>';
		}
	}
	$trescListu .= '</table>';
	
	//$trescStrony .= $trescListu;   zwroty-reklamacje@copynet.nazwa.pl
	
	sendmailPHPM('zwroty-reklamacje@copynet.nazwa.pl','Formularz zwrotu',$trescListu,'Strona www','zwroty-reklamacje@copynet.nazwa.pl');
	//sendmailPHPM('szef@maxdesign.pl','Formularz zwrotu',$trescListu,'Strona www','szef@maxdesign.pl');
	//sendmailPHPM('yotes86@gmail.com','Formularz zwrotu',$trescListu,'Strona www','yotes86@gmail.com');
    $_SESSION['msq'] = 'Dziękujemy za wiadomość';
}

			$menu_lewe .= menu(12,0);
			if($menu_lewe!=''){
				$class = 'width800';
				$trescStrony .= '<div class="menu_lewe">'.$menu_lewe.'</div>';
			}
			$trescStrony .= '<div class="content '.$class.' formularz_zwrotu">
				<h2 style="margin:10px;">Zgłoszenie zwrotu towaru K.T. Motors S.C.</h2>
				<p>Zwracający:</p>
				<form action="" method="post">
					<p><textarea name="zwracajacy"></textarea></p>
					<table>
						<tr><td>L. P.</td><td>Symbol towaru</td><td>Ilość</td><td>Nr dokumentu</td><td>Przyczyna zwrotu</td></tr>
						<tr>
							<td>1.</td>
							<td><input type="text" name="symbol[]" /></td>
							<td><input type="text" name="ilosc[]" /></td>
							<td><input type="text" name="numer[]" /></td>
							<td><input type="text" name="przyczyna[]" /></td>							
						</tr><tr>
							<td>1.</td>
							<td><input type="text" name="symbol[]" /></td>
							<td><input type="text" name="ilosc[]" /></td>
							<td><input type="text" name="numer[]" /></td>
							<td><input type="text" name="przyczyna[]" /></td>							
						</tr><tr>
							<td>2.</td>
							<td><input type="text" name="symbol[]" /></td>
							<td><input type="text" name="ilosc[]" /></td>
							<td><input type="text" name="numer[]" /></td>
							<td><input type="text" name="przyczyna[]" /></td>							
						</tr><tr>
							<td>3.</td>
							<td><input type="text" name="symbol[]" /></td>
							<td><input type="text" name="ilosc[]" /></td>
							<td><input type="text" name="numer[]" /></td>
							<td><input type="text" name="przyczyna[]" /></td>							
						</tr><tr>
							<td>4.</td>
							<td><input type="text" name="symbol[]" /></td>
							<td><input type="text" name="ilosc[]" /></td>
							<td><input type="text" name="numer[]" /></td>
							<td><input type="text" name="przyczyna[]" /></td>							
						</tr><tr>
							<td>5.</td>
							<td><input type="text" name="symbol[]" /></td>
							<td><input type="text" name="ilosc[]" /></td>
							<td><input type="text" name="numer[]" /></td>
							<td><input type="text" name="przyczyna[]" /></td>							
						</tr><tr>
							<td>6.</td>
							<td><input type="text" name="symbol[]" /></td>
							<td><input type="text" name="ilosc[]" /></td>
							<td><input type="text" name="numer[]" /></td>
							<td><input type="text" name="przyczyna[]" /></td>							
						</tr><tr>
							<td>7.</td>
							<td><input type="text" name="symbol[]" /></td>
							<td><input type="text" name="ilosc[]" /></td>
							<td><input type="text" name="numer[]" /></td>
							<td><input type="text" name="przyczyna[]" /></td>							
						</tr><tr>
							<td>8.</td>
							<td><input type="text" name="symbol[]" /></td>
							<td><input type="text" name="ilosc[]" /></td>
							<td><input type="text" name="numer[]" /></td>
							<td><input type="text" name="przyczyna[]" /></td>							
						</tr><tr>
							<td>9.</td>
							<td><input type="text" name="symbol[]" /></td>
							<td><input type="text" name="ilosc[]" /></td>
							<td><input type="text" name="numer[]" /></td>
							<td><input type="text" name="przyczyna[]" /></td>							
						</tr><tr>
							<td>10.</td>
							<td><input type="text" name="symbol[]" /></td>
							<td><input type="text" name="ilosc[]" /></td>
							<td><input type="text" name="numer[]" /></td>
							<td><input type="text" name="przyczyna[]" /></td>							
						</tr>
					</table>
					<input type="submit" name="wyslij_zwrot" value="Wyślij zwrot" />
				</form>
				
			</div><br style="clear:both" />';
?>