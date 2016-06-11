<!DOCTYPE html>
<html>
    <head>
        <title><?php echo $context['title']; ?></title>
        <meta charset="UTF-8">
        <link rel="shortcut icon" href="../views/favicon.ico" />
        <link rel="stylesheet" type="text/css" href="../views/tables.css">
        <link rel="stylesheet" type="text/css" href="../views/menu.css">
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
