 <div class="content">
  <div>
    <h3>INFORMATIONS SUR LA COURSE</h3>
    <div>
      <p><strong><?php echo $_GET['nom']; ?></strong></p>
    </div>
  </div> 

  <div>
    <h3>ILS ONT PARTICIPE A CETTE COURSE !</h3>
    <p>
      <?php 
      $first = true;
      echo '<table>';
      while(($participant = $data->fetch(PDO::FETCH_ASSOC)))
      {
        if($first)
        {
          echo '<tr>';
          foreach($participant as $key =>$value)
          {
            echo '<th>'.$key.'</th>';
          }
          echo '</tr>';
          $first = false;
        }
        echo'<tr>';
        foreach($participant as $key => $value)
        {
          echo '<td>'.$value.'</td>';
        }
        echo '</tr>';
      }
      echo '</table>';
      ?>
    </p>
  </div>
</div>