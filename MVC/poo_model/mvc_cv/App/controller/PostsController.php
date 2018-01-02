<?php

namespace App\Controller; // fait la jonction entre model et view

use Core\Controller\Controller;


class PostsController extends Controller{ //héritage

    public function __construct(){
        parent::__construct();
        $this->loadModel('Post');
        $this->loadModel('Category');
    }

    public function index(){ //page d'acceuil qui affiche les différents articles
        $posts = $this->Posts->last();
        $categories = $this->Category->all();
        $this->render('posts.index'); // generation de la vue
    }

    public function category(){ //affiche les différentes categories

        $categorie = $this->Category->find($_GET['id']);
        if($categorie=== false{
            $this->notFound();
        })
        $articles = $this->Posts->lastByCategory($_GET['id']);
        $categories = $this->Category->all();
        $this->render('posts.category', compact('article', 'categories', 'categorie')); // rend a la vue
    }

    public function show(){ // voir un article en particulier
    $article = $this->post->findWithCategory($_GET['id']);
    $this->render('posts.show', compact('article')); // rend a la vue
    }



}
