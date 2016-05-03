<!DOCTYPE html>
<html>
    <head>
        <title><?php echo $context['title']; ?></title>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="../views/tables.css">
        <link rel="stylesheet" type="text/css" href="../views/menu.css">
    </head>
    <body>
        <?php 
          require_once ('menu.php');
          if($data) extract($data); 
          require($view); 
        ?>
    </body>
</html>
