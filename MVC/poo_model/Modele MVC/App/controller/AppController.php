<?php

namespace App\Controller; // fait la jonction entre model et view

use Core\Controller\Controller;

use \App; // pour qu'il comprenne qu'il s'agit du app a la racine


class AppController extends Controller{ // héritage (class intermediaire)


    protected $template = 'default';


    public function __construct(){ // défini la vue
        $this->viewpath = ROOT . '/app/Views/';
    }

    protected function loadModel($model_name){
        $this->$model_name = App::getInstance()->getTable('$model_name');
    }

}
