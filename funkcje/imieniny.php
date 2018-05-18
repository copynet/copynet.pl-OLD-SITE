<?php
function data() {
$data_str = getdate();
$rok = $data_str["year"];
$miesiac = $data_str["mon"];
$dzien = $data_str["mday"];
$godzina = $data_str["hours"];
$minuty = $data_str["minutes"];

if($miesiac == 1) $miesiac_slow = "stycznia";
if($miesiac == 2) $miesiac_slow = "lutego";
if($miesiac == 3) $miesiac_slow = "marca";
if($miesiac == 4) $miesiac_slow = "kwietnia";
if($miesiac == 5) $miesiac_slow = "maja";
if($miesiac == 6) $miesiac_slow = "czerwca";
if($miesiac == 7) $miesiac_slow = "lipca";
if($miesiac == 8) $miesiac_slow = "sierpnia";
if($miesiac == 9) $miesiac_slow = "września";
if($miesiac == 10) $miesiac_slow = "października";
if($miesiac == 11) $miesiac_slow = "listopada";
if($miesiac == 12) $miesiac_slow = "grudnia";

if(strlen($godzina) == 1) $godzina = "0".$godzina;
if(strlen($minuty) == 1) $minuty = "0".$minuty;
if(strlen($sekundy) == 1) $sekundy = "0".$sekundy;

echo $data_str = $dzien.' '.$miesiac_slow.' '.$rok;
}

