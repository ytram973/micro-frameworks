<?php

class ArticleRepository extends Repository
{
    CONST ARTICLE_TABLE="CREATE TABLE IF NOT EXISTS 
    id int NOT NULL PRIMARY KEY AUTO_INCREMENT,
    content TEXT NOT NULL,
    title VARCHAR(255),
    published_date DATETIME";


    CONST ARTICLE_INSERT="INSERT INTO table_name(colunm_name1, colunm_name2,...) VALUE(VALUE11, VALUE12), (VALUE21, VALUE22),...;";
}