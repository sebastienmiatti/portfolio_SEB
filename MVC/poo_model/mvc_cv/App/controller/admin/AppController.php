<?php

namespace App\Controller\Admin; // fait la jonction entre model et view

use\App;
use \Core\Auth\DBAuth;

class AppController extends \App\Controller\AppController{
    //
    public function __construct(){
        parent::construct();
        $app = App::getInstance();
        $auth = new DBAuth($app->getDb());
        if(!$auth->logged()){
            $this->forbidden();
        }
    }
    //
    // protected $template = 'default';
    //
    //
    // public function __construct(){
    //     $this->viewpath = ROOT . '/app/Views/';
    // }
    //
    // protected function loadModel($model_name){
    //     $this->$model_name = App::getInstance()->getTable('$model_name');
    // }

}
