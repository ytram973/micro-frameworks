<?php
include_once "./../template/template_part/_navbar.php";

?>


<h1>CONNEXION</h1>

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





<form action="" method="POST">

  <input type="text" id="username" name="username">
  <input type="password" id="password" name="password">
  <input type="submit" value="Se connecter">

</form>





