<?php

class Controller
{

    public function __construct()
    {

    }

    public function loadModel($name)
    {
        require APP_MODEL . DS . $name . '.php';

        $model = new $name;

        if ($model instanceof Model) {
            return $model;
        }

        return null;
    }

    public function loadHelper($name)
    {
        require APP_HELPER . DS . strtolower($name) . '.php';
        $helper = new $name;
        return $helper;
    }

    public function loadView($name)
    {
        $view = new View($name);
        return $view;
    }
}