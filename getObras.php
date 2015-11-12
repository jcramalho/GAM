<?php

  $obras = simplexml_load_file("../arqtest.xml");
  $lista = $obras->xpath("//obra");
  
  $rstring = "";
  
  usort($lista, 'cmp');
  
  foreach($lista as $obra)
  {
    $rstring .= "<option value='".$obra['id'].
                "'>".$obra->titulo."</option>";
  }
  
  echo $rstring;
  
  //----------------------------------------------------------------
  
  function cmp($a, $b)
  {
    return ((string)$a->titulo <= (string)$b->titulo) ? -1 : 1;
  }
  
?>

