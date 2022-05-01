<?php


abstract class controller
{
    private $path;

    function __construct($path)
    {$this->path = $path;
        
    }

    function renderView($options=["error404"=>"Page not found"]){
        require $this->path;
        
    }
}



