<?php

/**
 * Class controllerPages
 */
class controllerPages
{
    private $model = null;

    function __construct()
    {

    }
    function afficher($type/*, $page_name*/)
    {
        switch($type)
        {
            // HOME PAGE
            case "home":
                require_once('models/modelHome.php');
                $this->model = new modelHome();
                $donnees = $this->model->afficherEvents();
                require_once('views/viewHome.html.php');
                break;

            // EVENTS PAGE
            case "events":
                require_once('models/modelHome.php');
                $this->model = new modelHome();
                $donnees = $this->model->afficherEvents();
                require_once('views/viewHome.html.php');
                break;

            // DEFAULT SHOW HOME PAGE
            default:
                require_once('models/home.php');
                $this->model = new modelHome();
                $donnees = $this->model->afficherEvents();
                require_once('views/viewHome.html.php');
                break;
        }
    }
}
