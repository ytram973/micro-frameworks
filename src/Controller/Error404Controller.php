<?php

require_once ".././lib/controller/Controller.php";


class Error404Controller extends controller{
     public function __construct() {
         parent::__construct("./../template/error404.php");
         
     }

        
     
}