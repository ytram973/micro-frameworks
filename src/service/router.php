<?php

require "./../src/Controller/HomeController.php";
require "./../src/Controller/LinkController.php";
require "./../src/Controller/Error404Controller.php";
require "./../src/Controller/ConnexionController.php";
require "./../src/Controller/ArticleController.php";
require "./../src/Controller/AdminController.php";
require "./../src/Controller/DeleteController.php";


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
        $controller = new LinkController;
        $controller->renderView();
        break;


    case 'article':
        $controller = new ArticleController;
        $controller->index();
        break;

    case 'connexion':
        $controller = new ConnexionController;
        $controller->index();
        break;

    case 'admin':
        $admin = new AdminController;
        $admin->index();
        break;

    case 'delete':
        $admin = new DeleteController;
        $admin->index();
        break;

    default:
        $controller = new Error404Controller();
        $controller->renderView();
        break;
}
