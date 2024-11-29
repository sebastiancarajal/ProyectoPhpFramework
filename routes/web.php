<?php

    
//Instaciamos a la carpeta donde creamos la clase
//require_once '../lib/route.php';


//Instaciamos al nombre que le pusimso en el namepace, luego hacemos uso de la calse Route para poder realizar las funciones

use Lib\Route;

Route::get('/',function(){
    echo "Hola desde la pagina principal";
});

Route::get('/contact',function(){
    echo "Hola desde la pagina de contacto";
});

Route::get('/about',function(){
    echo "Hola desde la pagina acera de el";
});

Route::dispatch();