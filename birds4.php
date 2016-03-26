<html>
  <body>
 
  <?php
  /* ARC2 static class inclusion */ 
  include_once('semsol/ARC2.php');  
 
  $dbpconfig = array(
  "remote_store_endpoint" => "http://dbpedia.org/snorql/",
   );
 
  $store = ARC2::getRemoteStore($dbpconfig); 
  if ($errs = $store->getErrors()) {
     echo "<h1>getRemoteSotre error<h1>" ;
  }
 
  $query = '
  PREFIX dbpedia-owl: <http://dbpedia.org/ontology/>
  PREFIX owl: <http://www.w3.org/2002/07/owl#>
  PREFIX xsd: <http://www.w3.org/2001/XMLSchema#>
  PREFIX rdfs: <http://www.w3.org/2000/01/rdf-schema#>
  PREFIX rdf: <http://www.w3.org/1999/02/22-rdf-syntax-ns#>
  PREFIX foaf: <http://xmlns.com/foaf/0.1/>
  PREFIX dc: <http://purl.org/dc/elements/1.1/>
  PREFIX : <http://dbpedia.org/resource/>
  PREFIX dbpedia2: <http://dbpedia.org/property/>
  PREFIX dbpedia: <http://dbpedia.org/>
  PREFIX dbpprop: <http://dbpedia.org/property/>
  PREFIX owl: <http://www.w3.org/2002/07/owl#>
  PREFIX xsd: <http://www.w3.org/2001/XMLSchema#>
  PREFIX rdfs: <http://www.w3.org/2000/01/rdf-schema#>
  PREFIX rdf: <http://www.w3.org/1999/02/22-rdf-syntax-ns#>
  PREFIX foaf: <http://xmlns.com/foaf/0.1/>
  PREFIX dc: <http://purl.org/dc/elements/1.1/>
  PREFIX : <http://dbpedia.org/resource/>
  PREFIX dbpedia2: <http://dbpedia.org/property/>
  PREFIX dbpedia: <http://dbpedia.org/>
  PREFIX skos: <http://www.w3.org/2004/02/skos/core#>


