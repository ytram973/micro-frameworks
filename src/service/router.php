<?php

require "./../src/Controller/HomeController.php";
require "./../src/Controller/LinkController.php";
require "./../src/Controller/Error404Controller.php";

$page = null;


if (array_key_exists("page", $_GET)) {

    $page = $_GET["page"];
}


switch ($page) {
    case 'home':
        $controller = new HomeController;
        $controller->renderViewWithDateNow();

        break;


    case 'link':
        $controller = new linkController;
        $controller->renderView();
        break;



    default:
        $controller = new Error404Controller();
        $controller->renderView();
        break;
}
