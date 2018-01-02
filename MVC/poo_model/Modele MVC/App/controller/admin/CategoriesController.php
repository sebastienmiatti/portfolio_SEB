<?php

namespace App\Controller\Admin; // fait la jonction entre model et view

use Core\HTML\BootstrapForm;

class CategoriesController extends AppController{

    public function __construct(){
        parent::__construct();
        $this->loadModel('Category');
    }

    public function index(){ //page d'acceuil qui affiche les différents articles
        $items = $this->Category->all();
        $this->render('admin.categories.index', compact('items'));
    }

    public function add(){
        if(!empty($_POST)){
            $result = $this->Category->create([
                'titre' => $_POST['titre'],
            ]);
                return $this->index();
                // header('Location: admin.php?p=admin.posts.edit&id=' . App::getInstance()->getDb()->lastInsertId());
        }

        $this->render('admin.categories.edit', compact('form')); // rend a la vue
    }

    public function edit(){
        if(!empty($_POST)){
            $result = $this->Category->update($_GET['id'], [
                'titre' => $_POST['titre'],
            ]);
                    return $this->index();
                //header('Location: admin.php?p=posts.edit&id=' . App::getInstance()->getDb()->lastInsertId());
        }
        $category = $this->Category->find($_GET['id']);
        $form = new BootstrapForm($category);
        $this->render('admin.categories.edit', compact('form')); // rend a la vue

    }

    public function delete(){
        if(!empty($_POST)){
            $result = $this->Category->delete($_POST['id']);
            return $this->index();
        }
    }

}
