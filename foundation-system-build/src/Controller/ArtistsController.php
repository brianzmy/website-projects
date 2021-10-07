<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Controller\Component\AuthComponent;
use Cake\ORM\Table;
use Cake\ORM\TableRegistry;
use Cake\Routing\Router;
use Cake\Validation\Validator;
use Cake\Error\ErrorHandler;

/**
 * Artists Controller
 *
 * @property \App\Model\Table\ArtistsTable $Artists
 *
 * @method \App\Model\Entity\Artists[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ArtistsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $user = $this->Auth->user();

        if ($user['type'] == 'Admin' || $user['type' == 'Client']) {
            $this->viewBuilder()->setLayout('default');
        }

        $artists = $this->paginate($this->Artists);

        $this->set(compact('artists'));
    }

    /**
     * View method
     *
     * @param $artists
     * @return \Cake\Http\Response|void
     */
    public function view($artists)
    {

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
            $this->viewBuilder()->setLayout('newartistlayout');

            if ($user['type'] == 'Client' || $user['type'] == 'Gallery') {
                return $this->redirect($this->Auth->logout());
            }
        }

        $this->loadModel('Users');

        $artist = $this->Artists->newEntity();

        if ($this->request->is('post')) {
            $artist = $this->Artists->patchEntity($artist, $this->request->getData());

            if ($this->Artists->save($artist)) {

                if($user['type'] != 'Admin'){
                    if ($user['artist_id'] == null) {
                        $user_table = TableRegistry::get('users');

                        $currentUser = $user_table->find()->order('DESC');
                        $currentUser->first();

                        $user_table->query()->update()->set(['artist_id' => $artist->id])->where(['user_id IS' => $currentUser['user_ID']])->execute();
                    }
                }

                $resume_table = TableRegistry::get('resumes');
                $resumeUser = $resume_table->newEntity();

                $query = $this->Artists->find('all', ['order' => ['id' => 'DESC']]);
                $thisID = $query->first()->toArray()['id'];

                $resumeUser->description = "";
                $resumeUser->experienceType = "";
                $resumeUser->artist_id = $thisID;

                if ($resume_table->save($resumeUser)) {

                }

                $agents_table = TableRegistry::get("agents");
                $agent = $agents_table->newEntity();

                $agent->name = "";
//                        $agent->email = "";
                $agent->phone = "";
                $agent->website = "";
                $agent->artist_id = $thisID;

                $agents_table->save($agent);

                return $this->redirect(['controller' => 'Admin', 'action' => 'artistinfo', $artist->id]);
            }
        
        }

        $indigenousOptions = array(
            'Yes' => 'Yes',
            'No' => 'No',
            'Prefer Not To Answer' => 'Prefer Not To Answer'
        );

        $this->set(compact('artist','indigenousOptions'));
        $this->set('_serialize', ['artist']);
    }


    /**
     * Edit method
     *
     * @param string|null $id Admin id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $user = $this->Auth->user();

        // **** Change the set layout to the artist portal
        if($user['type'] != 'Admin'){
            $this->viewBuilder()->setLayout('newartistlayout');

            if ($user['type'] == 'Client' || $user['type'] == 'Gallery') {
                return $this->redirect($this->Auth->logout());
            }

            if($id != $this->Auth->user('artist_id')){
                return $this->redirect(['controller' => 'Admin', 'action' => 'artistinfo', $this->Auth->user('artist_id')]);
            }
        }

        if($user['type'] == 'Admin'){
            $this->viewBuilder()->setLayout('default');
        }

        $artist = $this->Artists->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $artist = $this->Artists->patchEntity($artist, $this->request->getData());
            if ($this->Artists->save($artist)) {
                return $this->redirect(['controller' => 'Admin', 'action' => 'artistinfo', $artist->id]);
            }
        }


        $indigenousOptions = array(
            'Yes' => 'Yes',
            'No' => 'No',
            'Prefer Not To Answer' => 'Prefer Not To Answer'
        );

        $this->set(compact('artist','indigenousOptions'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Admin id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $artist = $this->Artists->get($id);
        $this->Artists->patchEntity($artist, $this->request->getData(), ['fieldList' => ['approved']]);
        $artist['approved'] = 'No';

        if($this->Artists->save($artist)){
            $uID = $this->loadModel('Users')->find()->where(['artist_id IS' => $id])->first();
            $user = $this->loadModel('Users')->get($uID['user_ID']);
            $this->loadModel('Users')->patchEntity($user, $this->request->getData(), ['fieldList' => ['archived']]);
            $user['archived'] = 'Yes';
            $this->loadModel('Users')->save($user);
        }

        $auth = $this->Auth->user();

        if($auth['type'] == 'Admin'){
//            $this->Flash->success(__('This artist has been successfully archived'));
            return $this->redirect($this->referer());
        }else{
            return $this->redirect($this->Auth->logout());
        }
    }


    public function date_converter($date_to_convert)
    {
        $date_concat = "";

        foreach ($date_to_convert as $date_pointer):
            $date_concat .= $date_pointer;
            $date_concat .= "-";
        endforeach;

        return $date_concat;

    }
}
