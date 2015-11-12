<?php

  $obras = simplexml_load_file("../arqtest.xml");
  $obra = $obras->xpath("//obra[@id='".$_REQUEST['idObra']."']");
  
  # LOAD XML FILE
  $xml = new DOMDocument(); 
  $xml->loadXML($obra[0]->asXML());
 
  # START XSLT
  $xslt = new XSLTProcessor();
  $XSL = new DOMDocument();
  $XSL->load( 'obra.xsl', LIBXML_NOCDATA);
  $xslt->importStylesheet( $XSL );
  #PRINT
  print $xslt->transformToXML( $xml );
  
?>

