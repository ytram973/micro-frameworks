<?php

require_once "./../lib/repository/Repository.php";
require_once "./../src/Model/Article.php";
require_once "./../src/Model/User.php";


class ArticleRepository extends Repository
{
    const ARTICLE_TABLE = "CREATE TABLE IF NOT EXISTS article ( 
    id int NOT NULL PRIMARY KEY AUTO_INCREMENT,
    content TEXT NOT NULL,
    title VARCHAR(255),
    published_date DATETIME);";


    const ARTICLE_INSERT = "INSERT INTO article(content, title, published_date) VALUE('titre','text','2022-02-02 00:00:00'), ('varchar', 'datetime', null);";


    private $table;

    function __construct($table)
    {
        $this->table = $table;
    }



    public function findAll(): array
    {
        $this->createTableIfNotExistes($this->table, self::ARTICLE_TABLE, self::ARTICLE_INSERT);
        $query = "SELECT * from $this->table;";

        $result = $this->executeQuery($query);

        return $result->fetchAll(PDO::FETCH_CLASS, $this->table);
        // fetchAll( fetch_class, "article")

    }
    function insert($content, $title, $date)
    {

        $value = [":contentVar" => $content, ":titleVar" => $title, "dateVar" => $date];
        $query = "INSERT INTO article(content, title, published_date) VALUE(:contentVar,:titleVar,:dateVar);";

        $result = $this->executeQuery($query, $value);

        return $result->fetchAll(PDO::FETCH_CLASS, $this->table);
    }


    public function find(int $id): ?Article
    {
        $this->createTableIfNotExistes($this->table, self::ARTICLE_TABLE, self::ARTICLE_INSERT);
        $article = null;
        $query = "SELECT * from article where id =:id;";
        $params = [":id" => $id];

        if (count($result = ($this->executeQuery($query, $params))->fetchAll(PDO::FETCH_CLASS, "article")) > 0) {
            $article = $result[0];
        }



        return $article;
    }




    public function deleted(Article $article): void
    {
        $this->createTableIfNotExistes($this->table, self::ARTICLE_TABLE, self::ARTICLE_INSERT);
        $query = "DELETE FROM article WHERE id = :id";
        $params = [":id" => $article->getId()];
        $this->executeQuery($query, $params);
    }




    // function delete(){

    //     $id = $_GET["id"];

    //     $query = "DELETE FROM article WHERE id = $id";

    //     $result = $this->executeQuery($query);

    //     return $result;
    // }
}
