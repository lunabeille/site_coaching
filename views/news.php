<div class="content">
  <h3> (Ici les dernières news, les photos des dernières courses etc. )</h3>
<div> 
  <?php 
  if(!empty($data['compet']))
  {
    extract($data['compet']);
    echo"<p><strong> $titre </strong></p>";
    echo "<p>$text</p>";
    echo "<p> La date to save : $date </p>";
    echo "<a href=\"http://$site\"> Inscriptions ici </a>";
  }
?>
</div>
<br/>
<br/>
<br/>

<div>
<?php 
  if(!empty($data['entr']))
  {
    extract($data['entr']);
    echo"<p><strong> Save the date ! </strong></p>";
    echo "<div>$titre :</div>";
    echo "<div>$text</div>";
  }
?>
</div>
<br/>
<br/>
<br/>

<div>
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


