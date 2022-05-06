<?php
include_once "./../template/template_part/_navbar.php";

?>

<h1>ajouter un article</h1>


<form action="" method="POST">
<input type="text" name="title">
<input type="text" name="content">
<input type="date" name="date" id="date">
<input type="submit" value="valider">
</form>

<?php

// $_POST

// CONST ARTICLE_INSERT="INSERT INTO article(content, title, published_date) VALUE('titre','text','2022-02-02 00:00:00'), ('varchar', 'datetime', null);";




?>