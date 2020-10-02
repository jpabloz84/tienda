<?php
function base_url($filecalled=""){
  $base_url=sprintf(
    "%s://%s%s",
    isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off' ? 'https' : 'http',
    $_SERVER['SERVER_NAME'],
    $_SERVER['REQUEST_URI']
  );
  if($filecalled!=""){
  $base_url=str_replace($filecalled, "",$base_url);  
  }
  return $base_url;
}

function savelog($fichero,$infotxt){  
  date_default_timezone_set('America/Argentina/Buenos_Aires');    
  $fechahora=strftime("%d-%m-%Y %H:%M:%S");
  $exito=false;
  try {
    // Abre el fichero para obtener el contenido existente
    $actual = file_get_contents($fichero);
    // Añade un nuevo log
    $actual.=$fechahora."\n";
    $actual.=$infotxt."\n";
    // Escribe el contenido al fichero
    file_put_contents($fichero, $actual);    
    $exito=true;
    } catch (Exception $e) {
      
    }  
    return $exito;
  
}

?>