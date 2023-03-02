<?php 

class Auth extends Controller {

    public function login()
    {   
        $this->middleware('GuestMiddleware');

        $data = ['page_title' => 'Login'];

        $this->view('pages/auth/login', $data);
    }

    public function authenticated() 
    {   
        $this->middleware('GuestMiddleware');

        $penggunaModel = new PenggunaModel();

        if($penggunaModel->login($_POST)) {
            return redirect('/');
        } else {
            return redirect('/auth/login', [
                'status' => 'fail',
                'message' => 'Login failed!.'
            ]);
        }
    }

    public function logout()
    {
        $this->middleware('AuthMiddleware');

        session_destroy();

        return redirect('/auth/login');
    }

}