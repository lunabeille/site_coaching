<div class="content">
<h3> (Ici les dernières news, les photos des dernières courses etc. )</h3>


<form id="save-the-date">
  <fieldset>
    <legend>Save the date !</legend>
      <?php
      setlocale(LC_TIME, 'fr_FR.UTF8', 'fr.UTF8', 'fr_FR.UTF-8', 'fr.UTF-8');      
      if(!empty($data['compet']))
      {
        extract($data['compet']);
        echo"<p><strong> $titre </strong></p>";
        echo "<div><p>$text</p>";
        echo "<p> Date : le ". strftime('%d, %B, %Y', $date) . "</p>";
        echo "<a href=\"http://$site\"> Inscriptions ici </a></div>";
      }
      ?>
      <br/>
      
      ----------------------------------------------------------
      <?php 
        if(!empty($data['entr']))
        {
          extract($data['entr']);
          echo"<p><strong> Prochain entraînement </strong></p>";
          echo "<div>$titre :</div>";
          echo "<div>$text</div>";
        }
      ?>
  </fieldset>
</form>

<div id="last-results">
  <h3> Les dernières perfs de nos champions</h3>
  <?php 
  if(!empty($data["result"]))
  {
    //extract($data["res"]);
    foreach ($data["result"] as $result) 
    {
      echo "<p>";
      echo "<strong>" . $result[titre] . "</strong><br/>";
      echo $result["text"] . "<br/>";
      echo $result["date"] . "<br/>";
      echo '</p>';
    } 
  }
  ?>
</div>


