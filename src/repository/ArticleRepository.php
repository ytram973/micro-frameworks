<?php

class ArticleRepository extends Repository
{
    CONST ARTICLE_TABLE="CREATE TABLE IF NOT EXISTS Article ( 
    id int NOT NULL PRIMARY KEY AUTO_INCREMENT,
    content TEXT NOT NULL,
    title VARCHAR(255),
    published_date DATETIME);";


    CONST ARTICLE_INSERT="INSERT INTO Article(content, title) VALUE('titre','text'), ('varchar', 'datetime');";


    private $table;

   function __construct($table){
        $this->table= $table;
    }


    
    public function findAll():array
    {
        $tableau=[];

        $query = "('SELECT * from Article')";
        $this->createTableIfNotExistes($this->table,self::ARTICLE_TABLE,self::ARTICLE_INSERT);

        $this->executeQuery($this->query);

        

        fetchAll( fetch_class, "article")

    }
}