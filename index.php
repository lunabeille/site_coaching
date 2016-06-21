<?php

const CONTROLER_DIR = 'controlers';
const LIB_DIR = 'lib';
const VIEW_DIR = 'views';
const DEFAULT_CONTROLER = 'displayProfile';

$context = array(
    'layout' => 'layout',
    'ajax_layout' => 'ajax_layout',
    'title'  => 'RUN FOR YOUR LIFE'
);

$path = dirname(__FILE__);
set_include_path(
    get_include_path()
    . ":$path/" . CONTROLER_DIR  . '/'
    . ":$path/" . LIB_DIR . '/'
);

function __autoload($classname)
{
    require_once($classname . '.class.php');
}

function routing($uri)
{
    $pattern = '# /([a-zA-Z_]+ (?:\.[a-z]+)? ) #xms';
    
    if($uri === '' || $uri === '/')
    {
        
        $uri = '/' . DEFAULT_CONTROLER;
    }

    if(!preg_match_all($pattern, $uri, $matches))
    {
        throw new Exception("Couldnt determine controler from uri : $uri");
    }

    $path = $matches[1];
   
    // removes index.php if its in the path (no url rewriting)
    for($i = 0, $l = count($path); $i < $l; $i++)
    {
        if($path[$i] === basename(__FILE__))
        {
            array_splice($path, 0, $i +1);
            break; 
        }   
    }

    $l = count($path);
    if($l === 0)
    {
        $l = 1;
        $path = array(DEFAULT_CONTROLER);
    }

    $Controler = $path[$l - 1] = ucfirst($path[$l - 1]);

    return array(
        $Controler,
        CONTROLER_DIR . '/' . implode('/', $path) . '.class.php'
    );
}

function is_ajax_request()
{
    return (isset($_SERVER['HTTP_X_REQUESTED_WITH']) 
        && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest');
}


function main()
{
    global $context;

    // ex : URI = 'index.php/displayProfile'
    // retrieves controler and verifies its a Controler ancestor
    session_start();
    list($Controler, $path) = routing($_SERVER['REQUEST_URI']);
    //$Controler = 'DisplayProfile'
    
    if(!(isset($_SESSION["user_id"])))
    {
      header("/sitecoaching/index.php/authentification");
    }
    $params = array();

    $done = false; 
    do
    {
        //on vérifie que la classe étend bien Controler
        if(!is_subclass_of($Controler, 'Controler'))
        {
            throw new Exception("$Controler class must extend class : Controler");
        }

        //on instancie un objet en fonction de la classe 
        try
        {
            $controler = new $Controler();
            //on exécute le controleur et on récupère les données
            $data = $controler->execute($params);
            $done = true;    
        }
        //en cas de redirection de controleur
        catch(RedirectException $e)
        {
            $Controler = $e->getControler();
            $params = $e->getParams();
        }
    }
    //pour que la boucle ne s'exécute qu'une fois
    while(!$done);

    // on prépare la vue à afficher
    // en récupérant le nom de la vue dans le controle
    $view = VIEW_DIR . '/' . $controler->getView() . '.php';

    $layout = $context[is_ajax_request() ? 'ajax_layout' : 'ajax'];
    
    // on inclut le layout
    require(VIEW_DIR . '/' . $layout . '.php');
}

main();
