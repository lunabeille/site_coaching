  <?php
  session_start(); 
  ?>
  <div class="content">
  <h3> Bienvenue sur le site de Coachette ! </h3>

  <form method="POST" action="/sitecoaching/index.php/authentification">
  <fieldset class="login-block">
     <legend>  CONNEXION </legend>
      <div> <img src="../views/runner.png" width="30" class="input-logo"><input type="text" name ="login" class="champ" placeholder="LOGIN"/> </div>
      <div> <img src="../views/lock.jpeg" width="30" class="input-logo"><input type="text" name ="passwd" class="champ" placeholder="PASSWORD"/> </div>
      <input type="submit" id ="login" name="login" value="LOG IN">

  </fieldset>
</form>
</div>
