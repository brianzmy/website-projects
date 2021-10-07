<?php
/**
 * Created by PhpStorm.
 * User: Dylan
 * Date: 17/05/2019
 * Time: 9:01 PM
 */

namespace App\Controller;

use App\Controller\AppController;
use Cake\Controller\Component\AuthComponent;
use Cake\ORM\Table;
use Cake\ORM\TableRegistry;
use Cake\Routing\Router;
use Cake\Validation\Validator;
use Cake\Error\ErrorHandler;
use Cake\I18n\Time;


class ArtworksController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Projects', 'Galleries']
        ];
        $artworks = $this->paginate($this->Artworks);

        $this->set(compact('artworks'));
    }

    /**
     * View method
     *
     * @param string|null $id Artwork id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $artwork = $this->Artworks->get($id, [
            'contain' => ['Projects', 'Galleries', 'Artists']
        ]);

        $this->set('artwork', $artwork);
    }

    /**
     * Add method
     *
     * @param $artists
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add($artists)
    {
        $user = $this->Auth->user();

        // **** Change the set layout to the artist portal
        if($user['type'] != 'Admin'){
            $this->viewBuilder()->setLayout('newartistlayout');

            if ($user['type'] == 'Client' || $user['type'] == 'Gallery') {
                return $this->redirect($this->Auth->logout());
            }

            if($artists != $this->Auth->user('artist_id')){
//                throw new NotFoundException('You do not have access to this profile.');
                return $this->redirect(['controller' => 'Admin', 'action' => 'artistinfo', $this->Auth->user('artist_id')]);
            }
        }

        if($user['type'] == 'Admin'){
            $this->viewBuilder()->setLayout('default');
        }

        $this->loadModel('ArtworksArtists');
        $this->loadModel('Resumes');

        $artwork = $this->Artworks->newEntity();
        $now=Time::now();
        if ($this->request->is('post')) {
            $artwork = $this->Artworks->patchEntity($artwork, $this->request->getData());
            $artwork->artist_id = $artists;
            $artwork->time=$now;
            //add image
            if(!empty($this->artwork))
            {
                //Check if image has been uploaded
                if(empty($this->artwork['artworks']['artwork_img']['name']))
                {
                    $file = $this->artwork['artworks']['artwork_img']; //put the data into a var for easy use

                    $ext = substr(strtolower(strrchr($file['name'], '.')), 1); //get the extension
                    $arr_ext = array('png', 'jpeg'); //set allowed extensions

                    //only process if the extension is valid
                    if(in_array($ext, $arr_ext))
                    {
                        //do the actual uploading of the file. First arg is the tmp name, second arg is
                        //where we are putting it
                        move_uploaded_file($file['tmp_name'], WWW_ROOT . 'img/artwork' . $file['name']);

                        //prepare the filename for database entry
                        $this->artwork['artworks']['artwork_img'] = $file['name'];
                    }
                }

            }
            //end of add image

//            $query = $this->Artworks->find('all', ['order' => ['id' => 'DESC']]);
//            $artworkID = $query->first()->toArray()['id'];

//            $artistsArtwork = $this->ArtworksArtists->newEntity();
//            $artistsArtwork = $this->ArtworksArtists->patchEntity($artistsArtwork, $this->request->getData());
//            $artistsArtwork->artist_id = $artists;
//            $artistsArtwork->artwork_id = $artworkID;
//            if ($this->ArtworksArtists->save($artistsArtwork)) {
//                $this->Flash->success(__("The artist's artwork has been saved."));
//            $name=$artwork->artwork_img['name'].'_'.\time();
//            $name=$artwork->artwork_img['name'];
//            $name=substr($name,0,strrpos($name,'.')); //delete extension
            $path_parts = pathinfo($_FILES["artwork_img"]["name"]);
            $name = $path_parts['filename'].'_'.time().'.'.$path_parts['extension'];
            $artwork->artwork_img['name']=$name;
            $this->Artworks->save($artwork);
                return $this->redirect(['controller' => 'Admin', 'action' => 'artistinfo', $artists]);
//            }
//            else {
//                $this->Flash->error(__("The artist's artwork could not be saved. Please, try again."));
//            }

        }

        $mediumList = array(
            'Painting' => 'Painting',
            'Drawing' => 'Drawing',
            'Sculpture' => 'Sculpture',
            'Printmaking' => 'Printmaking',
            'Installation' => 'Installation',
            'Performance' => 'Performance',
            'Film' => 'Film',
            'Digital' => 'Digital',
            'Animation' => 'Animation',
            'Projection' => 'Projection',
            'Sound' => 'Sound',
            'Flooring' => 'Flooring',
            'Furniture' => 'Furniture',
            'Public art' => 'Public art',
            'Embedded art' => 'Embedded art',
            'Environmental art' => 'Environmental art',
            'Socially Engaged Practice' => 'Socially Engaged Practice',
            'Other' => 'Other'
        );

        $styleList = array(
            'Conceptual' => 'Conceptual',
            'Abstract' => 'Abstract',
            'Figurative' => 'Figurative',
            'Landscape' => 'Landscape',
            'Digital' => 'Digital',
            'Political' => 'Political',
            'Humour' => 'Humour',
            'Other' => 'Other'
        );

        $resumeID = $this->Resumes->find()->select('id')->where(['artist_id IS' => $artists]);

        $projects = $this->Artworks->Projects->find('list')->where(['resume_id IS' => $resumeID]);
        $galleries = $this->Artworks->Galleries->find('list', ['limit' => 200]);
        $artists = $this->Artworks->Artists->find('list', ['limit' => 200]);
        $this->set(compact('artwork', 'projects', 'galleries', 'artists', 'mediumList', 'styleList'));
    }

    /**
     * Edit method
     *
     * @param $artwork
     * @param $artists
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     */
    public function edit($artists, $artwork)
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

        $this->loadModel('Resumes');
        $artwork_table = TableRegistry::get("artworks");

        $artwork = $artwork_table->get($artwork, [
            'contain' => ['Artists']
        ]);

