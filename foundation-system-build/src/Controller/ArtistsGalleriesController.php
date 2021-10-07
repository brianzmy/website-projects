<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * ArtistsGalleries Controller
 *
 * @property \App\Model\Table\ArtistsGalleriesTable $ArtistsGalleries
 * @property \App\Model\Table\ArtworksTable $Artists
 * @property \App\Model\Table\ArtworksTable $Galleries
 *
 * @method \App\Model\Entity\ArtistsGallery[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ArtistsGalleriesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Artists', 'Galleries']
        ];
        $artistsGalleries = $this->paginate($this->ArtistsGalleries);

        $this->set(compact('artistsGalleries'));
    }

    /**
     * View method
     *
     * @param string|null $id Artists Gallery id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $artistsGallery = $this->ArtistsGalleries->get($id, [
            'contain' => ['Artists', 'Galleries']
        ]);

        $this->set('artistsGallery', $artistsGallery);
    }

    /**
     * Add method
     * @param  $artists
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add($artists)
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

            if($artists != $this->Auth->user('artist_id')){
                return $this->redirect(['controller' => 'Admin', 'action' => 'artistinfo', $this->Auth->user('artist_id')]);
            }
        }

        $artistsGallery = $this->ArtistsGalleries->newEntity();

        if ($this->request->is('post')) {
            $artistsGallery = $this->ArtistsGalleries->patchEntity($artistsGallery, $this->request->getData());
            $artistsGallery->artist_id = $artists;
            $artistsGallery->gallery_id = $this->request->getData('gallery_id');

            if ($this->ArtistsGalleries->save($artistsGallery)) {
                return $this->redirect(['controller' => 'Admin', 'action' => 'artistinfo', $artists]);
            }
        }
        $artists = $this->ArtistsGalleries->Artists->find('list', ['limit' => 200]);
        $galleries = $this->ArtistsGalleries->Galleries->find('list', ['limit' => 200]);
        $this->set(compact('artistsGallery', 'artists', 'galleries'));
    }

    /**
     * Edit method
     *
     * @param $artistID
     * @param $galleryID
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     */
    public function edit($artistID, $galleryID)
    {
        $this->loadModel('Artists');
        $this->loadModel('Galleries');

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

        if ($this->request->is(['patch', 'post', 'put'])) {
            $artistsGallery = $this->ArtistsGalleries->patchEntity($galleryID, $this->request->getData());
            if ($this->ArtistsGalleries->save($artistsGallery)) {
                return $this->redirect(['controller' => 'admin', 'action' => 'artistinfo', $artistID]);
            }
        }

        $artistsGallery = $this->ArtistsGalleries->Galleries->get($galleryID, ['contain' => ['Artists']]);

//        $currentGallery = $this->ArtistsGalleries->Galleries->find()->select(['name'])->where(['id IS' => $galleryID])->toArray();

        $listGalleries = $this->ArtistsGalleries->Galleries->find('list');

        $artists = $this->ArtistsGalleries->Artists->find('list', ['limit' => 200]);

        $this->set(compact('artistsGallery', 'artists', 'listGalleries', 'artistID'));
    }

    /**
     * Delete method
     *
     * @param $artistID
     * @param $galleryID
     * @return \Cake\Http\Response|null Redirects to index.
     */
    public function delete($artistID = null, $galleryID = null)
    {
        $artistsGallery = $this->ArtistsGalleries->get([$artistID, $galleryID]);

        if ($this->ArtistsGalleries->delete($artistsGallery)) {
            return $this->redirect(['controller' => 'admin', 'action' => 'artistinfo', $artistID]);
        } else {
            return $this->redirect($this->referer());
        }
    }
}
