<!DOCTYPE html>
<html>
    <head>
        <title><?php echo $context['title']; ?></title>
        <meta charset="UTF-8">
        <link rel="shortcut icon" href="../views/favicon.ico" />
        <link rel="stylesheet" type="text/css" href="../views/tables.css">
        <link rel="stylesheet" type="text/css" href="../views/menu.css">
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.js"></script>
        <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
        <script src ="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.4/build/jquery.datetimepicker.full.js"></script>
    </head>
    <body>
        <?php
          // on n'affiche le menu que lorsque l'utilisateur est connecté
          if(!empty($_SESSION))
          {
            require_once ('menu.php');
          }
          if($data) extract($data); 
          require($view); 
        ?>
    </body>
</html>
