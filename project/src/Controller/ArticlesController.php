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
    public $uses = ['Article'];

    public function initialize(): void
    {
        parent::initialize();

        $this->loadComponent('Paginator');
        $this->loadComponent('Flash'); // Include the FlashComponent
    }
    public function index()
    {
        // print_r(json_encode(['asdfasdf']));echo "\n\n";exit;
        $articles = $this->Paginator->paginate($this->fetchModel('Article')->find('all'));
        // $articles = $this->fetchModel('Article')->find('all');
        $this->set(compact('articles'));
    }
    
    public function view($slug = null)
    {
        $article = $this->fetchTable('Article')->findBySlug($slug)->firstOrFail();
        $this->set(compact('article'));
    }

    public function add()
    {
        try{
            $article = $this->fetchModel('Article')->newEmptyEntity();
            if ($this->request->is('post')) {
                $article = $this->fetchModel('Article')->patchEntity($article, $this->request->getData());
                // Hardcoding the user_id is temporary, and will be removed later
                // when we build authentication out.
                $article->user_id = 1;
                $article->slug = 'asfsdf';

                if ($this->fetchModel('Article')->save($article)) {
                    $this->Flash->success(__('Your article has been saved.'));
                    return $this->redirect(['action' => 'index']);
                }
                $this->Flash->error(__('Unable to add your article.'));
            }
            $this->set('article', $article);
        } catch (\Exception $e){
            $this->Flash->error($e->getMessage());
        }
    }
}
