<?php
$xmlDoc=new DOMDocument();
$xmlDoc->load("lecturas.xml");

$x=$xmlDoc->getElementsByTagName('link');

//Recupera el parámetro q desde la URL
$q=$_GET["q"];
$hint="";

//Comprueba todos los enlaces del archivo xml si la longitud es superior a 0
if (strlen($q)>0) {
  $hint="";
  for($i=0; $i<($x->length); $i++) {
    $y=$x->item($i)->getElementsByTagName('title');
    $z=$x->item($i)->getElementsByTagName('url');
    if ($y->item(0)->nodeType==1) {
      //Encuentra el enlace comparándolo con el texto de búsqueda
      if (stristr($y->item(0)->childNodes->item(0)->nodeValue,$q)) {
        if ($hint=="") {
          $hint="<a href='" .
          $z->item(0)->childNodes->item(0)->nodeValue .
          "' target='_blank'>" .
          $y->item(0)->childNodes->item(0)->nodeValue . "</a>";
        } else {
          $hint=$hint . "<br /><a href='" .
          $z->item(0)->childNodes->item(0)->nodeValue .
          "' target='_blank'>" .
          $y->item(0)->childNodes->item(0)->nodeValue . "</a>";
        }
      }
    }
  }
}

// Si no encuentra nada devuelve una respuesta estándar 
// Y si encuentra devuelve los valores correspondientes
if ($hint=="") {
  $response="Lo siento, no se encuentra nada";
} else {
  $response=$hint;
}

//Resultado de la respuesta
echo $response;
?> 