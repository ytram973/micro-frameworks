<?php

require_once ".././lib/controller/Controller.php";
require_once "./../src/repository/ArticleRepository.php";


class AdminController extends controller
{
    public function __construct()
    {
        parent::__construct("./../template/view/admin.php");
    }

    public function index()
    {
        var_dump($_POST);

        
        if (
            isset($_POST["title"])
            && isset($_POST["content"])
            && isset($_POST["date"])
            ) {
                $add_article = new ArticleRepository("article");
                $add_article->insert($_POST["content"],$_POST["title"],$_POST["date"]);
                
            }
            $this->renderView([]);
        }
}
