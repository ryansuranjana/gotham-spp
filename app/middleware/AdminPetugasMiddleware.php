<?php 

class AdminPetugasMiddleware {

    public function __construct()
    {
        if(isset($_SESSION['login'])) {
            if($_SESSION['user']['role'] == 'siswa') {
                return redirect('/');
            }
        } else {
            return redirect('/auth/login');
        }
    }

}