<?php
namespace Core;

use Exception;
use ReflectionMethod;

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
            // Setando dados do post/put na controller
            if (in_array($method, ['PUT', 'POST'])) {
                $this->controllerIntance->setRequest(file_get_contents('php://input'));
            }

            $reflectionMethod = new ReflectionMethod($controller, $action);
            $reflectionMethod->invokeArgs($this->controllerIntance, $parms);
        } catch (Exception $e) {
            
            echo $e->getMessage();
            exit;

        }
    }

}
