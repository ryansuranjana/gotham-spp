<?php 

class GuestMiddleware {

    public function __construct()
    {
        if(isset($_SESSION['login'])) {
            return redirect('/');
        }
    }

}