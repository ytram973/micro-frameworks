<?php

require_once ".././lib/controller/Controller.php";
// require_once "./../src/repository/ArticleRepository.php";


class DeleteController extends controller
{
    public function __construct()
    {
        parent::__construct("./../template/view/del_article.php");
    }

    public function index()
    {
        
        
            $this->renderView([]);
    }
}
