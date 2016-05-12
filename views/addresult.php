<div class="content">
  <p> AJOUTER UN RESULTAT </p>

 <form method="POST" action="/sitecoaching/index.php/addResult">
  <fieldset>
     <legend>Ma Performance</legend>
     <div> 1 - Sélectionner une course : 
     <select>
        <?php 
        var_dump($data);
        foreach($data as $race => $value)
        {
          echo "<option>" . $value . "</option>";
        }
        ?>
     </select>
     </div>
      <div class="champ"> Chrono : 
        <input type="text"/></div>
      <div class="champ"> Classement : 
        <input type="text"/></div>
      <div class="champ"> Commentaire :
        <input type="text"/></div>
        <input type="submit" style="float : right">
  </fieldset>
</form>
</div>