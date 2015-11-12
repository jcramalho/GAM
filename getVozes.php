<?php

  $instrumentos = simplexml_load_file("../arqtest.xml");
  $lista = $instrumentos->xpath("//@voz[not(.=preceding::partitura/@voz)]");
  
  $rstring = "<option>nd</option>";
  
  usort($lista, 'cmp');
  
  foreach($lista as $v)
  {
    $rstring .= "<option>".$v."</option>";
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

