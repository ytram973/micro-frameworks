<?php

require_once "./../lib/controller/Controller.php";

class HomeController extends controller{
     public function __construct() {
         parent::__construct("./../template/view/home.php");
         
     }

    public function renderViewWithDateNow()
    {
        date_default_timezone_set('Europe/Paris');
        $dt1=date('d-m-Y');
        $dt2=date('H:i:s');
        $msgH = "Nous sommes le $dt1, il est $dt2.";
        $this->renderView(["date"=>"$msgH"]);

        
    }
     
}


