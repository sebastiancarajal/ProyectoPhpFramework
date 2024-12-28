<?php
namespace App\Controllers;


class ViewController{
    public function view($route,$data =[]){

        extract($data);

        return $title;

        $route = str_replace(",","/",$route);
            

        if(file_exists("../resouces/views/{$route}.php")){
            
            ob_start();
            return include "../resouces/views/{$route}.php";
            $content = ob_get_clean();
            return $content;
        } 
            return "el arvhico no existe";
        }
    }


