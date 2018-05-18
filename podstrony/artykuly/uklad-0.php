<?PHP
//treść

$trescStrony .= stripslashes($row['tresc_artykulu']);



				
if($_GET['alias_kategorii']=='realizacje'){
	$script .=  '

	$(document).ready(function(){
		$(".container.realizacje a").addClass("fancybox");
		
		$(".container.realizacje img").mouseenter(function(){
			var height = $(this).height();
			var width = $(this).width();
			var offset = $( this ).offset();
			var text = $(this).attr("alt");
			
			$(this).parent().append("<div class=\"podklad\" style=\"position:absolute; left:"+offset.left+"px; top:"+offset.top+"px; background:#EC008B; height:"+height+"px; z-index:100; width:"+width+"px; box-sizing:border-box; color:white;padding:20px; text-align:justify; overfloat:hidden; display:none;\">"+text+"</div>");
			$(".podklad").fadeIn("fast");
			
		})
		
		$(document).on("mouseleave", ".podklad", function(){
			$(".podklad").remove();
		});
	});
	
	';
}

//$trescStrony .= '</div>';
$tytulStrony = stripslashes($row['tytul_strony']);
if($tytulStrony == ''){
	$tytulStrony = stripslashes($row['tytul_artykulu']);}

$opis_strony = stripslashes($row['opis_strony']);
if($opis_strony == ''){
	$tekst = str_replace('  ', ' ', stripslashes(strip_tags($row['tresc_artykulu'])));
	$tablica = array("\n", "\r", "\t", "  ");
	$tekst2 = str_replace($tablica, ' ', $tekst);
	$opis_strony = substr($tekst2, 0, 250);
}

$slowa_kluczowe = stripslashes($row['slowa_kluczowe']);

include 'funkcje/wczytaj_mape.php';
include 'funkcje/wczytaj_zalaczniki.php';

?>