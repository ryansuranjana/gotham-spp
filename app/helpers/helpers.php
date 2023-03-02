<?php 

function parseUrl($default) {
    if(isset($_GET['url'])) {
        $url = rtrim($_GET['url'], '/');
        $url = filter_var($url, FILTER_SANITIZE_URL);
        $url = explode('/', $url);
        return $url;
    } else {
        return $default;
    }
}

function DB() {
    return new Database;
}

function redirect($route, $flash = null) {
    if(!is_null($flash)) {
        Flasher::setFalsh($flash);
    }
    header('Location: ' . BASE_URL . $route);
    exit;
}

function url($route) {
    return BASE_URL . $route;
}

function asset($route) {
    return BASE_URL . '/assets' . $route;
}

function routeCurrent($route) {
    if(parseUrl(['Home'])[0] == $route) {
        return true;
    } else {
        return false;
    }
}