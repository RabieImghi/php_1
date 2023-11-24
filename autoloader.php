<?php
session_start();
class Autoloader {
    public static function register() {
        spl_autoload_register(function ($class) {
            $filename = $class . ".php";
            if (file_exists($filename)) {
                require_once $filename;
            }
        });
    }
}

?>