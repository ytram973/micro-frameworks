<?php

require_once ".././lib/controller/Controller.php";
require_once "./../src/repository/ArticleRepository.php";


class UpdateController extends controller
{
    public function __construct()
    {
        parent::__construct("./../template/view/update_article.php");
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
            if (!empty($article)
                &&isset($_POST["title"])
                && isset($_POST["content"])) {
                $content = $_POST["content"];
                $title = $_POST["title"];
                

                $articleRepository->update($content, $title, $article);
            }
        }
        $this->renderView(["articles" => $articleRepository->findAll()]);
    }
}
