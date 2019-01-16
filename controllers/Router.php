<?php
/**
 * Created by PhpStorm.
 * User: quent
 * Date: 16/01/2019
 * Time: 10:59
 */

class Router
{
    private $ctrl;
    private $view;

    public function routeReq()
    {
        try{
            //CLASSES AUTO-LOADING
            spl_autoload_register(function($class){
                require_once('models/'.$class.'.php');
            });

            $url = '';

            if(isset($_GET['url'])){
                $url = explode('/', filter_var($_GET['url'], FILTER_SANIT));
            }}

        catch (Exception $e){

        }

    }
}