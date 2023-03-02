<?php 

class Controller {

    public function view($view, $data = []) 
    {
        require_once '../app/views/' . $view . '.php';
    }

    public function viewWithLayout($view, $data = []) 
    {
        require_once '../app/views/templates/header.php';
        require_once '../app/views/' . $view . '.php';
        require_once '../app/views/templates/footer.php';
    }

    public function middleware($middleware)
    {
        require_once '../app/middleware/' . $middleware . '.php';
        return new $middleware;
    }

}