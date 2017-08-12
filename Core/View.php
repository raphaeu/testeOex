<?php

namespace Core;

    
class View {

    protected $request;


    public static function render($file, $data) {
        extract($data);
        $filename = ROOT_VIEW . str_replace('\\', '/', $file) . '.php';
        if (file_exists($filename)) {
            include($filename);
        } else {
            throw new Exception('View informada nao exite: ' . $filename);
        }
    }

    public static function redirect($url, $data=null) {
        extract($data);
        header('Location: '.$url);
    }


}
