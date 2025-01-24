<?php
namespace App\Controllers;


class ViewController{
    public function view($route,$data =[]){

        extract($data);

        
        $route = str_replace(",","/",$route);
            

        if(file_exists("../resouces/views/{$route}.php")){
            
            ob_start();
         include "../resouces/views/{$route}.php";
            $content = ob_get_clean();
            return $content;
        } 
            return "el arvhico no existe";
        }
    }


