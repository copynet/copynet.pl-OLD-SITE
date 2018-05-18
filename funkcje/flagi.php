<?php
	$select = "SELECT * FROM jezyki WHERE status='Aktywny'";
	$query = mysql_query($select) or die(mysql_error());
	if(mysql_num_rows($query)>0){ /// jeśli jest dodany kolejny język
		while($row = mysql_fetch_array($query)){
			echo '<a href="'.strtolower($row['nazwa_jezyk']).'/"';
			if(ID_LANG == $row['id_jezyk']){ echo ' class="wybrany"'; }
			echo ' title="'.$row['opis'].'"><img src="images/flagi/'.strtolower($row['nazwa_jezyk']).'.png" alt="'.$row['nazwa_jezyk'].'" />'.$row['nazwa_jezyk'].'</a>';
		}
	}
?>