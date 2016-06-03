
<div class="content">
  <p> AJOUTER UN RESULTAT </p>

 <form method="POST" action="/sitecoaching/index.php/addResult">
  <fieldset>
    <legend>Ma Performance</legend>
    <div> Sélectionner une course : 
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
    </div>
    
    <div class="champ"> Chrono : 
      <input type="text" maxlength=2 size=2 name="heure" required/> h
      <input type="text" maxlength=2 size=2 name="min" required/> min
      <input type="text" maxlength=2 size=2 name="sec" required/> s     
    </div>
    
    <div class="champ"> Classement : 
      <input type="text" size=5 name="classement"/>
    </div>
    
    <div class="champ"> Commentaire :
      <textarea rows=4 cols=50 name="commentaire"></textarea>
    </div>
    
    <input type="submit" value="Enregistrer ma perf" style="float : right">
  </fieldset>
</form>
</div>