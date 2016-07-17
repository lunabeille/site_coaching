<?php 
if(is_ajax_request())
{
  header('Content-Type: application/json');
  echo json_encode($data);
}
else
{
?>

<div class="content">
  <p> AJOUTER UNE COURSE </p>

  <form method="POST" action="/sitecoaching/index.php/addRace" >
    <fieldset>

      <div class="champ">
        <label for="year"> Choisir une année : </label>
        <select name="year" id="year">
          <option value=""> -- année -- </option>
          <option value="2015">2015</option>
          <option value="2016">2016</option>
        </select>
      </div>

      <div class="champ">
        <label for="race"> Sélectionner une course : </label>
        <select name="race" id="race">
          <option value=""> -- courses -- </option>
        </select>
        <input type="text" name="autre_course" id="racename" style="display:none"/>
      </div>

      <div class="champ">
        <label for=""> Sélectionner une date : </label>
        <input type="text" name="race_date" id="datecalender"/>
      </div>

      <div class="champ">
        <input type="radio" name="distance" value="5" class="radio_dist"/> 5 km 
        <input type="radio" name="distance" value="10" class="radio_dist"/> 10 km 
        <input type="radio" name="distance" value="semi" class="radio_dist"/> semi 
        <input type="radio" name="distance" value="marathon" class="radio_dist"/> marathon 
        <input type="radio" name="distance" value="autre" id="other"/> autre
        <input type="text" id="autre" name="distance" style="display:none" placeholder="km"/> 
        </br></br>

      </div>

      <div class="champ">
        <label for"lieu"> Ville (dép.)</label><input type="text" id="lieu" name="lieu"/>
      </div>
      <input type="submit" class="submit" name="valider" value="Enregistrer cette course"/>
     </fieldset>
  </form>
</div>
  <!-- jquery pour les select -->
  <script>
    $(document).ready(function(){
      $('#race').change(function(){
        //on récupère le nom de la course
        var course = $('#race').val();

        if(course != '')
        {
          $.ajax({
            url:'/sitecoaching/index.php/addRace',
            type : 'post',
            data : {'race' : course},
            dataType : 'json',
            success: function(json) {
              $('#lieu').val(json['lieu']);
            }
          });
        }
      });
    });

    $(document).ready(function(){
      $('#year').change(function(){
        //on récupère la valeur de l'année sélectionnée
        var val = $('#year').val();

        if(val != '')
        {
          $('#race').empty();
          $.ajax({
            url:'/sitecoaching/index.php/addRace',
            type : 'post',
            data:{'year' : val},
            dataType: 'json',
            success: function(json) {
              $.each(json, function(index, value)
              {
                $('#race').append('<option value="' + index + '">' + value + '</option>');
              });
                $('#race').append('<option value="autre_course"> Autre course </option>');

            }
          });
        }
      });
    });

    // <-------- jquery pour le calendrier --------->
     $(document).ready(function(){
        $('#datecalender').datepicker();
     });

    // <-------- jquery pour l'input autre distance --------->
     $(document).ready(function(){
        $('.radio_dist').change(function(){
          $('#autre').hide();
        });

        $('#other').change(function(){
          $('#autre').show();
        });
     });

    // <-------- jquery pour l'input autre course --------->
     $(document).ready(function(){
        $('#race').change(function(){
          var valeur_course = $('#race').val();
          (valeur_course == 'autre_course') ? $('#racename').show(): $('#racename').hide();
        });
     });

  </script>
<?php } ?>
