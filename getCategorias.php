<?php

  $categorias = simplexml_load_file("../arqtest.xml");
  $lista = $categorias->xpath("//tipo[not(.=preceding::tipo)]");
  
  $rstring = "";
  
  usort($lista, 'cmp');
  
  foreach($lista as $c)
  {
    $rstring .= "<option>".$c."</option>";
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

