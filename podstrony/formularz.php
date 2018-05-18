<?
	
			$alias_kategorii = 'czesci';
			$select = "SELECT id_parent FROM kategorie WHERE alias_kategorii = '$alias_kategorii'";
			$query = mysql_query($select);
			$row = mysql_fetch_array($query);
			if($row['id_parent']>0){
				$menu_lewe .= menu(11,0);
			}
			
			if($menu_lewe!=''){
				$class = 'width800';
				$trescStrony .= '<div class="menu_lewe">'.$menu_lewe.'</div>';
			}
		
		$trescStrony .= '<div class="content '.$class.' formularz">
			<br style="clear:left" />
			<p>Aby w prosty sposób zamówić potrzebną część  zachęcamy Państwa do skorzystania z formularza zamówieniowego.<br />Prosimy  dokładnie wypełnić wymagane pola ,w tym celu należy zapoznać się  zamieszczonymi poniżej wskazówkami.<br />Pracownik Biura Obsługi Klienta skonsultuje się z Państwem natychmiast po odnalezieniu poszukiwanych produktów.</p>
		';
		
		
		$trescStrony .= '
		
			<br style="clear:left" />
			<div class="formularz_zamowienia">
				<form action="" method="post">
					<div style="float:left;">
						<p>Marka samochodu *</p>
						<p><input type="text" name="marka" placeholder="Marka" value="" /></p>
						<p>Rok *</p>
						<p><input type="text" name="rok" placeholder="Rok produkcji" value="" /></p>
						<p>Moc silnika (kW) *</p>
						<p><input type="text" name="moc" placeholder="Moc silnika" value="" /></p>
						<p>Telefon *</p>
						<p><input type="text" name="telefon" placeholder="Telefon" value="" /></p>
					</div>
					<div style="float:left; margin-left:10px;">
						<p>Model *</p>
						<p><input type="text" name="model" placeholder="Model"  value="" /></p>
						<p>Pojemność silnika*</p>
						<p><input type="text" name="pojemnosc" placeholder="Pojemność silnika"  value="" /></p>
						<p>nr VIN *</p>
						<p><input type="text" name="vin" placeholder="VIN"  value="" /></p>
						<p>E-mail *</p>
						<p><input type="text" name="email" placeholder="E-mail"  value="" /></p>
					</div>			
					<p>Opis</p>
					<p><textarea name="opis" placeholder="Opis poszukiwanego produktu"></textarea></p>
					<p><input type="submit" style="background:#FC0203 url(images/bg_form_btn.jpg) bottom center repeat-x; border:none; text-shadow:none; font-weight:bold; width:150px; color:white;border-radius:7px; padding:10px" name="zapytaj_sprzedawce" class="btn" value="wyślij zapytanie" /></p>
					
				</form>
			</div>';
			
			$select = "SELECT * FROM artykuly WHERE id_artykulu = '48'";
			$query = mysql_query($select) or die(mysql_error());
			$row = mysql_fetch_array($query);
			$trescStrony .= $row['tresc_artykulu'];
			
			$trescStrony .= '<br style="clear:both" /><br style="clear:both" />
			<div class="img_form">
			<center><a class="pirobox galeria" href="http://ktmotors.pl/images/biblioteka/skan_dowodu2.png"><img src="http://ktmotors.pl/images/biblioteka/skan_dowodu.png" /></a></center>
			<center><a class="pirobox galeria" href="http://ktmotors.pl/images/biblioteka/maxa/oleje_silnikowe_ok.jpg"><img src="http://ktmotors.pl/images/biblioteka/maxa/oleje_silnikowe_ok.jpg" style="width:795px" /></a></center>
			<center><a class="pirobox galeria" href="http://ktmotors.pl/images/shell_maly2.jpg"><img src="http://ktmotors.pl/images/shell_maly.jpg" /></a></center>
			<center><a class="pirobox galeria" href="http://ktmotors.pl/images/aku.jpg" title=""><img src="http://ktmotors.pl/images/aku_maly.jpg" /></a></center>
			</div>
		</div>
		
		<br style="clear:both" />';		
		
?>