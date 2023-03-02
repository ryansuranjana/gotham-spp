<?php 

class Home extends Controller {
    
    public function __construct()
    {
        $this->middleware('AuthMiddleware');
    }

    public function index()
    {
        return redirect('/dashboard');
    }

}