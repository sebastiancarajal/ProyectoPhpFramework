<?php

namespace Lib; //El nombre de la carpeta 

class Route 

{

private static $routes = [];

//Se encargara de llamar rutas metodos get
public static function get($uri,$callback)
{     $uri = trim($uri, '/'); // Elimina las barras iniciales y finales
    //Self hace referencia a la variable que es statico
    self::$routes['GET'][$uri] = $callback;
}

//Se encargara de llamar rutas metodos post
public static function post($uri,$callback)
{
    $uri = trim($uri, '/'); // Elimina las barras iniciales y finales
    self::$routes['POST'][$uri] = $callback;
}

//Vamos a recupera la uri el cual el cliente va a dirigir en una de las paginas
public static function dispatch(){

    $uri = $_SERVER['REQUEST_URI'];
    $uri = trim($uri, '/'); // Elimina las barras iniciales y finales
    $metodo =$_SERVER['REQUEST_METHOD'];


    //Accedere a un arreglo static
    foreach (self::$routes[$metodo] as $route => $callback) {
        
     if($route ==$uri){

        $callback();

        return;
     }


    }

    echo '404 NOT FOUND';
  
}

}
