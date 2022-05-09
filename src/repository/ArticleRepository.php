<?php

require_once "./../lib/repository/Repository.php";
require_once "./../src/Model/Article.php";
require_once "./../src/Model/User.php";


class ArticleRepository extends Repository
{
    CONST ARTICLE_TABLE="CREATE TABLE IF NOT EXISTS article ( 
    id int NOT NULL PRIMARY KEY AUTO_INCREMENT,
    content TEXT NOT NULL,
    title VARCHAR(255),
    published_date DATETIME);";


    CONST ARTICLE_INSERT="INSERT INTO article(content, title, published_date) VALUE('titre','text','2022-02-02 00:00:00'), ('varchar', 'datetime', null);";


    private $table;

   function __construct($table){
        $this->table= $table;
    }


    
    public function findAll():array
    {
        $this->createTableIfNotExistes($this->table,self::ARTICLE_TABLE,self::ARTICLE_INSERT);
        $query = "SELECT * from $this->table;";

        $result = $this->executeQuery($query);

        return $result -> fetchAll(PDO::FETCH_CLASS, $this->table);
        // fetchAll( fetch_class, "article")

    }
     function insert($content,$title,$date){

        $value = [":contentVar"=>$content,":titleVar"=>$title,"dateVar"=>$date];
        $query = "INSERT INTO article(content, title, published_date) VALUE(:contentVar,:titleVar,:dateVar);";
        
        $result = $this->executeQuery($query,$value);

        return $result -> fetchAll(PDO::FETCH_CLASS, $this->table);
    }

    function delete(){
        $id = $_GET["id"];

        $query = "DELETE FROM article WHERE id = $id";

        $result = $this->executeQuery($query);

        return $result;
    }
}