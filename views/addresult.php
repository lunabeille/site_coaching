
<div class="content">
  <p> AJOUTER UN RESULTAT </p>

 <form method="POST" action="/sitecoaching/index.php/addResult">
  <fieldset>
    <legend>Ma Performance</legend>
    <div class="champ"> Sélectionner une course : 
    <select name="race">
    <?php 
    foreach($data as $race => $id)
    {
    // si le nom de la course est en majuscule : déja courue
      if(preg_match('/^[\'A-Z\d\s]+$/', $race))
      {
        echo "<option value=\"$id\" disabled>" . strtolower($race) . "</option>";
      }
      else  
      {
        echo "<option value = \"$id\">" . $race . "</option>";
      }      
    }
    ?>
    </select>
    <a href=""> Ajouter une course </a>
    </div>
    
    <div class="champ"><label for="h">Chrono : </label>
      <input type="text" maxlength=2 size=2 class="chrono" id="h" name="heure" placeholder="hh" required/> :
      <input type="text" maxlength=2 size=2 class="chrono" name="min" placeholder="mm"required/> :
      <input type="text" maxlength=2 size=2 class="chrono" name="sec" placeholder="ss"required/> :     
    </div>
    
    <div class="champ"> <label for="clssmt">Classement : </label>
      <input type="text" size=5 id="clssmt" name="classement"/>
    </div>
    
    <div class="champ"> <label for="comment">Commentaire : </label>
      <textarea rows=4 cols=50 id="comment" name="commentaire"></textarea>
    </div>
    
    <input type="submit" class="submit" value="Enregistrer ma perf" style="float : right">
  </fieldset>
</form>
</div>