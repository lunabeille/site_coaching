<?php

class RedirectException extends Exception
{
    private $Controler;
    private $params;

    public function __construct($Controler, $params)
    {
        parent::__construct("redirect tp $controler");

        $this->Controler = $Controler;
        $this->params = $params;
    }

    public function getParams()
    {
        return $this->params;
    }

    public function getControler()
    {
        return $this->Controler;
    }
}