<?php

require_once ".././lib/controller/Controller.php";
require_once "./../src/repository/ArticleRepository.php";


class DeleteController extends controller
{
    public function __construct()
    {
        parent::__construct("./../template/view/article.php");
    }

    public function index()
    {

        $articleRepository = new ArticleRepository("article");
        if (
            isset($_SESSION["user_is_connexion"])
            && $_SESSION["user_is_connexion"]
            && isset($_GET["id"])
            ) {
                $article = $articleRepository->find($_GET["id"]);
            if (!empty($article)) {
                $articleRepository->deleted($article);
            }
        }
        $this->renderView(["articles" => $articleRepository->findAll()]);
    }
}
