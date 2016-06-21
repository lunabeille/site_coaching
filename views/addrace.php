<div class="content">
  <p> AJOUTER UNE COURSE </p>

  <form action="/sitecoaching/index.php/addRace">
    <fieldset>
      <div class="champ"><label for="year"> Choisir une année : </label>
        <select name="year" id="year">
          <option value="2015">2015</option>
          <option value="2016">2016</option>
        </select>
      </div>

      <div class="champ"><label for="race"> Choisir une année : </label>
        <select name="race" id="race">
          <option value=""> -- courses -- </option>
          
        </select>
      </div>


    </fieldset>
  </div>
  <!-- jquery pour les select -->
  <script>
    $(document).ready(function(){
      //objets jquery
      var $year = ('#year'); 
      var $race = ('#race');

      $year.on('change', function(){
        //on récupère la valeur de l'année sélectionnée
        var val = $(this).val();

        if(val != '')
        {
          $race.empty();
          $.ajax({
            url:'/sitecoaching/index.php/addRace',
            data:'year' + val,
            dataType: 'json',
            success: function(json) {
              $.each(json, function(index, value)
              {
                $race.append('<option value="' + index + '">' + value + '</option>');
              })
            }

          })
        }
      })

    });

  </script>