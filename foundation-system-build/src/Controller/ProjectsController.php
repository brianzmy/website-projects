<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

/**
 * Projects Controller
 *
 * @property \App\Model\Table\ProjectsTable $Projects
 *
 * @method \App\Model\Entity\Project[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ProjectsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {

        $this->paginate = [
            'contain' => ['Resumes']
        ];
        $projects = $this->paginate($this->Projects);

        $this->set(compact('projects'));
    }

    /**
     * View method
     *
     * @param string|null $id Project id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $project = $this->Projects->get($id, [
            'contain' => ['Resumes', 'Artworks']
        ]);

        $this->set('project', $project);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add($resume, $artists)
    {
        $user = $this->Auth->user();

        // **** Change the set layout to the artist portal
        if($user['type'] != 'Admin'){
            $this->viewBuilder()->setLayout('newartistlayout');

            if ($user['type'] == 'Client' || $user['type'] == 'Gallery') {
                return $this->redirect($this->Auth->logout());
            }

            if($artists != $this->Auth->user('artist_id')){
                return $this->redirect(['controller' => 'Admin', 'action' => 'artistinfo', $this->Auth->user('artist_id')]);
            }
        }

        if($user['type'] == 'Admin'){
            $this->viewBuilder()->setLayout('default');
        }

        $project = $this->Projects->newEntity();
        if ($this->request->is('post')) {
            $project = $this->Projects->patchEntity($project, $this->request->getData());
            $project->resume_id = $resume;

            if ($this->Projects->save($project)) {
                return $this->redirect(['controller' => 'Admin', 'action' => 'artistinfo', $artists]);
            }

        }
        $resume = $this->Projects->Resumes->find('list', ['limit' => 200]);
        $projectList = array(
            'Community Project' => 'Community Project',
            'Solo Exhibition' => 'Solo Exhibition',
            'Group Exhibition' => 'Group Exhibition',
            'Public Art Commission' => 'Public Art Commission',
            'Other' => 'Other'
        );
        $budgetList = array(
            '$0-$50k' => '$0-$50k',
            '$50k - $100k' => '$50k - $100k',
            '$100 - $500k' => '$100 - $500k',
            '$500 - $1m' => '$500 - $1m',
            '$1m - $5m' => '$1m - $5m',
            '$5m +' => '$5m +'
        );
        $this->set(compact('project', 'resume', 'projectList', 'budgetList'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Project id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($project, $artists)
    {
        $user = $this->Auth->user();

        // **** Change the set layout to the artist portal
        if($user['type'] != 'Admin'){
            $this->viewBuilder()->setLayout('newartistlayout');

            if ($user['type'] == 'Client' || $user['type'] == 'Gallery') {
                return $this->redirect($this->Auth->logout());
            }

            if($artists != $this->Auth->user('artist_id')){
                return $this->redirect(['controller' => 'Admin', 'action' => 'artistinfo', $this->Auth->user('artist_id')]);
            }
        }

        if($user['type'] == 'Admin'){
            $this->viewBuilder()->setLayout('default');
        }

        $project_table = TableRegistry::get("projects");

        $project = $project_table->get($project, [
            'contain' => []
        ]);

        $projectQuery = $this->Projects->find()->select(['type'])->where(['resume_id IS' => $project->resume_id]);
        $currentProject = $projectQuery->toArray();

        if ($this->request->is(['patch', 'post', 'put'])) {
            $project = $this->Projects->patchEntity($project, $this->request->getData());

            if ($this->Projects->save($project)) {
                return $this->redirect(['controller' => 'Admin', 'action' => 'artistinfo', $artists]);
            }
        }

        $resume = $this->Projects->Resumes->find('list', ['limit' => 200]);
        $projectList = array(
            'Community Project' => 'Community Project',
            'Solo Exhibition' => 'Solo Exhibition',
            'Group Exhibition' => 'Group Exhibition',
            'Public Art Commission' => 'Public Art Commission',
            'Other' => 'Other'
        );
        $budgetList = array(
            '$0-$50k' => '$0-$50k',
            '$50k - $100k' => '$50k - $100k',
            '$100 - $500k' => '$100 - $500k',
            '$500 - $1m' => '$500 - $1m',
            '$1m - $5m' => '$1m - $5m',
            '$5m +' => '$5m +'
        );
        $this->set(compact('project', 'resume', 'projectList', 'currentProject', 'budgetList'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Project id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id, $artistID)
    {
        $user = $this->Auth->user();

        // **** Change the set layout to the artist portal
        if($user['type'] != 'Admin'){
            $this->viewBuilder()->setLayout('newartistlayout');

            if ($user['type'] == 'Client' || $user['type'] == 'Gallery') {
                return $this->redirect($this->Auth->logout());
            }

            if($artistID != $this->Auth->user('artist_id')){
                return $this->redirect(['controller' => 'Admin', 'action' => 'artistinfo', $this->Auth->user('artist_id')]);
            }
        }

        if($user['type'] == 'Admin'){
            $this->viewBuilder()->setLayout('default');
        }

        $project = $this->Projects->get($id, ['contain' => '']);

        if ($this->Projects->delete($project)) {
            return $this->redirect(['controller' => 'Admin', 'action' => 'artistinfo', $artistID]);
        }
    }
}
