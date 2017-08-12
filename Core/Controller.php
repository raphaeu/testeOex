<?php

namespace Core;


class Controller {

    protected $request;

    public function setRequest($request) {
        $this->request = $request;
    }

    public function getRequest() {
        return $this->request;
    }

    public function view($file, $data) {
        extract($data);
        $filename = ROOT_VIEW . str_replace('\\', '/', $file) . '.php';
        if (file_exists($filename)) {
            include($filename);
        } else {
            throw new \Exception('View informada nao exite: ' . $filename);
        }
    }

    public function redirect($url, $data=null) {
        extract($data);
        header('Location: '.$url);
    }


}
