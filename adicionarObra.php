<?php
  $obra = simplexml_load_file("./obra.xml");
  
  $obra->addChild('titulo',$_REQUEST['titulo']);
  if(isset($_REQUEST['subtitulo'])) $obra->addChild('titulo',$_REQUEST['subtitulo']);
  $obra->addChild('tipo', $_REQUEST['categoria']);
  if(isset($_REQUEST['compositor'])) $obra->addChild('compositor',$_REQUEST['compositor']);
  if(isset($_REQUEST['arranjo'])) $obra->addChild('arranjo',$_REQUEST['arranjo']);
  
  $instrumentos = $obra->addChild('instrumentos');
  $icont = 1;
  foreach($_REQUEST[instrumento] as $i)
  {
    $inst = $instrumentos->addChild('instrumento');
    $inst->addChild('designacao', $i);
    $inst->addChild('partitura');
    $inst->addAttribute('type', 'PDF');
    if( isset($_REQUEST['voz'][$icont]) ) $inst->addAttribute('type', 'PDF');
    $icont++;
  }
  
  $profs->asXML("professores.xml");
  
  echo "<p>".$_REQUEST['titulo']." adicionada com sucesso.</p>";
  echo "<address><a href='index.html'>Voltar ao início</a></address>";
?>
