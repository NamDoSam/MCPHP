<?php
  // alamacenara todos nuestro idiomas
  $idiomas = array("en","es","br","pt");

  //Creamos una función que detecte el idioma del navegador del cliente.
  function getUserLanguage() { 
       $idioma =substr($_SERVER["HTTP_ACCEPT_LANGUAGE"],0,2);
       return $idioma; 
  }

  //Almacenamos dicho idioma en una variable.
  		$user_language=getUserLanguage();
		//$user_language="br";

  // pasamos el language a mayuscula para no tener errores.
  //verificamos que tengamos dicho idioma en nuestro arreglo con in_array.
  if (in_array($user_language, $idiomas)) {
       // ahora redirigimos al idioma correcto
       require_once($url."idiomas/".$user_language.".php");
  }

  else{ // en caso contrario mandamos un idioma por defecto 
		$letras="en";
       require_once($url."idiomas/".$letras.".php");
  }
  
  
?>