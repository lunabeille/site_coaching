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
        <input type="text" maxlength=2 size=2/> h
        <input type="text" maxlength=2 size=2/> min
        <input type="text" maxlength=2 size=2/> s     
      </div>
      <div class="champ"> Classement : 
        <input type="text" size=5/></div>
      <div class="champ"> Commentaire :
      <textarea rows=4 cols=50></textarea>
      </div>
      <input type="submit" value="Enregistrer ma perf" style="float : right">
  </fieldset>
</form>
</div>