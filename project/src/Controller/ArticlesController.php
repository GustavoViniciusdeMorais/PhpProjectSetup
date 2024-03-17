<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * ArticlesController Controller
 *
 * @method \App\Model\Entity\ArticlesController[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ArticlesController extends AppController
{
    public function index()
    {
        $this->loadComponent('Paginator');
        $articles = $this->Paginator->paginate($this->fetchModel('Article')->find('all'));
        // $articles = $this->fetchModel('Article')->find('all');
        $this->set(compact('articles'));
    }
    
    public function view($slug = null)
    {
        $article = $this->fetchTable('Article')->findBySlug($slug)->firstOrFail();
        $this->set(compact('article'));
    }
}
