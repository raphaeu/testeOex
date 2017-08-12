<?php

namespace App\Model;

use App\Model\User;
use GlobIterator;

class UserRepository {

    private static $path = 'data/users//';

    public static function save(User $user, $id = null) {
            
        $file = isset($id)?self::$path .'/registers//'. $id . '.xml':self::$path .'template.xml';
        $xmlDom = simplexml_load_file($file);

        $xmlDom->user['id'] = $user->getId();
        $xmlDom->user->params->param['value']= $user->getPassword();
        $xmlDom->user->variables->variable[0]['value'] = $user->getDescricao();
        $xmlDom->user->variables->variable[1]['value'] = $user->getDesvio();
        $xmlDom->user->variables->variable[2]['value'] = $user->getTransbordo();
        $xmlDom->user->variables->variable[3]['value'] = $user->getFalha();

        $xmlDom->saveXML(self::$path .'/registers//'. $user->getId() . '.xml');
        
        if (isset($id) && $id != $user->getId()) unlink($file);
        

    }

    public static function find($id) {

        
        $xmlDom = simplexml_load_file(self::$path .'/registers//'. $id . '.xml');

        $user = new User();
        
        $user->setId($xmlDom->user['id']);
        $user->setPassword($xmlDom->user->params->param['value']);
        $user->setDescricao($xmlDom->user->variables->variable[0]['value']);
        $user->setDesvio($xmlDom->user->variables->variable[1]['value']);
        $user->setTransbordo($xmlDom->user->variables->variable[2]['value']);
        $user->setFalha($xmlDom->user->variables->variable[3]['value']);

        return $user;
    }

    public static function delete($id) {
        
        return unlink(self::$path .'/registers//'. $id . '.xml');
        
    }

    public static function listAll() {

        $xmlFiles = new GlobIterator(self::$path .'/registers/*.xml');

        foreach ($xmlFiles as $key => $current) {

            $xmlDom = simplexml_load_file($current->getPathname());

            $user = new User();

            $user->setId($xmlDom->user['id']);
            $user->setPassword($xmlDom->user->params->param['value']);
            $user->setDescricao($xmlDom->user->variables->variable[0]['value']);
            $user->setDesvio($xmlDom->user->variables->variable[1]['value']);
            $user->setTransbordo($xmlDom->user->variables->variable[2]['value']);
            $user->setFalha($xmlDom->user->variables->variable[3]['value']);

            $users[] = $user;
        }

        return $users;
    }

}

?>
