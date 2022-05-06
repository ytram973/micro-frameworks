<?php
include_once "./../template/template_part/_navbar.php";

?>


<h1>article</h1>

<?php var_dump($_SESSION); ?>

<?php include_once "./../template/view/add_article.php"; ?>

<table class="table">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Title</th>
            <th scope="col">Content</th>
            <th scope="col">Published_date</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($options['articles'] as $key => $article) { ?>
            <tr>
                <th scope="row"><?php echo $article->getId()  ?></th>
                <td><?php echo $article->getTitle() ?></td>
                <td><?php echo $article->getContent() ?></td>
                <td><?php echo $article->getPublishedDate() ?></td>
            </tr>
        <?php } ?>
    </tbody>
</table>