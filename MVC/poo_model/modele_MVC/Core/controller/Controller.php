<?php

namespace Core\Controller;

class Controller{

    protected $viewPath; // on a besoin d'une variable protégé qui mene au dossier des vues
    protected $template; // on a besoin d'une variable protégé qui mene au dossier template

    protected function render($view, $variables = []){// transfert de variables
        ob_start();
        extract($variables);
        require($this->viewPath . str_replace('.', '/', $view) . '.php');
        $content = ob_get_clean();
        require($this->viewPath . 'templates/' . $this->template . '.php');
    }

    protected function forbidden(){
        header('HTTP/1.0 403 Forbidden');
        die('Acces interdit');
    }

    protected function notFound(){
        header('HTTP/1.0 404 not Found');
        die('Page introuvable');
    }

}

 ?>
