<?php
namespace App\Controllers;



class HomeController
{
    public function index()
    {
        return $this->view('home');
    }

    public function view($route){

            

        
        if(file_exists("../resouces/views/{$route}.php")){
            
            ob_start();
            return include "../resouces/views/{$route}.php";
            $content = ob_get_clean();
            return $content;
        }
        else{
            return "el arvhico no existe";
        }
    }
}
