<?php
/**
 * Created by PhpStorm.
 * User: quent
 * Date: 16/01/2019
 * Time: 14:58
 */

class ControllerHome
{
    private $eventManager;
    private $view;

    public function __construct($url)
    {
        if(isset($url) && count($url) > 1)
            throw new Exception('Page introuvable');
        else
            $this->events();
    }

    private function events(){
        $this->eventManager = new EventManager;
        $events = $this->eventManager->getEvents();

        require_once('views/viewHome.php');
    }
}