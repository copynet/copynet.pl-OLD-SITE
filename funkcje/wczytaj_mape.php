<?

if($row['mapa_szerokosc']>0){

$trescStrony .= '<br style="clear:both;" /><div id="map_canvas" style="padding-top:20px; width:100%; height:300px;"></div>';
$trescStrony .= "
<script src=\"https://maps.google.com/maps/api/js?sensor=false\" type=\"text/javascript\"></script>
<script type=\"text/javascript\" src=\"http://google-maps-utility-library-v3.googlecode.com/svn/trunk/markerclusterer/src/markerclusterer.js\"></script>
<script>

var map;
			var mgr;
			var dymek = new google.maps.InfoWindow(); // zmienna globalna
			
			lat=".$row['mapa_szerokosc'].";  
			lng=".$row['mapa_wysokosc'].";  
			zoom=6;  			 
			
			function dodajMarker(opcjeMarkera)
            {
                opcjeMarkera.map = map;
                var marker = new google.maps.Marker(opcjeMarkera);
            }
			
			function initialize() {
			lat = ".$row['mapa_szerokosc'].";  
			long = ".$row['mapa_wysokosc']."; //set on kielce

			var latlng = new google.maps.LatLng(lat, long);
			var myOptions = {
				zoom: 10,
				center: latlng,
				mapTypeId: google.maps.MapTypeId.ROADMAP
			}
			;
			map = new google.maps.Map(document.getElementById(\"map_canvas\"),myOptions);
			
		
			
			 // wspólne cechy ikon			
                var rozmiar = new google.maps.Size(436, 300);                
                var punkt_startowy = new google.maps.Point(0,0);
                var punkt_zaczepienia = new google.maps.Point(18, 17);					
				var markers= [];
				
				//var ikona1 = new //google.maps.MarkerImage(\"http://www.sendme2space.com/images/biblioteka/dokumenty/min/Bez_nazwy_120130928140020.jpg\", //rozmiar, punkt_startowy, punkt_zaczepienia);
					 
				var marker1 = new google.maps.Marker({position:new google.maps.LatLng(".$row['mapa_szerokosc'].",".$row['mapa_wysokosc'].")/*,icon:ikona1*/});
				markers.push(marker1);
				marker1.txt='';
				google.maps.event.addListener(marker1,\"click\",function()
				{
					//dymek.setContent(marker1.txt);
					//dymek.open(map,marker1);
				});

	 				
			mgr = new MarkerClusterer(map,markers);
			}
			
		$(document).ready(function(){	
			initialize();
		});		

</script>";

}

?>