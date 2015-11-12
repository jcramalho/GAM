<?php

  $instrumentos = simplexml_load_file("../arqtest.xml");
  $lista = $instrumentos->xpath("//designacao[not(.=preceding::designacao)]");
  
  $rstring = "";
  
  usort($lista, 'cmp');
  
  foreach($lista as $inst)
  {
    $rstring .= "<option>".$inst."</option>";
  }
  
  echo $rstring;
  
  //----------------------------------------------------------------
  
  function cmp($a, $b)
  {
    return ((string)$a <= (string)$b) ? -1 : 1;
  }
  
  function debug($mydata)
  {
    echo "<pre>";
    print_r($mydata);
    echo "</pre>";
  }
  
?>

