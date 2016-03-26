<html>
  <body>
 
  <?php
  /* ARC2 static class inclusion */ 
  include_once('semsol/ARC2.php');  
 
  $dbpconfig = array(
  "remote_store_endpoint" => "http://dbpedia.org/sparql",
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

  SELECT DISTINCT ?species ?binomial ?genus ?label
  WHERE { ?species dbpedia-owl:family :Characidae;
        dbpprop:genus ?genus;
        rdfs:label ?label;
        dbpedia2:binomial ?binomial.
        filter ( langMatches(lang(?label), "en") ) }
  ORDER BY ?genus';
  
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
        <th>Species (Label)</th>
        <th>Binomial</th>
        <th>Genus</th>
    </thead>";

    /* loop for each returned row */
    foreach( $rows as $row ) { 
    print "<tr><td>".++$id. "</td>
    <td><a href='". $row['species'] . "'>" . 
    $row['label']."</a></td><td>" . 
    $row['binomial']. "</td><td>" . 
    $row['genus']. "</td></tr>";
    }
    echo "</table>" 

  ?>
  </body>
</html>
