<?php
use Lib\Route;

use App\Controllers\HomeController;

//Instaciamos a la carpeta donde creamos la clase
//require_once '../lib/route.php';


//Instaciamos al nombre que le pusimso en el namepace, luego hacemos uso de la calse Route para poder realizar las funciones




Route::get('/', [HomeController::class,'index']);

Route::get('/contact', function () {
    return "Hola desde la pagina de contacto";
});

Route::get('/about', function () {
    return "Hola desde la pagina acera de el";
});

Route::get('/courses/:prueba', function () {
    return "Hola desde curso de prueba";
});


//Defino la ruta metodo get para poder recuperarlo, donde pongo :slug es para poder colocar lo que capturamos
Route::get('/courses/:slug', function ($slug) {
    return "El valor de slug " . $slug;
});



Route::dispatch();
