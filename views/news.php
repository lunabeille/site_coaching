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
    echo "<a href=\"$site\"> Inscriptions ici </a>";
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


