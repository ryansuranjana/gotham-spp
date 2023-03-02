<?php 

class AdminMiddleware {

    public function __construct()
    {
        if(isset($_SESSION['login'])) {
            if($_SESSION['user']['role'] != 'admin') {
                return redirect('/');
            }
        } else {
            return redirect('/auth/login');
        }
    }

}