//        if($this->artist_artwork->artist_id != $this->Auth->user('artist_id')){
//            debug($this->artist_artwork->artist_id);
//
////            return $this->redirect(['controller' => 'Admin', 'action' => 'artistinfo', $this->Auth->user('artist_id')]);
//        }

        if ($this->request->is(['patch', 'post', 'put'])) {
            $artwork = $this->Artworks->patchEntity($artwork, $this->request->getData());
            if(!empty($this->artwork))
            {
                //Check if image has been uploaded
                if(!empty($this->artwork['artworks']['artwork_img']['name']))
                {
                    $file = $this->artwork['artworks']['artwork_img']; //put the data into a var for easy use

                    $ext = substr(strtolower(strrchr($file['name'], '.')), 1); //get the extension
                    $arr_ext = array('png', 'jpeg'); //set allowed extensions

                    //only process if the extension is valid
                    if(in_array($ext, $arr_ext))
                    {
                        //do the actual uploading of the file. First arg is the tmp name, second arg is
                        //where we are putting it
                        move_uploaded_file($file['tmp_name'], WWW_ROOT . '/img' . $file['name']);

                        //prepare the filename for database entry
                        $this->artwork['artworks']['artwork_img'] = $file['name'];
                    }
                }

            }
            if ($this->Artworks->save($artwork)) {
                return $this->redirect(['controller' => 'Admin', 'action' => 'artistinfo', $artists]);
            }
        }

        $mediumList = array(
            'Painting' => 'Painting',
            'Drawing' => 'Drawing',
            'Sculpture' => 'Sculpture',
            'Printmaking' => 'Printmaking',
            'Installation' => 'Installation',
            'Performance' => 'Performance',
            'Film' => 'Film',
            'Digital' => 'Digital',
            'Animation' => 'Animation',
            'Projection' => 'Projection',
            'Sound' => 'Sound',
            'Flooring' => 'Flooring',
            'Furniture' => 'Furniture',
            'Public art' => 'Public art',
            'Embedded art' => 'Embedded art',
            'Environmental art' => 'Environmental art',
            'Socially Engaged Practice' => 'Socially Engaged Practice',
            'Other' => 'Other'
        );

        $styleList = array(
            'Conceptual' => 'Conceptual',
            'Abstract' => 'Abstract',
            'Figurative' => 'Figurative',
            'Landscape' => 'Landscape',
            'Digital' => 'Digital',
            'Political' => 'Political',
            'Humour' => 'Humour',
            'Other' => 'Other'
        );

        $resumeID = $this->Resumes->find()->select('id')->where(['artist_id IS' => $artists]);

        $projects = $this->Artworks->Projects->find('list')->where(['resume_id IS' => $resumeID]);
        $galleries = $this->Artworks->Galleries->find('list', ['limit' => 200]);
        $artists = $this->Artworks->Artists->find('list', ['limit' => 200]);
        $this->set(compact('artwork', 'projects', 'galleries', 'artists', 'mediumList', 'styleList'));
    }

    /**
     * Delete method
     *
     * @param $artwork
     * @return \Cake\Http\Response|null Redirects to index.
     */
    public function delete($id, $artistID)
    {
//        $user = $this->Auth->user();
//
//         **** Change the set layout to the artist portal
//        if($user['type'] != 'Admin'){
//            $this->viewBuilder()->setLayout('newartistlayout');
//
//            if ($user['type'] == 'Client' || $user['type'] == 'Gallery') {
//                return $this->redirect($this->Auth->logout());
//            }
//
//            if($artistID != $this->Auth->user('artist_id')){
//                return $this->redirect(['controller' => 'Admin', 'action' => 'artistinfo', $this->Auth->user('artist_id')]);
//            }
//        }
//
//        if($user['type'] == 'Admin'){
//            $this->viewBuilder()->setLayout('default');
//        }

        $artwork = $this->Artworks->get($id, ['contain' => '']);
        if ($this->Artworks->delete($artwork)) {
            return $this->redirect(['controller' => 'Admin', 'action' => 'artistinfo', $artistID]);
        }
    }

    public function viewimage($artwork_id){

        $user = $this->Auth->user();

        if($user['type'] == 'Client'){
            $this->viewBuilder()->setLayout('clientlayout');
        }

        if($user['type'] == 'Admin'){
            $this->viewBuilder()->setLayout('default');
        }

        if($user['type'] != 'Client' && $user['type'] != 'Admin'){
            return $this->redirect($this->Auth->logout());
        }

        $selected_artwork = $this->Artworks->find()->where(['id IS' => $artwork_id]);

        $this->set('selected_artwork', $selected_artwork);

    }
}