SELECT ?BIRD_NAME ?BIO_NAME ?IMAGE ?BIRD_DESCRIPTION str(?CONSV_STATUS) ?ORDER ?FAMILY ?GENUS ?SPECIES ?BIN_AUTH
WHERE {
?x dbp:binomial ?BIO_NAME .
FILTER (?BIO_NAME IN ("Vanellus vanellus"@en ,"Vanellus duvaucelii"@en ,"Vanellus malabaricus"@en ,"Vanellus indicus"@en ,"Recurvirostra avosetta"@en ,"Himantopus himantopus"@en ,"Sterna aurantia"@en ,"Gelochelidon nilotica"@en ,"Chlidonias hybrida"@en ,"Sternula albifrons"@en ,"Rynchops albicollis"@en ,"Larus ichthyaetus"@en ,"Chroicocephalus genei"@en ,"Chroicocephalus ridibundus"@en ,"Chroicocephalus brunnicephalus"@en ,"Larus cachinnans"@en ,"Ardeola grayii"@en ,"Ardea cinerea"@en ,"Nycticorax nycticorax"@en ,"Amaurornis akool"@en ,"Rallus aquaticus"@en ,"Porzana pusilla"@en ,"Porzana fusca"@en ,"Ixobrychus sinensis"@en ,"Phalacrocorax fuscicollis"@en ,"Microcarbo niger"@en ,"Phalacrocorax carbo"@en ,"Anhinga melanogaster"@en ,"Ceryle rudis"@en ,"Megaceryle lugubris"@en ,"Halcyon smyrnensis"@en ,"Grus antigone"@en ,"Grus virgo"@en ,"Pseudibis papillosa"@en ,"Plegadis falcinellus"@en ,"Ephippiorhynchus asiaticus"@en ,"Mycteria leucocephala"@en ,"Ciconia episcopus"@en ,"Pandion haliaetus"@en ,"Circus aeruginosus"@en ,"Milvus migransgovinda"@en ,"Elanus caeruleus"@en ,"Hydrophasianus chirurgus"@en,"Burhinus Oedicnemus indicus"@en ,"Esacus recurvirostris"@en ,"Copsychus saularis"@en ,"Saxicoloides fulicatus"@en ,"Passer domesticus"@en ,"Saxicola torquata"@en ,"Hirundo smithii"@en ,"Hirundo rustica"@en ,"Cecropis daurica"@en ,"Orthotomus sutorius"@en ,"Parus major"@en ,"Zosterops ceylonensis"@en ,"Motacilla maderaspatensis"@en ,"Motacilla alba"@en ,"Motacilla citreola"@en ,"Motacilla cinerea"@en ,"Motacilla flava"@en ,"Anthus richardi"@en ,"Anthus similis"@en ,"Anthus campestris"@en ,"Anthus rufulus"@en ,"Anthus godlewski"@en ,"Anthus sylvanus"@en ,"Anthus roseatus"@en ,"Anthus hodgsoni"@en ,"Anthus spinoletta"@en ,"Alauda arvensis"@en ,"Melanocorypha bimaculata"@en ,"Calandrella raytal"@en ,"Alauda gulgula"@en ,"Eremopterix grisea"@en ,"Galerida cristata"@en ,"Calandrella acutirostris"@en ,"Mirafra erythroptera"@en ,"Lanius schach"@en ,"Lanius vittatus"@en ,"Turdoides caudatus"@en ,"Turdoides subrufus"@en ,"Chrysomma sinense"@en ,"Megalaima asiatica"@en ,"Megalaima virens"@en ,"Megalaima zeylanica"@en ,"Turdus boulboul"@en ,"Pycnonotus leucogenys"@en ,"Pycnonotus cafer"@en ,"Melophus lathami"@en ,"Emberiza cia"@en ,"Saxicola ferrea"@en ,"Saxicola caprata"@en ,"Centropus sinensis"@en ,"Corvus splendens"@en ,"Corvus macrorhynchos"@en ,"Streptopelia orientalis"@en ,"Spilopelia senegalensis"@en ,"Spilopelia chinensis"@en ,"Streptopelia tranquebarica"@en ,"Dicrurus macrocercus"@en ,"Francolinus francolinus"@en ,"Francolinus pondicerianus"@en ,"Gallus gallus"@en ,"Pavo cristatus"@en ,"Gyps himalayensis"@en ,"Bubo bubo"@en ,"Glaucidium cuculoides"@en ,"Psittacula eupatria"@en ,"Psittacula krameri"@en ,"Psittacula cyanocephala"@en ,"Acridotheres ginginianus"@en ,"Acridotheres fuscus"@en ,"Acridotheres tristis"@en ,"Sturnia pagodarum"@en ,"Sturnus vulgaris"@en ,"Oenanthe deserti"@en ,"Oenanthe isabellina"@en ,"Oenanthe picata"@en ,"Merops philippinus"@en ,"Merops orientalis"@en ,"Coracias benghalensis"@en ,"Coracias garrulus"@en ,"Rhyacornis fuliginosa"@en ,"Chaimarrornis leucocephalus"@en ,"Phoenicurus ochruros"@en  ,"Gallinago solitaria"@en ,"Gallinago stenura"@en
 ,"Gallinago megala"@en ,"Tringa stagnatilis"@en ,"Tringa guttifer"@en ,"Calidris alba"@en ,"Calidris subminuta"@en ,"Calidris feruginea"@en ,"Limicola falcinellus"@en ,"Larus barabensis"@en ,"Larus fuscus"@en ,"Larus brunnicephalus"@en ,"Larus ridibundus"@en
 ,"Larus genei"@en ,"Larus minutus"@en ,"Larus canus"@en ,"Sterna hirundo"@en ,"Sterna acuticauda"@en ,"Chlidonias hybridus"@en ,"Megaceryle lugubris"@en )). OPTIONAL {?x rdfs:label ?BIRD_NAME. }.  OPTIONAL {?x dbo:thumbnail ?IMAGE. }.OPTIONAL {?x dbo:abstract ?BIRD_DESCRIPTION. }. OPTIONAL {?x dbo:conservationStatus ?CONSV_STATUS. }. OPTIONAL {?x dbo:conservationStatusSystem ?CONSV_STATUS_SYST. }.  OPTIONAL {?x dbo:kingdom ?KINGDOM. }.  OPTIONAL {?x dbo:phylum ?PHYLUM. }.  OPTIONAL {?x dbo:class ?CLASS. }.  OPTIONAL {?x dbo:order ?ORDER. }.  OPTIONAL {?x dbo:genus ?GENUS. }.  OPTIONAL {?x dbp:species ?SPECIES. }.  OPTIONAL {?x dbp:binomial ?BIN_NAME. }. OPTIONAL {?x dbo:binomialAuthority ?BIN_AUTH. }.FILTER (lang(?BIRD_NAME) = "en")
}';
  
  /* execute the query */
  $rows = $store->query($query, 'rows'); 
 
    if ($errs = $store->getErrors()) {
       echo "Query errors" ;
       print_r($errs);
    }
 
    /* display the results in an HTML table */
    echo "<table border='1'>
    <thead>
	<th>#</th>        
	<th>BIRD NAME</th>
        <th>IMAGE</th>
        <th>BIRD DESCRIPTION</th>
        <th>CONSERVATION STATUS</th>
	<th>ORDER</th>
        <th>FAMILY</th>
        <th>GENUS</th>
        <th>SPECIES</th>
        <th>BINOMIAL NAME</th>
        <th>BINOMIAL AUTHORITY</th>
    </thead>";

    /* loop for each returned row */
    foreach( $rows as $row ) { 
    print "<tr><td>".++$id. "</td>
    <td><a href='". $row['species'] . "'>" . 
    $row['BIRD_NAME']."</a></td><td>" . 
    $row['BIO_NAME']. "</td><td>" . 
    $row['IMAGE']. "</td><td>" . 
    $row['BIRD_DESCRIPTION']. "</td><td>" . 
    $row['CONSV_STATUS']. "</td><td>" . 
    $row['ORDER']. "</td><td>" . 
    $row['FAMILY']. "</td><td>" . 
    $row['GENUS']. "</td><td>" . 
    $row['SPECIES']. "</td><td>" . 
    $row['BINOMIAL_AUTH']. "</td></tr>";
    }
    echo "</table>" 

  ?>
  </body>
</html>
