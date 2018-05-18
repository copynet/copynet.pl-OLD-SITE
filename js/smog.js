			var mapa; 	// obiekt globalny
			var dymek; 	// okno z informacjami
			var geokoder = new google.maps.Geocoder();
						
			function mapaStart()  
			{  
				var wspolrzedne = new google.maps.LatLng(53.429805, 14.537883);
				var opcjeMapy = {
					zoom: 15,
					center: wspolrzedne,
					mapTypeId: google.maps.MapTypeId.ROADMAP,
					disableDefaultUI: false
				};
				mapa = new google.maps.Map(document.getElementById("mapka"), opcjeMapy); 			
				dymek = new google.maps.InfoWindow();
				
				geokoder.geocode({address: 'Kielce, Bodzentyńska 44a'}, obslugaGeokodowania);
			}  
			
			function obslugaGeokodowania(wyniki, status)
			{
				var rozmiar 			= new google.maps.Size(32,32);
				var rozmiar_cien 		= new google.maps.Size(59,32);
				var punkt_startowy		= new google.maps.Point(0,0);
				var punkt_zaczepienia	= new google.maps.Point(0,0);
				
				//var ikona	= new google.maps.MarkerImage("http://maps.google.com/mapfiles/kml/pal3/icon23.png", rozmiar, punkt_startowy, punkt_zaczepienia);
				//var cien 	= new google.maps.MarkerImage("http://maps.google.com/mapfiles/kml/pal3/icon23s.png", rozmiar_cien, punkt_startowy, punkt_zaczepienia);
				
				if(status == google.maps.GeocoderStatus.OK)
				{
					mapa.setCenter(wyniki[0].geometry.location);
					var marker = new google.maps.Marker(
						{
							map: 		mapa, 
							position: 	wyniki[0].geometry.location,
							//icon: 		ikona,
							//shadow: 	cien
						}
					);
					dymek.open(mapa, marker);
					dymek.setContent('Kielce, ul. Bodzentyńska 44a/4');

				}
				else
				{
					alert("Nie znalazԥm podanego adresu!");
				}
			}