<?php
include_once "./../template/template_part/_navbar.php";

?>


<h1>article</h1>

<?php var_dump($_SESSION); ?>

<?php include_once "./../template/view/add_article.php"; ?>

<form action="" method="">
<table class="table">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Title</th>
            <th scope="col">Content</th>
            <th scope="col">Published_date</th>
            <?php if (isset($_SESSION["user_is_connexion"]) && $_SESSION["user_is_connexion"]) { ?>
            <th scope="col">Action</th>
            <?php } ?>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($options['articles'] as $key => $article) { ?>
            <tr>
                <th scope="row"><?php echo $article->getId()  ?></th>
                <td><?php echo $article->getTitle() ?></td>
                <td><?php echo $article->getContent() ?></td>
                <td><?php echo $article->getPublishedDate() ?></td>
                
                
                    <?php if (isset($_SESSION["user_is_connexion"]) && $_SESSION["user_is_connexion"]) { ?>
                    <td>                    
                        <a href="/?page=delete&id=<?php
                    echo $article->getId()?>">supprimer</a> 
                    </td>
                    <?php } ?>

                    <?php if (isset($_SESSION["user_is_connexion"]) && $_SESSION["user_is_connexion"]) { ?>
                    <td>                    
                        <a href="/?page=update&id=<?php
                    echo $article->getId()?>">modifier</a> 
                    </td>
                    <?php } ?>
            </tr>
        <?php } ?>
    </tbody>
</table>
</form>