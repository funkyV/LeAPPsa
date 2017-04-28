<?php
require_once("/inc/header.php");
?>
<div id="site_content">
     
      <div id="content">
       <form action="methods/login_process.php" method="post" style="width:300px;margin:0 auto;">
                   <?php
                  if (!empty($_GET["err"]))
                  echo $_GET["err"]."<br/>";
                  ?>
                   <label for="email">Email:</label><input type="email" id="email" name="email">
                  <br/>
                  <label for="password">Password:</label>
                  <input type="password" id="password" name="password">
                  <br/>
                  <a href="register.php">Nu ai cont? Inregistreaza-te!</a><br/>
                  <a href="register.php">Ai uitat parola?</a>
                  <input type="submit" value="Login">
         </form>
      </div>
</div>
<?php
require_once("inc/footer.php");
?>
