<?php 

class AuthMiddleware {

    public function __construct()
    {
        if(!isset($_SESSION['login'])) {
            return redirect('/auth/login');
        }
    }

}