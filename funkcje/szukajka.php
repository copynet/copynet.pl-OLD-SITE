<form action="szukaj.html" method="post" id="szukajka">
	<?PHP include 'funkcje/imieniny.php'; ?>
	<input type="text" name="szukaj_fraze" value="Wpisz szukaną frazę" class="text" onblur="if(this.value=='') this.value='Wpisz szukaną frazę';" onfocus="if(this.value=='Wpisz szukaną frazę') this.value='';" />
	<input type="submit" name="szukaj" value="Szukaj" />
</form>