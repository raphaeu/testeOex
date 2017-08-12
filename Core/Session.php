<?php
namespace Core;

class Session 
{
    public static function setFlashMessenger($messenger, $type='success') {
        self::startSession();
        $_SESSION['messenger']['text'] = $messenger;
        $_SESSION['messenger']['type'] = $type;

    }

    public static function getFlashMessenger() {
        self::startSession();
        if (array_key_exists('messenger', $_SESSION)) {
            $messenger = $_SESSION['messenger'];
            unset($_SESSION['messenger']);
            return $messenger;
        }
        return null;
    }    

    public static function destroy() {
        self::startSession();
        $_SESSION = [];
        self::closeSession();
    }

    private static function startSession() {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
    }

    private static function closeSession() {
        if (session_status() != PHP_SESSION_NONE) {
            session_destroy();
        }
    }
}