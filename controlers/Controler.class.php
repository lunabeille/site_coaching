<?php

abstract class Controler
{
    private $view;

    public function __construct()
    {
        $this->view = strtolower(get_class($this));
    }

    abstract function execute($params = array());

    public function getView()
    {
        return $this->view;
    }

    public function setView($view)
    {
        $this->view = $view;
    }
}