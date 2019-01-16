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

            // INCLUDE CONTROLLER FOR EACH USER ACTION
            if(isset($_GET['url'])){
                $url = explode('/', filter_var($_GET['url'], FILTER_SANITIZE_URL));

                $controller = ucfirst(strtolower($url[0]));
                $controllerClass = "Controller".$controller;
                $controllerFile = "controllers/".$controllerClass.".php";

                if(file_exists($controllerFile)){
                    require_once($controllerFile);
                    $this->ctrl = new $controllerClass($url);
                }
                else
                    throw new Exception('Page introuvable');
            }
            else {
                require_once('controllers/ControllerHome.php');
                $this->ctrl = new ControllerHome($url);
            }
        }

        catch (Exception $e){
            $errorMsg = $e->getMessage();
            require_once('views/viewError.php');
        }

    }
}