  <?php
  session_start(); 
  ?>
  <div class="content">
  <h3 id="welcome"> Bienvenue sur le site de coachette ! </h3>

  <form method="POST" action="/sitecoaching/index.php/authentification">
  <fieldset class="login-block">
      <div> <img src="../views/runner2.png" width="25" class="input-logo"><input type="text" name ="login" class="champ" placeholder="LOGIN"/> </div>
      <div> <img src="../views/lock.png" width="25" class="input-logo"><input type="text" name ="passwd" class="champ" placeholder="PASSWORD"/> </div>
      <input type="submit" id ="login" name="login" value="CONNEXION">

  </fieldset>
</form>
</div>
