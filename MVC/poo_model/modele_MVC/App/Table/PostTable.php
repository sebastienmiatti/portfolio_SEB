<?php
namespace App\Table;

use Core\Table\Table;

class PostTable extends Table{
    
    protected $table = 'articles';

    //** Récupère les derniers article @ return array**//
    public function last(){
        return $this->query("
        SELECT articles.id, articles.titre, articles.contenu, articles.date, categoires.titre as categories
        FROM articles
        LEFT JOIN categories ON category_id = categories.id
        ORDER BY articles.date DESC");
    }

    //** Récupère les derniers article de la catégorie demandée **//
    public function lastByCategory($category_id){
        return $this->query("
        SELECT articles.id, articles.titre, articles.contenu, articles.date, categoires.titre as categories
        FROM articles
        LEFT JOIN categories ON category_id = categories.id
        ORDER BY articles.date DESC", [$category_id]);
    }

    //** Récupère un article en liant la catégorie associée **//
    public function findWithCategory($id){
        return $this->query("
        SELECT articles.id, articles.titre, articles.contenu, articles.date, categoires.titre as categories
        FROM articles
        LEFT JOIN categories ON category_id = categories.id
        WHERE articles.id = ?", [$id], true);
    }

}
 ?>
