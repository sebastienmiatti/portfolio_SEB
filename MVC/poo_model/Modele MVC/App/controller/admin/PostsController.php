<?php

namespace App\Controller\Admin; // fait la jonction entre model et view


class PostsController extends AppController{// heritage de la vue

    public function __construct(){ // charge le model
        parent::__construct();
        $this->loadModel('Post');
    }

    public function index(){ //page d'acceuil qui affiche les différents articles
        $posts = $this->Post->all();
        $this->render('admin.posts.index', compact('posts'));
    }

    public function add(){
        if(!empty($_POST)){
            $result = $this->Post->create([
                'titre' => $_POST['titre'],
                'contenu' => $_POST['contenu'],
                'category_id' => $_POST['category_id']
            ]);
            if($result){
                return $this->index();
                // header('Location: admin.php?p=admin.posts.edit&id=' . App::getInstance()->getDb()->lastInsertId());
            }
        }
        $this->loadModel('Category');
        $categories = $this->Category->extract('id', 'titre');
        $form = new BootstrapForm($_POST);
        $this->render('admin.posts.edit', compact('categories', 'form')); // rend a la vue
    }

    public function edit(){
        if(!empty($_POST)){
            $result = $this->Post->update($_GET['id'], [
                'titre' => $_POST['titre'],
                'contenu' => $_POST['contenu'],
                'category_id' => $_POST['category_id']
            ]);
            if($result){
                    return $this->index();
                //header('Location: admin.php?p=posts.edit&id=' . App::getInstance()->getDb()->lastInsertId());
            }
        }
        $post = $this->Post->find($_GET['id']);
        $this->loadModel('Category');
        $categories = $this->Category->extract('id', 'titre');
        $form = new BootstrapForm($_POST);
        $this->render('admin.posts.edit', compact('categories', 'form')); // rend a la vue

    }

    public function delete(){
        if(!empty($_POST)){
            $result = $this->Post->delete($_POST['id']);
            return $this->index();
        }
    }

}
