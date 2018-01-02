<?php

use Core\Auth\DBAuth;

define('ROOT', dirname(__DIR__));
require ROOT . '/app/App.php';

App::load();

if(isset($_GET['p'])){
    $page = $_GET['p'];
}else{
    $page='home';
}


ob_start();
if($page === 'home'){
    $controller = new \App\Controller\PostsController();
    $controller->index();
}elseif($page === 'posts.category'){
    $controller = new \App\Controller\PostsController();
    $controller->category();
}elseif($page === 'posts.show'){
    $controller = new \App\Controller\PostsController();
    $controller->show();
}elseif($page === 'login'){
    $controller = new \App\Controller\UsersController();
    $controller->login();
}elseif($page === 'admin.posts.index'){
    $controller = new \App\Controller\Admin\PostsController();
    $controller->index();
}
