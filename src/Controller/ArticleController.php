<?php

require_once ".././lib/controller/Controller.php";
require_once "./../src/repository/ArticleRepository.php";


class ArticleController extends controller{
     public function __construct() {
         parent::__construct("./../template/view/article.php");
         
     }

       public function index()
       {
           $articleRepository = new ArticleRepository("article");
           $articles = $articleRepository->findAll();
           $this->renderView(["articles" =>$articles]);
       } 
     
}