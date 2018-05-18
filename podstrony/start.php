<?PHP
	// print_r($_GET);
	/// obsługa str głownej
	if(!isset($_GET['alias_kategorii']) AND !isset($_GET['alias_artykulu']) AND !isset($_GET['podstrona'])){
		
		$alias_artykulu = 'startowa';
		$select = "SELECT * FROM artykuly WHERE alias_artykulu = '$alias_artykulu'";
		$query = mysql_query($select) or die(mysql_error());
		if(mysql_num_rows($query)>0){
			$row = mysql_fetch_array($query);
			$id_artykul = $row['id_artykulu'];
			include 'podstrony/artykuly/uklad-'.$row['id_uklad'].'.php';
		}else{
			header("HTTP/1.0 404 Not Found");
		}
		
	}else{
		
		
		if(isset($_GET['alias_kategorii']) AND !isset($_GET['alias_artykulu'])){
			
			$alias_kategorii = mysql_real_escape_string($_GET['alias_kategorii']);
			$select = "SELECT nazwa_kategorii, status_kategorii, id_uklad, id_kategoria, alias_kategorii
			FROM kategorie WHERE alias_kategorii = '$alias_kategorii'";
			$query = mysql_query($select) or die(mysql_error());
			
			if(mysql_num_rows($query)>0){
				$row = mysql_fetch_array($query);
				if($row['status_kategorii'] == 0){
					$trescStrony = 'Niestety nie znaleziono odpowiedniej podstrony';
					header("HTTP/1.0 404 Not Found");
					//header("Location: index.php");
				}
				// jesli jest wiecej artykulów wybierz układ taki jak ustawił user
				
				include 'podstrony/kategorie/uklad-'.$row['id_uklad'].'.php';
			}else{
				header("HTTP/1.0 404 Not Found");
				//header("Location: ".$domena);
			}
		}

		/// obsluga artykulów
		if(isset($_GET['alias_artykulu'])){
			
			$alias_artykulu = mysql_real_escape_string($_GET['alias_artykulu']);
			$select = "SELECT * FROM artykuly WHERE alias_artykulu = '$alias_artykulu'";
			$query = mysql_query($select) or die(mysql_error());
			if(mysql_num_rows($query)>0){
				$row = mysql_fetch_array($query);
				$id_artykul = $row['id_artykulu'];
				include 'podstrony/artykuly/uklad-'.$row['id_uklad'].'.php';

			}else{
				header("HTTP/1.0 404 Not Found");
				//header("Location: ".$domena);
			}
		}
		if(isset($_GET['podstrona'])){
			$podstrona = mysql_real_escape_string($_GET['podstrona']);
			if(file_exists('podstrony/'.$podstrona.'.php')){
				include 'podstrony/'.$podstrona.'.php';
			}else{
				header("HTTP/1.0 404 Not Found");
				//header("Location: ".$domena);
			}
		}
	}
	
?>