function imieniny() {
$data_str = getdate();
$miesiac = $data_str["mon"];
$dzien = $data_str["mday"];

if ($miesiac == 1) {
if ($dzien == 1) { $imieniny = "Mieczysława, Mieszka, Masława";}
if ($dzien == 2) { $imieniny = "Izydora, Makarego, Sylwestra";}
if ($dzien == 3) { $imieniny = "Danuty, Genowefy, Arletty";}
if ($dzien == 4) { $imieniny = "Anieli, Tytusa, Eugeniusza";}
if ($dzien == 5) { $imieniny = "Hanny, Edwarda, Telesfora";}
if ($dzien == 6) { $imieniny = "Kaspra, Melchiora, Baltazara";}
if ($dzien == 7) { $imieniny = "Lucjana, Juliana, Walentego";}
if ($dzien == 8) { $imieniny = "Seweryna, Erharda, M&para;cisława";}
if ($dzien == 9) { $imieniny = "Marceliny, Marcjanny, Julianny";}
if ($dzien == 10) { $imieniny = "Dobrosława, Wilhelma, Agatona";}
if ($dzien == 11) { $imieniny = "Honoraty, Matyldy, Feliksa";}
if ($dzien == 12) { $imieniny = "Arkadiusza, Czesławy, Grety";}
if ($dzien == 13) { $imieniny = "Bogumiła, Weroniki, Leoncjusza";}
if ($dzien == 14) { $imieniny = "Feliksa, Hilarego, Odona";}
if ($dzien == 15) { $imieniny = "Domosława, Makarego, D&plusmn;brówki";}
if ($dzien == 16) { $imieniny = "Marcelego, Włodzimierza, Walerego";}
if ($dzien == 17) { $imieniny = "Antoniego, Jana, Sabiniana";}
if ($dzien == 18) { $imieniny = "Małgorzaty, Piotra, Liberty";}
if ($dzien == 19) { $imieniny = "Henryka, Mariusza, Erwina";}
if ($dzien == 20) { $imieniny = "Fabiana, Sebastiana, Dobroniegi";}
if ($dzien == 21) { $imieniny = "Agnieszki, Jarosławy, Epifaniego";}
if ($dzien == 22) { $imieniny = "Anastazego, Wincentego, Gaudentego";}
if ($dzien == 23) { $imieniny = "Ildefonsa, Rajmunda, Klemensa";}
if ($dzien == 24) { $imieniny = "Felicji, Tymoteusza, Rafała";}
if ($dzien == 25) { $imieniny = "Tatiany, Miłosza, Pawła";}
if ($dzien == 26) { $imieniny = "Pauli, Polikarpa, Pauliny";}
if ($dzien == 27) { $imieniny = "Angeliki, Przybysława, Ilony";}
if ($dzien == 28) { $imieniny = "Walerego, Radomira, Tomasza";}
if ($dzien == 29) { $imieniny = "Franciszka, Zdzisława, Walerego";}
if ($dzien == 30) { $imieniny = "Macieja, Martyny, Teofila";}
if ($dzien == 31) { $imieniny = "Ludwika, Marceliny, Cyrusa";}
}

if ($miesiac == 2) {
if ($dzien == 1) { $imieniny = "Brygidy, Ignacego, Renaty";}
if ($dzien == 2) { $imieniny = "Marii, Miłosława, Joanny";}
if ($dzien == 3) { $imieniny = "Błażeja, Telimeny, Oskara";}
if ($dzien == 4) { $imieniny = "Andrzeja, Weroniki, Gilberta";}
if ($dzien == 5) { $imieniny = "Agaty, Adelajdy, Justyniana";}
if ($dzien == 6) { $imieniny = "Bohdana, Doroty, Pawła";}
if ($dzien == 7) { $imieniny = "Romualda, Ryszarda, Sulisława";}
if ($dzien == 8) { $imieniny = "Piotra, Żakliny, Gniewomira";}
if ($dzien == 9) { $imieniny = "Apolonii, Rajnolda, Mariana";}
if ($dzien == 10) { $imieniny = "Elwiry, Jacentego, Scholastyki";}
if ($dzien == 11) { $imieniny = "Dezyderego, Marii, Lucjana";}
if ($dzien == 12) { $imieniny = "Eulalii, Nory, Modesta";}
if ($dzien == 13) { $imieniny = "Grzegorza, Katarzyny, Kastora";}
if ($dzien == 14) { $imieniny = "Walentego, Cyryla, Metodego";}
if ($dzien == 15) { $imieniny = "Faustyna, Jowity, Georginy";}
if ($dzien == 16) { $imieniny = "Danuty, Julianny, Daniela";}
if ($dzien == 17) { $imieniny = "Donata, Łukasza, Zbigniewa";}
if ($dzien == 18) { $imieniny = "Konstancji, Maksyma, Wiaczesława";}
if ($dzien == 19) { $imieniny = "Arnolda, Konrada, Mansweta";}
if ($dzien == 20) { $imieniny = "Leona, Ludomiła, Lubomira";}
if ($dzien == 21) { $imieniny = "Eleonory, Kiejstuta, Fortunata";}
if ($dzien == 22) { $imieniny = "Małgorzaty, Marty, Piotra";}
if ($dzien == 23) { $imieniny = "Damiana, Romany, Florentyna";}
if ($dzien == 24) { $imieniny = "Macieja, Bogusza, Ja&para;miny";}
if ($dzien == 25) { $imieniny = "Cezarego, Wiktora, Konstancjusza";}
if ($dzien == 26) { $imieniny = "Aleksandra, Mirosława, Dionizego";}
if ($dzien == 27) { $imieniny = "Gabriela, Anastazji, Honoryny";}
if ($dzien == 28) { $imieniny = "Romana, Makarego, Lutomira";}
if ($dzien == 29) { $imieniny = "Romana, Oswalda, Cyryla";}
}

if ($miesiac == 3) {
if ($dzien == 1) { $imieniny = "Antoniego, Radosława, Albina";}
if ($dzien == 2) { $imieniny = "Heleny, Henryka, Halszki";}
if ($dzien == 3) { $imieniny = "Maryny, Kunegundy, Pakosława";}
if ($dzien == 4) { $imieniny = "Kazimierza, Łucji, Witosława";}
if ($dzien == 5) { $imieniny = "Adriana, Fryderyka, Oliwii";}
if ($dzien == 6) { $imieniny = "Jordana, Róży, Kolety";}
if ($dzien == 7) { $imieniny = "Pawła, Tomasza, Felicyty";}
if ($dzien == 8) { $imieniny = "Beaty, Wincentego, Jana";}
if ($dzien == 9) { $imieniny = "Franciszki, Katarzyny, M&para;cisława";}
if ($dzien == 10) { $imieniny = "Cypriana, Makarego, Marcelego";}
if ($dzien == 11) { $imieniny = "Benedykta, Konstantego, Ludosława";}
if ($dzien == 12) { $imieniny = "Bernarda, Grzegorza, Józefiny";}
if ($dzien == 13) { $imieniny = "Krystyny, Bożeny, Rodryga";}
if ($dzien == 14) { $imieniny = "Leona, Matyldy, Jakuba";}
if ($dzien == 15) { $imieniny = "Longina, Klemensa, Ludwiki";}
if ($dzien == 16) { $imieniny = "Herberta, Izabeli, Henryki";}
if ($dzien == 17) { $imieniny = "Patryka, Zbigniewa, Gertrudy";}
if ($dzien == 18) { $imieniny = "Cyryla, Edwarda, Boguchwała";}
if ($dzien == 19) { $imieniny = "Józefa, Bogdana, Laili";}
if ($dzien == 20) { $imieniny = "Klaudii, Eufemii, Cyriaki";}
if ($dzien == 21) { $imieniny = "Benedykta, Lubomiry, Mikołaja";}
if ($dzien == 22) { $imieniny = "Katarzyny, Bogusława, Kazimierza";}
if ($dzien == 23) { $imieniny = "Oktawiana, Pelagii, Zbisława";}
if ($dzien == 24) { $imieniny = "Gabriela, Marka, Gabora";}
if ($dzien == 25) { $imieniny = "Marioli, Dyzmy, Wieńczysława";}
if ($dzien == 26) { $imieniny = "Emanuela, Larysy, Teodora";}
if ($dzien == 27) { $imieniny = "Ernesta, Lidii, Ruperta";}
if ($dzien == 28) { $imieniny = "Anieli, Renaty, Kastora";}
if ($dzien == 29) { $imieniny = "Wiktoryna, Helmuta, Ostapa";}
if ($dzien == 30) { $imieniny = "Amelii, Kwiryna, Dobromira";}
if ($dzien == 31) { $imieniny = "Beniamina, Kornelego, Balbiny";}
}

if ($miesiac == 4) {
if ($dzien == 1) { $imieniny = "Grażyny, Hugona, Teodory";}
if ($dzien == 2) { $imieniny = "Franciszka, Władysława, Urbana";}
if ($dzien == 3) { $imieniny = "Ryszarda, Antoniego, Pankracego";}
if ($dzien == 4) { $imieniny = "Izydora, Wacława, Platona";}
if ($dzien == 5) { $imieniny = "Ireny, Wincentego, Julianny";}
if ($dzien == 6) { $imieniny = "Izoldy, Celestyny, Ady";}
if ($dzien == 7) { $imieniny = "Hermana, Rufina, Donata";}
if ($dzien == 8) { $imieniny = "Dionizego, Cezaryny, Radosława";}
if ($dzien == 9) { $imieniny = "Mai, Dymitra, Dobrosławy";}
if ($dzien == 10) { $imieniny = "Małgorzaty, Michała, Makarego";}
if ($dzien == 11) { $imieniny = "Filipa, Leona, Jaromira";}
if ($dzien == 12) { $imieniny = "Juliusza, Ludosława, Zenona";}
if ($dzien == 13) { $imieniny = "Przemysława, Hermenegildy, Marcina";}
if ($dzien == 14) { $imieniny = "Bereniki, Waleriana, Jadwigi";}
if ($dzien == 15) { $imieniny = "Anastazji, Wacława, Leonida";}
if ($dzien == 16) { $imieniny = "Bernadetty, Cecyliana, Kseni";}
if ($dzien == 17) { $imieniny = "Roberta, Rudolfa, Stefana";}
if ($dzien == 18) { $imieniny = "Apoloniusza, Bogusławy, Gościsława";}
if ($dzien == 19) { $imieniny = "Adolfa, Tymona, Pafnucego";}
if ($dzien == 20) { $imieniny = "Agnieszki, Czesława, Amalii";}
if ($dzien == 21) { $imieniny = "Anzelma, Bartosza, Konrada";}
if ($dzien == 22) { $imieniny = "Leona, Kai, Heliodora";}
if ($dzien == 23) { $imieniny = "Jerzego, Wojciecha, Adalberta";}
if ($dzien == 24) { $imieniny = "Aleksandra, Horacego, Grzegorza";}
if ($dzien == 25) { $imieniny = "Jarosława, Marka, Elwiry";}
if ($dzien == 26) { $imieniny = "Marzeny, Klaudiusza, Marceliny";}
if ($dzien == 27) { $imieniny = "Teofila, Zyty, Żywisława";}
if ($dzien == 28) { $imieniny = "Pawła, Walerii, Ludwika";}
if ($dzien == 29) { $imieniny = "Piotra, Rity, Angeliny";}
if ($dzien == 30) { $imieniny = "Katarzyny, Mariana, Lilii";}
}

if ($miesiac == 5) {
if ($dzien == 1) { $imieniny = "Józefa, Jeremiego, Lubomira";}
if ($dzien == 2) { $imieniny = "Zygmunta, Atanazego, Anatola";}
if ($dzien == 3) { $imieniny = "Marii, Aleksandra, Stanisława";}
if ($dzien == 4) { $imieniny = "Floriana, Moniki, Grzegorza";}
if ($dzien == 5) { $imieniny = "Ireny, Waldemara, Piusa";}
if ($dzien == 6) { $imieniny = "Judyty, Juranda, Benedykty";}
if ($dzien == 7) { $imieniny = "Gustawy, Ludmiły, Sawy";}
if ($dzien == 8) { $imieniny = "Stanisława, Lizy, Dezyderii";}
if ($dzien == 9) { $imieniny = "Grzegorza, Bożydara, Karoliny";}
if ($dzien == 10) { $imieniny = "Antoniego, Antonina, Izydora";}
if ($dzien == 11) { $imieniny = "Igi, Miry, Lwa";}
if ($dzien == 12) { $imieniny = "Pankracego, Dominika, Domiceli";}
if ($dzien == 13) { $imieniny = "Serwacego, Ofelii, Roberty";}
if ($dzien == 14) { $imieniny = "Bonifacego, Macieja, Dobiesława";}
if ($dzien == 15) { $imieniny = "Zofii, Nadziei, Berty";}
if ($dzien == 16) { $imieniny = "Andrzeja, Jędrzeja, Adama";}
if ($dzien == 17) { $imieniny = "Sławomira, Paschalisa, Weroniki";}
if ($dzien == 18) { $imieniny = "Eryka, Aleksandry, Feliksa";}
if ($dzien == 19) { $imieniny = "Iwa, Piotra, Celestyna";}
if ($dzien == 20) { $imieniny = "Bazylego, Bernardyna, Bronimira";}
if ($dzien == 21) { $imieniny = "Kryspina, Wiktora, Jana";}
if ($dzien == 22) { $imieniny = "Heleny, Wiesławy, Romy";}
if ($dzien == 23) { $imieniny = "Iwony, Emilii, Dezyderiusza";}
if ($dzien == 24) { $imieniny = "Joanny, Marii, Zuzanny";}
if ($dzien == 25) { $imieniny = "Grzegorza, Magdy, Marii Magdaleny";}
if ($dzien == 26) { $imieniny = "Filipa, Pauliny, Eweliny";}
if ($dzien == 27) { $imieniny = "Jana, Juliusza, Radowita";}
if ($dzien == 28) { $imieniny = "Augustyna, Jaromira, Wilhelma";}
if ($dzien == 29) { $imieniny = "Marii Magdaleny, Teodozji, Maksyma";}
if ($dzien == 30) { $imieniny = "Feliksa, Ferdynanda, Zdzisława";}
if ($dzien == 31) { $imieniny = "Anieli, Marietty, Petroneli";}
}

if ($miesiac == 6) {
if ($dzien == 1) { $imieniny = "Jakuba, Hortensji, Gracjany";}
if ($dzien == 2) { $imieniny = "Erazma, Marianny, Marzanny";}
if ($dzien == 3) { $imieniny = "Klotyldy, Leszka, Tamary";}
if ($dzien == 4) { $imieniny = "Franciszka, Karola, Go&para;cimiła";}
if ($dzien == 5) { $imieniny = "Waltera, Bonifacego, Dobromira";}
if ($dzien == 6) { $imieniny = "Dominiki, Norberta, Laurentego";}
if ($dzien == 7) { $imieniny = "Roberta, Wiesława, Ariadny";}
if ($dzien == 8) { $imieniny = "Medarda, Maksyma, Wilhelma";}
if ($dzien == 9) { $imieniny = "Felicjana, Pelagii, Sławoja";}
if ($dzien == 10) { $imieniny = "Bogumiła, Małgorzaty, Edgara";}
if ($dzien == 11) { $imieniny = "Barnaby, Radomiła, Feliksa";}
if ($dzien == 12) { $imieniny = "Janiny, Onufrego, Leona";}
if ($dzien == 13) { $imieniny = "Antoniego, Lucjana, Gracji";}
if ($dzien == 14) { $imieniny = "Elizy, Bazylego, Waleriana";}
if ($dzien == 15) { $imieniny = "Jolanty, Wita, Wioli";}
if ($dzien == 16) { $imieniny = "Aliny, Justyny, Benona";}
if ($dzien == 17) { $imieniny = "Laury, Alberta, Marcjana";}
if ($dzien == 18) { $imieniny = "Elżbiety, Marka, Amandy";}
if ($dzien == 19) { $imieniny = "Gerwazego, Protazego, Borzysława";}
if ($dzien == 20) { $imieniny = "Bogny, Florentyny, Bożeny";}
if ($dzien == 21) { $imieniny = "Alicji, Alojzego, Rudolfa";}
if ($dzien == 22) { $imieniny = "Pauliny, Flawiusza, Agenora";}
if ($dzien == 23) { $imieniny = "Wandy, Zenona, Prospera";}
if ($dzien == 24) { $imieniny = "Jana, Danuty, Janiny";}
if ($dzien == 25) { $imieniny = "Łucji, Wilhelma, Albrechta";}
if ($dzien == 26) { $imieniny = "Jana, Pawła, Miromira";}
if ($dzien == 27) { $imieniny = "Władysława, Maryli, Władysławy";}
if ($dzien == 28) { $imieniny = "Ireneusza, Leona, Benigny";}
if ($dzien == 29) { $imieniny = "Piotra, Pawła, Benity";}
if ($dzien == 30) { $imieniny = "Emilii, Lucyny, Marcjala";}
}

if ($miesiac == 7) {
if ($dzien == 1) { $imieniny = "Haliny, Mariana, Klarysy";}
if ($dzien == 2) { $imieniny = "Jagody, Urbana, Martyniana";}
if ($dzien == 3) { $imieniny = "Anatola, Jacka, Ottona";}
if ($dzien == 4) { $imieniny = "Malwiny, Izabeli, Aureliana";}
if ($dzien == 5) { $imieniny = "Karoliny, Antoniego, Filomeny";}
if ($dzien == 6) { $imieniny = "Dominiki, Gotarda, Agrypiny";}
if ($dzien == 7) { $imieniny = "Estery, Metodego, Kiry";}
if ($dzien == 8) { $imieniny = "Edgara, Elżbiety, Eugeniusza";}
if ($dzien == 9) { $imieniny = "Lukrecji, Weroniki, Anatolii";}
if ($dzien == 10) { $imieniny = "Amelii, Filipa, Witalisa";}
if ($dzien == 11) { $imieniny = "Olgi, Kaliny, Benedykta";}
if ($dzien == 12) { $imieniny = "Jana, Pameli, Weroniki";}
if ($dzien == 13) { $imieniny = "Irwina, Margarety, Sary";}
if ($dzien == 14) { $imieniny = "Marcelina, Ulryka, Bonawentury";}
if ($dzien == 15) { $imieniny = "Włodzimierza, Henryka, Egona";}
if ($dzien == 16) { $imieniny = "Mariki, Benity, Dzierżysława";}
if ($dzien == 17) { $imieniny = "Anety, Aleksego, Julietty";}
if ($dzien == 18) { $imieniny = "Erwina, Kamila, Wespazjana";}
if ($dzien == 19) { $imieniny = "Alfreda, Wincentego, Wodzisława";}
if ($dzien == 20) { $imieniny = "Czesława, Hieronima, Eliasza";}
if ($dzien == 21) { $imieniny = "Daniela, Dalidy, Benedykta";}
if ($dzien == 22) { $imieniny = "Magdaleny, Bolesławy, Marii";}
if ($dzien == 23) { $imieniny = "Bogny, Sławosza, Żelisława";}
if ($dzien == 24) { $imieniny = "Kingi, Krystyny, Antoniego";}
if ($dzien == 25) { $imieniny = "Krzysztofa, Walentyny, Jakuba";}
if ($dzien == 26) { $imieniny = "Anny, Mirosławy, Grażyny";}
if ($dzien == 27) { $imieniny = "Natalii, Aureliusza, Jerzego";}
if ($dzien == 28) { $imieniny = "Aidy, Innocentego, Marceli";}
if ($dzien == 29) { $imieniny = "Marty, Olafa, Beatrycze";}
if ($dzien == 30) { $imieniny = "Julity, Ludmiły, Ro&para;cisława";}
if ($dzien == 31) { $imieniny = "Ignacego, Ernesty, Lubomira";}
}

if ($miesiac == 8) {
if ($dzien == 1) { $imieniny = "Justyna, Nadii, Piotra";}
if ($dzien == 2) { $imieniny = "Alfonsa, Kariny, Gustawa";}
if ($dzien == 3) { $imieniny = "Lidii, Augusta, Nikodema";}
if ($dzien == 4) { $imieniny = "Dominika, Protazego, Jana";}
if ($dzien == 5) { $imieniny = "Marii, Oswalda, Stanisławy";}
if ($dzien == 6) { $imieniny = "Jakuba, Sławy, Sykstusa";}
if ($dzien == 7) { $imieniny = "Doroty, Kajetana, Donata";}
if ($dzien == 8) { $imieniny = "Cyriaka, Emiliana, Sylwiusza";}
if ($dzien == 9) { $imieniny = "Romualda, Romana, Ireny";}
if ($dzien == 10) { $imieniny = "Borysa, Filomeny, Wawrzyńca";}
if ($dzien == 11) { $imieniny = "Ligii, Zuzanny, Lukrecji";}
if ($dzien == 12) { $imieniny = "Klary, Lecha, Hilarii";}
if ($dzien == 13) { $imieniny = "Diany, Hipolita, Kasjusza";}
if ($dzien == 14) { $imieniny = "Euzebiusza, Maksymiliana, Alfreda";}
if ($dzien == 15) { $imieniny = "Marii, Napoleona, Stelii";}
if ($dzien == 16) { $imieniny = "Joachima, Rocha, Domarada";}
if ($dzien == 17) { $imieniny = "Jacka, Anity, Mirona";}
if ($dzien == 18) { $imieniny = "Heleny, Bronisława, Ilony";}
if ($dzien == 19) { $imieniny = "Bolesława, Juliana, Jana";}
if ($dzien == 20) { $imieniny = "Bernarda, Sobiesława, Samuela";}
if ($dzien == 21) { $imieniny = "Joanny, Kazimiery, Wiktorii";}
if ($dzien == 22) { $imieniny = "Cezarego, Zygfryda, Marii";}
if ($dzien == 23) { $imieniny = "Apolinarego, Filipa, Róży";}
if ($dzien == 24) { $imieniny = "Bartłomieja, Malwiny, Jerzego";}
if ($dzien == 25) { $imieniny = "Ludwika, Luizy, Patrycji";}
if ($dzien == 26) { $imieniny = "Marii, Natalii, Sandry";}
if ($dzien == 27) { $imieniny = "Józefa, Moniki, Cezarego";}
if ($dzien == 28) { $imieniny = "Patrycji, Adeliny, Wyszomira";}
if ($dzien == 29) { $imieniny = "Jana, Sabiny, Racibora";}
if ($dzien == 30) { $imieniny = "Szczęsnego, Róży, Gaudencji";}
if ($dzien == 31) { $imieniny = "Rajmunda, Ramony, Pauliny";}
}

if ($miesiac == 9) {
if ($dzien == 1) { $imieniny = "Bronisławy, Idziego, Bronisza";}
if ($dzien == 2) { $imieniny = "Stefana, Juliana, Aksela";}
if ($dzien == 3) { $imieniny = "Izabeli, Szymona, Erazmy";}
if ($dzien == 4) { $imieniny = "Liliany, Rozalii, Idy";}
if ($dzien == 5) { $imieniny = "Doroty, Wawrzyńca, Herkulesa";}
if ($dzien == 6) { $imieniny = "Beaty, Eugeniusza, Zachariasza";}
if ($dzien == 7) { $imieniny = "Melchiora, Reginy, Ryszardy";}
if ($dzien == 8) { $imieniny = "Marii, Adrianny, Klementyny";}
if ($dzien == 9) { $imieniny = "Sergiusza, Piotra";}
if ($dzien == 10) { $imieniny = "Łukasza, Mikołaja, Pulcherii";}
if ($dzien == 11) { $imieniny = "Jacka, Dagny, Prota";}
if ($dzien == 12) { $imieniny = "Marii, Gwidona, Radzimira";}
if ($dzien == 13) { $imieniny = "Eugenii, Aureliusza, Lubora";}
if ($dzien == 14) { $imieniny = "Bernarda, Roksany, Cypriana";}
if ($dzien == 15) { $imieniny = "Albina, Nikodema, Marii";}
if ($dzien == 16) { $imieniny = "Edyty, Kornela, Kamili";}
if ($dzien == 17) { $imieniny = "Franciszka, Hildegardy, Roberta";}
if ($dzien == 18) { $imieniny = "Stefanii, Irmy, Stanisława";}
if ($dzien == 19) { $imieniny = "Januarego, Konstancji, Teodora";}
if ($dzien == 20) { $imieniny = "Eustachego, Filipiny, Faustyny";}
if ($dzien == 21) { $imieniny = "Jonasza, Mateusza, Hipolita";}
if ($dzien == 22) { $imieniny = "Maurycego, Tomasza, Joachima";}
if ($dzien == 23) { $imieniny = "Bogusława, Tekli, Liberta";}
if ($dzien == 24) { $imieniny = "Gerarda, Teodora, Hermana";}
if ($dzien == 25) { $imieniny = "Aurelii, Kleofasa, Władysława";}
if ($dzien == 26) { $imieniny = "Justyny, Cypriana, Euzebiusza";}
if ($dzien == 27) { $imieniny = "Damiana, Amadeusza, Mirabelli";}
if ($dzien == 28) { $imieniny = "Luby, Wacława, Salomona";}
if ($dzien == 29) { $imieniny = "Michała, Michaliny, Gabriela";}
if ($dzien == 30) { $imieniny = "Honoriusza, Wery, Hieronima";}
}

if ($miesiac == 10) {
if ($dzien == 1) { $imieniny = "Danuty, Remigiusza, Romana";}
if ($dzien == 2) { $imieniny = "Teofila, Dionizego, Trofima";}
if ($dzien == 3) { $imieniny = "Teresy, Józefy, Heliodora";}
if ($dzien == 4) { $imieniny = "Rozalii, Franciszka, Edwina";}
if ($dzien == 5) { $imieniny = "Igora, Apolinarego, Placyda";}
if ($dzien == 6) { $imieniny = "Artura, Brunona, Fryderyki";}
if ($dzien == 7) { $imieniny = "Marii, Marka, Amalii";}
if ($dzien == 8) { $imieniny = "Pelagii, Brygidy, Demetriusza";}
if ($dzien == 9) { $imieniny = "Arnolda, Dionizego, Sybilii";}
if ($dzien == 10) { $imieniny = "Franciszka, Pauliny, Daniela";}
if ($dzien == 11) { $imieniny = "Aldony, Emila, Dobromiły";}
if ($dzien == 12) { $imieniny = "Eustachego, Maksymiliana, Serafina";}
if ($dzien == 13) { $imieniny = "Edwarda, Geralda, Teofila";}
if ($dzien == 14) { $imieniny = "Alana, Kaliksta, Fortunaty";}
if ($dzien == 15) { $imieniny = "Jadwigi, Teresy, Zoriana";}
if ($dzien == 16) { $imieniny = "Gawła, Florentyny, Grzegorza";}
if ($dzien == 17) { $imieniny = "Małgorzaty, Ryszarda, Gabrieli";}
if ($dzien == 18) { $imieniny = "Juliana, Łukasza, Bratumiła";}
if ($dzien == 19) { $imieniny = "Piotra, Pawła, Ziemowita";}
if ($dzien == 20) { $imieniny = "Ireny, Kleopatry, Witalisa";}
if ($dzien == 21) { $imieniny = "Urszuli, Hilarego, Celiny";}
if ($dzien == 22) { $imieniny = "Halki, Kordiana, Kordelii";}
if ($dzien == 23) { $imieniny = "Marleny, Seweryna, Odylii";}
if ($dzien == 24) { $imieniny = "Marcina, Rafała, Arety";}
if ($dzien == 25) { $imieniny = "Darii, Wilhelminy, Sambora";}
if ($dzien == 26) { $imieniny = "Ewarysta, Łucjana, Dymitriusza";}
if ($dzien == 27) { $imieniny = "Iwony, Sabiny, Wincentego";}
if ($dzien == 28) { $imieniny = "Szymona, Tadeusza, Judy";}
if ($dzien == 29) { $imieniny = "Euzebii, Wiloletty, Narcyza";}
if ($dzien == 30) { $imieniny = "Zenobii, Przemysława, Edmunda";}
if ($dzien == 31) { $imieniny = "Alfonsa, Urbana, Krzysztofa";}
}

if ($miesiac == 11) {
if ($dzien == 1) { $imieniny = "Seweryna, Wiktoryny, Warcisława";}
if ($dzien == 2) { $imieniny = "Bohdany, Tobiasza, Bohdana";}
if ($dzien == 3) { $imieniny = "Huberta, Sylwii, Chwalisława";}
if ($dzien == 4) { $imieniny = "Karola, Olgierda, Emeryka";}
if ($dzien == 5) { $imieniny = "Elżbiety, Sławomira, Zachariasza";}
if ($dzien == 6) { $imieniny = "Feliksa, Leonarda, Melaniusza";}
if ($dzien == 7) { $imieniny = "Antoniego, Ernesta, Achillesa";}
if ($dzien == 8) { $imieniny = "Seweryna, Gotfryda, Hadriana";}
if ($dzien == 9) { $imieniny = "Teodora, Ursyna, Genowefy";}
if ($dzien == 10) { $imieniny = "Leny, Ludomira, Leona";}
if ($dzien == 11) { $imieniny = "Bartłomieja, Marcina, Prota";}
if ($dzien == 12) { $imieniny = "Renaty, Witolda, Czcibora";}
if ($dzien == 13) { $imieniny = "Stanisława, Mikołaja, Krystyna";}
if ($dzien == 14) { $imieniny = "Rogera, Serafina, Agaty";}
if ($dzien == 15) { $imieniny = "Alberta, Leopolda, Odalii";}
if ($dzien == 16) { $imieniny = "Edmunda, Marii, Gertrudy";}
if ($dzien == 17) { $imieniny = "Grzegorza, Salomei, Elżbiety";}
if ($dzien == 18) { $imieniny = "Klaudyny, Romana, Filipiny";}
if ($dzien == 19) { $imieniny = "Elżbiety, Seweryny, Salomei";}
if ($dzien == 20) { $imieniny = "Anatola, Rafała, Edmunda";}
if ($dzien == 21) { $imieniny = "Janusza, Marii, Konrada";}
if ($dzien == 22) { $imieniny = "Cecylii, Marka, Maura";}
if ($dzien == 23) { $imieniny = "Adeli, Klemensa, Orestesa";}
if ($dzien == 24) { $imieniny = "Emmy, Flory, Jana";}
if ($dzien == 25) { $imieniny = "Erazma, Katarzyny, Beaty";}
if ($dzien == 26) { $imieniny = "Delfiny, Lechosława, Konrada";}
if ($dzien == 27) { $imieniny = "Waleriana, Wirgiliusza, Ody";}
if ($dzien == 28) { $imieniny = "Zdzisława, Lesława, Go&para;cierada";}
if ($dzien == 29) { $imieniny = "Błażeja, Saturnina, Fryderyka";}
if ($dzien == 30) { $imieniny = "Andrzeja, Justyny, Konstantego";}
}

if ($miesiac == 12) {
if ($dzien == 1) { $imieniny = "Natalii, Blanki, Eligiusza";}
if ($dzien == 2) { $imieniny = "Balbiny, Pauliny, Rafała";}
if ($dzien == 3) { $imieniny = "Franciszka, Ksawerego, Lucjusza";}
if ($dzien == 4) { $imieniny = "Barbary, Krystiana, Berny";}
if ($dzien == 5) { $imieniny = "Saby, Kryspiny, Wilmy";}
if ($dzien == 6) { $imieniny = "Mikołaja, Jaremy, Leontyny";}
if ($dzien == 7) { $imieniny = "Marcina, Ambrożego, Agatona";}
if ($dzien == 8) { $imieniny = "Marii, Wirginii, Zenona";}
if ($dzien == 9) { $imieniny = "Leokadii, Wiesławy, Nataszy";}
if ($dzien == 10) { $imieniny = "Danieli, Julii, Eulalii";}
if ($dzien == 11) { $imieniny = "Damazego, Waldemara, Artura";}
if ($dzien == 12) { $imieniny = "Aleksandra, Adelajdy, Dagmary";}
if ($dzien == 13) { $imieniny = "Łucji, Otylii, Włodzisławy";}
if ($dzien == 14) { $imieniny = "Alfreda, Izydora, Alfredy";}
if ($dzien == 15) { $imieniny = "Niny, Celiny, Krystiany";}
if ($dzien == 16) { $imieniny = "Albiny, Zdzisławy, Adelajdy";}
if ($dzien == 17) { $imieniny = "Olimpii, Łazarza, Jolanty";}
if ($dzien == 18) { $imieniny = "Gracjana, Bogusława, Laurencji";}
if ($dzien == 19) { $imieniny = "Gabrieli, Dariusza, Urbana";}
if ($dzien == 20) { $imieniny = "Bogumiły, Dominika, Zefiryna";}
if ($dzien == 21) { $imieniny = "Tomasza, Piotra, Tomisława";}
if ($dzien == 22) { $imieniny = "Honoraty, Zenona, Franciszki";}
if ($dzien == 23) { $imieniny = "Sławomiry, Wiktorii, Iwona";}
if ($dzien == 24) { $imieniny = "Adama, Ewy, Zenobiusza";}
if ($dzien == 25) { $imieniny = "Anastazji, Piotra, Eugenii";}
if ($dzien == 26) { $imieniny = "Szczepana, Dionizego, ";}
if ($dzien == 27) { $imieniny = "Jana, Żanety, Fabioli";}
if ($dzien == 28) { $imieniny = "Teofili, Godzisława, Antoniego";}
if ($dzien == 29) { $imieniny = "Dawida, Tomasza, Gosława";}
if ($dzien == 30) { $imieniny = "Eugeniusza, Rainera, Sewera";}
if ($dzien == 31) { $imieniny = "Sylwestra, Melanii, Hermesa";}
}

echo $imieniny;
}
echo '<p class="imieniny">Dzisiaj jest: ';
data();
echo '<br /> Imieniny obchodzą: ';
imieniny();
echo '</p>';

?>