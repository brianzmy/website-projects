<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Agents Controller
 *
 * @property \App\Model\Table\AgentsTable $Agents
 *
 * @method \App\Model\Entity\Agent[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class AgentsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $agents = $this->paginate($this->Agents);

        $this->set(compact('agents'));
    }

    /**
     * View method
     *
     * @param string|null $id Agent id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $agent = $this->Agents->get($id, [
            'contain' => ['Artists']
        ]);

        $this->set('agent', $agent);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $user = $this->Auth->user();

        if ($user['type'] == 'Admin') {
            $this->viewBuilder()->setLayout('default');
        }

        if ($user['type'] != 'Admin') {
            return $this->redirect($this->Auth->logout());
        }

        $agent = $this->Agents->newEntity();
        if ($this->request->is('post')) {
            $agent = $this->Agents->patchEntity($agent, $this->request->getData());
            if ($this->Agents->save($agent)) {
                return $this->redirect(['controller' => 'Admin', 'action' => 'artistinfo', $agent->artist_id]);
            }
        }
        $this->set(compact('agent'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Agent id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($artists, $id = null)
    {
        $user = $this->Auth->user();

        $agent = $this->Agents->get($id, [
            'contain' => []
        ]);

        if ($user['type'] == 'Admin') {
            $this->viewBuilder()->setLayout('default');
        }

        if ($user['type'] != 'Admin') {
            $this->viewBuilder()->setLayout('newartistlayout');

            if ($user['type'] == 'Client' || $user['type'] == 'Gallery') {
                return $this->redirect($this->Auth->logout());
            }

            if($agent->artist_id != $this->Auth->user('artist_id')){
                return $this->redirect(['controller' => 'Admin', 'action' => 'artistinfo', $this->Auth->user('artist_id')]);
            }

            if($artists != $this->Auth->user('artist_id')){
//                throw new NotFoundException('You do not have access to this profile.');
                return $this->redirect(['controller' => 'Admin', 'action' => 'artistinfo', $this->Auth->user('artist_id')]);
            }
        }

        if ($this->request->is(['patch', 'post', 'put'])) {
            $agent = $this->Agents->patchEntity($agent, $this->request->getData());
            if ($this->Agents->save($agent)) {
                return $this->redirect(['controller' => 'Admin', 'action' => 'artistinfo', $agent->artist_id]);
            }
        }
        $this->set(compact('agent'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Agent id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $user = $this->Auth->user();

        $agent = $this->Agents->get($id, [
            'contain' => []
        ]);

        if ($user['type'] == 'Admin') {
            $this->viewBuilder()->setLayout('default');
        }

        if ($user['type'] != 'Admin') {
            $this->viewBuilder()->setLayout('newartistlayout');

            if ($user['type'] == 'Client' || $user['type'] == 'Gallery') {
                return $this->redirect($this->Auth->logout());
            }

            if($agent->artist_id != $this->Auth->user('artist_id')){
                return $this->redirect(['controller' => 'Admin', 'action' => 'artistinfo', $this->Auth->user('artist_id')]);
            }

            if($id != $this->Auth->user('artist_id')){
//                throw new NotFoundException('You do not have access to this profile.');
                return $this->redirect(['controller' => 'Admin', 'action' => 'artistinfo', $this->Auth->user('artist_id')]);
            }
        }

        $this->request->allowMethod(['post', 'delete']);
        return $this->redirect(['action' => 'index']);
    }
}
