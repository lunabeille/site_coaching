<div class="content">
  <p> AJOUTER UN RESULTAT </p>

 <form method="POST" action="/sitecoaching/index.php/addResult">
  <fieldset>
     <legend>Ma Performance</legend>
     <div> 1 - Sélectionner une course : 
     <select name="race">
        <?php 
        foreach($data as $race => $value)
        {
          if(preg_match("[A-Z]*$", $value))
          {
            echo "<option value=\"$value\" disabled>" . $value . "</option>";
          }
          else  
          {
            echo "<option value = \"$value\">" . $value . "</option>";
          }
        }
        ?>
     </select>
     </div>
      <div class="champ"> Chrono : 
        <input type="text" maxlength=2 size=2 name="heure"/> h
        <input type="text" maxlength=2 size=2 name="min"/> min
        <input type="text" maxlength=2 size=2 name="sec"/> s     
      </div>
      <div class="champ"> Classement : 
        <input type="text" size=5 name="classement"/></div>
      <div class="champ"> Commentaire :
      <textarea rows=4 cols=50 name="commentaire"></textarea>
      </div>
      <input type="submit" value="Enregistrer ma perf" style="float : right">
  </fieldset>
</form>
</div>