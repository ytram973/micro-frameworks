<?php
include_once "./../template/template_part/_navbar.php";

?>




<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
<?php 
  if ($options["responseType"]==="success") {?>
    <div class="alert alert-primary" role="alert">
  This is a primary alert with <a href="#" class="alert-link">good</a>. Give it a click if you like.
  </div>
  <?php } ?>

  <?php 
  if ($options["responseType"]==="error") {?>
   <div class="alert alert-danger" role="alert">
  This is a danger alert with <a href="#" class="alert-link">not good</a>. Give it a click if you like.
</div>
  <?php } ?>


    <h1>Modifier les champs et enregistrer</h1>

    <form action="" method="POST">
        <input type="text" name="title" id="">

        <input type="text" name="content" id="">
        
        <input type="submit" value="validation">
    </form>


</body>

</html>