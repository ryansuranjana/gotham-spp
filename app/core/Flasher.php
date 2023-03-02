<?php 

class Flasher {

    public static function setFalsh($flash) 
    {
        $_SESSION['flash'] = $flash;
    }

    public static function flash($callback)
    {
        if(isset($_SESSION['flash'])) {
            $callback($_SESSION['flash']);
            unset($_SESSION['flash']);
        }
    }

}