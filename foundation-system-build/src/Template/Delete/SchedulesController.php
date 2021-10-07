<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

/**
 * Schedules Controller
 *
 * @property \App\Model\Table\SchedulesTable $Schedules
 *
 * @method \App\Model\Entity\Schedules[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class SchedulesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Artists']
        ];
        $schedule = $this->paginate($this->Schedules);

        $this->set(compact('schedule'));
    }

    /**
     * View method
     *
     * @param string|null $id Schedules id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id)
    {
        $schedule = $this->Schedules->get($id, [
            'contain' => ['Artists']
        ]);

        $this->set('schedule', $schedule);
    }

    /**
     * Add method
     *
     * @param $artists
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add($artists)
    {
        $userType = $this->getRequest()->getSession()->read('Auth.User.type');

        if($userType != 'Admin'){
            $this->viewBuilder()->setLayout('newartistlayout');

            if($artists != $this->Auth->user('artist_id')){
//                throw new NotFoundException('You do not have access to this profile.');
                return $this->redirect(['controller' => 'Admin', 'action' => 'artistinfo', $this->Auth->user('artist_id')]);
            }
        }

        if($userType == 'Admin'){
            $this->viewBuilder()->setLayout('default');
        }

        $artist_table = TableRegistry::get("artists");

        $thisID = $artist_table->get($artists, [
            'contain' => []
        ]);

        $schedule = $this->Schedules->newEntity();

        if ($this->request->is('post')) {
            $schedule = $this->Schedules->patchEntity($schedule, $this->request->getData());
            $schedule->artist_id = $artists;

//            debug($schedule);

            if ($this->Schedules->save($schedule)) {
                $this->Flash->success(__('The schedule has been saved.'));

                return $this->redirect(['controller' => 'Admin', 'action' => 'artistinfo', $artists]);
            }
            $this->Flash->error(__('The schedule could not be saved. Please, try again.'));
        }
        $artists = $this->Schedules->Artists->find('list', ['limit' => 200]);
        $this->set(compact('schedule', 'artists'));
    }

    /**
     * Edit method
     *
     * @param $schedule
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     */
    public function edit($artists, $schedule)
    {
        $userType = $this->getRequest()->getSession()->read('Auth.User.type');

        $schedule_table = TableRegistry::get("schedules");

        $schedule = $schedule_table->get($schedule, [
            'contain' => []
        ]);

        if($userType != 'Admin'){
            $this->viewBuilder()->setLayout('newartistlayout');

            if($artists != $this->Auth->user('artist_id')){
//                throw new NotFoundException('You do not have access to this profile.');
                return $this->redirect(['controller' => 'Admin', 'action' => 'artistinfo', $this->Auth->user('artist_id')]);
            }

            if($schedule->artist_id != $this->Auth->user('artist_id')){
                return $this->redirect(['controller' => 'Admin', 'action' => 'artistinfo', $this->Auth->user('artist_id')]);
            }
        }

        if($userType == 'Admin'){
            $this->viewBuilder()->setLayout('default');
        }

        if ($this->request->is(['patch', 'post', 'put'])) {
            $schedule = $this->Schedules->patchEntity($schedule, $this->request->getData());
            if ($this->Schedules->save($schedule)) {
                $this->Flash->success(__('The schedule has been saved.'));

                return $this->redirect(['controller' => 'Admin', 'action' => 'artistinfo', $schedule->artist_id]);
            }
            $this->Flash->error(__('The schedule could not be saved. Please, try again.'));
        }
        $artists = $this->Schedules->Artists->find('list', ['limit' => 200]);
        $this->set(compact('schedule', 'artists'));
    }

    /**
     * Delete method
     *
     * @param $schedule
     * @return \Cake\Http\Response|null Redirects to index.
     */
    public function delete($schedule)
    {
        $userType = $this->getRequest()->getSession()->read('Auth.User.type');

        if($userType != 'Admin'){
            $this->viewBuilder()->setLayout('newartistlayout');

            // pass artist_id and deny access?
            // not sure if the delete function still runs when user is redirected
        }

        if($userType == 'Admin'){
            $this->viewBuilder()->setLayout('default');
        }

        $schedule_table = TableRegistry::get("schedules");

        $schedules = $schedule_table->get($schedule, [
            'contain' => []
        ]);

        if ($this->Schedules->delete($schedules)) {
            $this->Flash->success(__('The schedule has been deleted.'));
        } else {
            $this->Flash->error(__('The schedule could not be deleted. Please, try again.'));
        }

        return $this->redirect(['controller' => 'Admin', 'action' => 'artistinfo', $schedules->artist_id]);
    }
}
