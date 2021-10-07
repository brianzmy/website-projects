<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

/**
 * Galleries Controller
 *
 * @property \App\Model\Table\GalleriesTable $Galleries
 * @property \App\Model\Table\ArtistsGalleriesTable $ArtistsGalleries
 * @property bool|object Session
 *
 * @method \App\Model\Entity\Gallery[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class GalleriesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $galleries = $this->paginate($this->Galleries);

        $this->set(compact('galleries'));
    }

    /**
     * View method
     *
     * @param string|null $id Gallery id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $user = $this->Auth->user();

        if($user['type'] != 'Admin'){
            $this->viewBuilder()->setLayout('newartistlayout');

            if($user['type'] != 'Gallery'){
                return $this->redirect($this->Auth->logout());
            }

            if($user['type'] == 'Gallery'){
                $this->viewBuilder()->setLayout('newartistlayout');
            }
        }

        if($user['type'] == 'Admin'){
            $this->viewBuilder()->setLayout('default');
        }

        $gallery = $this->Galleries->get($id, [
            'contain' => ['Artists', 'Artworks']
        ]);

        $this->set('gallery', $gallery);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $user = $this->Auth->user();

        if($user['type'] != 'Admin'){
            $this->viewBuilder()->setLayout('newartistlayout');

            if($user['type'] != 'Gallery'){
                return $this->redirect($this->Auth->logout());
            }

            if($user['type'] == 'Gallery'){
                $this->viewBuilder()->setLayout('newartistlayout');
            }
        }

        if($user['type'] == 'Admin'){
            $this->viewBuilder()->setLayout('default');
        }


        $gallery = $this->Galleries->newEntity();
        if ($this->request->is('post')) {
            $gallery = $this->Galleries->patchEntity($gallery, $this->request->getData());

            if ($this->Galleries->save($gallery)) {
                $gID = $gallery->id;
                if ($user['gallery_id'] == null) {
                    $user_table = TableRegistry::get('Users');
                    $user_table->query()->update()->set(['gallery_id' => $gID])->where(['user_id IS' => $user['user_ID']])->execute();
                }
                return $this->redirect(['controller' => 'galleries', 'action' => 'view', $gallery->id]);
            }
        }

        $artists = $this->Galleries->Artists->find('list', ['limit' => 200]);
        $this->set(compact('gallery', 'artists'));

    }

    /**
     * Edit method
     *
     * @param string|null $id Gallery id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $user = $this->Auth->user();

        if($user['type'] != 'Admin'){
            $this->viewBuilder()->setLayout('newartistlayout');

            if($user['type'] != 'Gallery'){
                return $this->redirect($this->Auth->logout());
            }

            if($user['type'] == 'Gallery'){
                $this->viewBuilder()->setLayout('newartistlayout');
            }
        }

        if($user['type'] == 'Admin'){
            $this->viewBuilder()->setLayout('default');
        }

//        $user's gallery_id is not updated from add()

//        if($user['type'] == 'Gallery'){
//            if ($id != $this->Auth->user('gallery_id')) {
//                return $this->redirect(['controller' => 'Galleries', 'action' => 'view', $user['gallery_id']]);
//            }
//        }

//        if($user['type'] == 'Admin'){
//            $this->viewBuilder()->setLayout('default');
//        }

        $gallery = $this->Galleries->get($id, [
            'contain' => ['Artists']
        ]);

        if ($this->request->is(['patch', 'post', 'put'])) {
            $patchGallery = $this->Galleries->patchEntity($gallery, $this->request->getData());
            if ($this->Galleries->save($patchGallery)) {
                return $this->redirect(['action' => 'view', $id]);
            }
        }

        $artists = $this->Galleries->Artists->find('list', ['limit' => 200]);
        $this->set(compact('gallery', 'artists'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Gallery id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $gallery = $this->Galleries->get($id);
        if ($this->Galleries->delete($gallery)) {
            return $this->redirect(['action' => 'index']);
        }

    }

    public function selectGallery($artists){


//        formSelection is the form name & gallery is the drop down box name
//        $userSelection = $this->request->data['formSelection']['gallery'];

//        $userSelection is the selected option in the form.
//        $galleryID = $this->Galleries->find('gallery_id')->where(['name IS' => $userSelection]);

        $userType = $this->getRequest()->getSession()->read('Auth.User.type');

        if($userType != 'Admin'){
            $this->viewBuilder()->setLayout('newartistlayout');
        }

        if($userType == 'Admin'){
            $this->viewBuilder()->setLayout('default');
        }

        $artistsgallery = $this->ArtistsGalleries->newEntity();
        $artistsgallery = $this->ArtistsGalleries->patchEntity($artistsgallery, $this->request->getData());
        $artistsgallery->artist_id = $artists;
//        $artistsgallery->gallery_id = $galleryID;

        if($this->ArtistsGalleries->save($artistsgallery)){

            return $this->redirect(['controller' => 'artist', 'action' => 'artistinfo', $artists]);
        }

        $artists = $this->Galleries->Artists->find('list', ['limit' => 200]);
        $this->set(compact('gallery', 'artists'));
    }
}
