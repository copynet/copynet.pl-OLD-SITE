	<?
	/* $trescStrony .= '<div class="container">
			<div class="boxy_glowne">
				<div class="duzy">&nbsp;</div>
				<div class="maly">&nbsp;</div>
				<div class="maly margintop20">&nbsp;</div>
			</div>
		
			<div class="male_poziome">
				<div class="male">&nbsp;</div>
				<div class="male centralny">&nbsp;</div>
				<div class="male">&nbsp;</div>
			</div>
			
			<div class="srednie_poziome">
				<div class="sredni pierwszy">&nbsp;</div>
				<div class="sredni drugi">&nbsp;</div>
			</div>
			
			<div class="boxy_gotowe">
				<div class="do_prawej">
					<img src="images/templatka/czesci_azja.jpg" />
					<img src="images/templatka/czesci_europa.jpg" />
					<img src="images/templatka/czesci_usa.jpg" />
				</div>
				<img src="images/templatka/gwarancja_jakosci.jpg" />
			</div>
			
			<div class="linia1 margintop20">
				<div class="dwa">&nbsp;</div>
				<div class="jeden marginleft20">&nbsp;</div>
			</div>
			
			<div class="linia2 margintop20">
				<div class="jeden ">&nbsp;</div>
				<div class="jeden marginleft20">&nbsp;</div>
				<div class="jeden marginleft20">&nbsp;</div>
			</div>
			
			<div class="linia3 margintop20 clearboth">
				<div class="jeden">&nbsp;</div>
				
				<div class="linia4 marginleft20">
					<div class="dwa clearboth">&nbsp;</div>
					<div class="jeden clearboth margintop20">&nbsp;</div>
					<div class="jeden marginleft20 margintop20">&nbsp;</div>
				</div>
			</div>
			
			<div class="linia1 margintop20 clearboth">
				<div class="jeden">&nbsp;</div>
				<div class="jeden marginleft20">&nbsp;</div>
				<div class="jeden marginleft20">&nbsp;</div>
			</div>
			
			<div class="linia4 margintop20 clearboth">
				<div class="dwa">&nbsp;</div>
				<div class="jeden marginleft20">&nbsp;</div>
			</div>
			
			<div class="linia5">
				<div class="jeden">&nbsp;</div>
				<div class="jeden marginleft20">&nbsp;</div>
				<div class="jeden marginleft20">&nbsp;</div>
			</div>
		</div>'; */
		
		$select = "SELECT tresc FROM banery WHERE id = 10";
		$query = mysql_query($select) or die(mysql_error());
		$row = mysql_fetch_array($query);
		
		$select2 = "SELECT tresc FROM banery WHERE id = 12";
		$query2 = mysql_query($select2) or die(mysql_error());
		$row2 = mysql_fetch_array($query2);
		
		$trescStrony .= '<div class="container2">'.str_replace('[slider_startowy]',$row2['tresc'],$row['tresc']).'</div>';
		
		$trescStrony .= "<script>
			$(document).ready(function(){
				var i = 0;
				$('.duzy').append('<div class=\"punkty\"></div>');
				$('.duzy li').each(function(){
					$(this).addClass('li'+i);
					$(this).css('display','none');
					
					$('.duzy .punkty').append('<div class=\"punkt\" id=\"punkt'+i+'\"></div>');
					
					i++;
				});
				var aktualny = 0;
				var next = 1;
				$('.li'+aktualny).css('display','block');
				
				$('.punkty .punkt').click(function(){
					if($(this).hasClass('punkt_activ')){
					
					}else{
						next = $(this).attr('id').replace('punkt','');
						
						$('.punkty div').each(function(){
							$(this).removeClass('punkt_activ');
						});
						$(this).addClass('punkt_activ');
						next_auto();
					}
				});
				
				setInterval(function(){
					if ($('div.duzy').is(':hover')) {
						// jesli mycha nad grafiką nie rób zmiany;
					}else{
						next_auto();
					}
				},3000);
				
				function next_auto(){
					$('div.duzy li.li'+next).fadeIn('slow');
					$('div.duzy li.li'+aktualny).fadeOut('slow');
					aktualny = next;
					next++;
					if(next >= i){
						next = 0;
					}
					$('.punkty div').each(function(){
						$(this).removeClass('punkt_activ');
					});
					$('.punkty #punkt'+aktualny).addClass('punkt_activ');
				}
			});
		</script>";
		
	?>