<?PHP
	$dbHost="sql.copynet.nazwa.pl:3306";
	$dbUser="copynet_7";
	$dbPass="COPYnet88";
	mysql_connect($dbHost, $dbUser, $dbPass) or die ("Sprawdz polaczenie z serwerem".mysql_error());
	mysql_select_db($dbUser)or die("Brak polaczenia z baza danych");
	mysql_query("SET NAMES 'utf8'");
	mysql_query("set character set 'utf8_general_ci'");
?>