<?php
namespace Core;

use Exception;
use ReflectionMethod;
use Core\Session;

class System {

    private $controllerIntance;

    public function run() {

        try {
            $router = new Router();
            
            // Carregando informacoes da classe para instanciar
            $controller = $router->getController();
            $action = $router->getAction();
            $parms = $router->getParms();
            $method = $router->getMethod();

            // Instanciando classe e setando parametros por reflection
            $this->controllerIntance = new $controller;
            
            $reflectionMethod = new ReflectionMethod($controller, $action);
            $reflectionMethod->invokeArgs($this->controllerIntance, $parms);
            
        } catch (Exception $e) {
            
            View::render('/error/error', ['e'=>$e]);
     
        }
    }

}
