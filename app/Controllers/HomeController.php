<?php
namespace App\Controllers;

use App\Models\Contact;

class HomeController extends ViewController 
{
    public function index()
    {

        $contacModel = new Contact();
        return $this->view('home',[
                'title'=> 'Home',
                'description' => 'Esta es la pagina home'
        ]);
    }

}