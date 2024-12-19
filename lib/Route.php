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

        if(strpos($route, ':')!==false){

            $route = preg_replace('#:[a-zA-Z]+#','([a-zA-Z]+)',$route);

       

        }

        //preg_match para poder verificar mediante expresiones regulares, ahora  ^ esto sirbe para evaluar si se encuentra al principio de la cadena
        //y si termina en $ es para comparar la cadena del final al principio. 
        if(preg_match("#^$route$#", $uri, $matches)){
          


            $params = array_slice($matches, 1);
            
            //Los 3 "..." Sirve para que desectruture el arreglo +
            /*$response = $callback(...$params);*/

            if(is_callable( $callback)){
                $response = $callback(...$params);
            }
            if(is_array($callback)){
                $controller = new $callback[0];
                $response = $controller->{$callback[1]}(...$params);
            }

           if(is_array($response) || is_object($response)){

            header('Content-Type: application/json');
                echo json_encode($response);
           }else{
                echo $response;
           }

            return ;
        }


        /*
     if($route ==$uri){

        $callback();

        return;
     }
*/

    }

    echo '404 NOT FOUND';
  
}

}
