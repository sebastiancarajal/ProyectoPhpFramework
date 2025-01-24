<?php
namespace App\Models;

use mysqli;


claSS Contact{

    protected $db_host = 'localhost';
    protected $db_user = 'root';
    protected $db_pass = '';
    protected $db_name= 'mvc';

    protected $connection;


    public function __construct(){
        $this->connection();
    }
    
        
    

    public function connection(){
        
      $this->connection= new mysqli($this->db_host, $this->db_user, $this->db_pass, $this-> db_name);
        
      if ($this->connection->connect_error){
        die('Error de conexcion: ' . $this->connection->connect_error);
      }

    }
    

}

