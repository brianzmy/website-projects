<?php
/**
 * Created by PhpStorm.
 * User: Dylan
 * Date: 25/04/2019
 * Time: 4:19 PM
 */

namespace App\Controller;

use App\Model\Entity\ArtworksArtists;
use Cake\Collection\Collection;
use Cake\Core\Configure;
use Cake\Database\Query;
use App\Controller\AppController;
use Cake\Http\Exception\NotFoundException;
use Cake\ORM\TableRegistry;


/**
 * @property bool|object Artists
 * @property bool|object Artworks
 * @property bool|object Artworks_Artists
 */
class AdminController extends AppController
{
    /**
     * @return \Cake\Http\Response|null
     */
    public function index()
    {

        $this->loadModel('artists');
        $this->loadModel('artworks');

        $user = $this->Auth->user();

        if($user['type'] != 'Admin'){
            return $this->redirect($this->Auth->logout());
        }

        if($user['type'] == 'Admin'){
            $this->viewBuilder()->setLayout('default');
        }

        if($this->request->is('post')) {

            $array = array();
            $artwork = array();

            $name = $this->request->getData('search');
            array_push($array, $name);

            $phone = $this->request->getData('phone');
            array_push($array, $phone);

            $address = $this->request->getData('address');
            array_push($array, $address);

            $email = $this->request->getData('email');
            array_push($array, $email);

            $website = $this->request->getData('website');
            array_push($array, $website);

            $origin = $this->request->getData('origin');
            array_push($array, $origin);

            $medium = $this->request->getData('medium');
            array_push($artwork, $medium);

            $style = $this->request->getData('style');
            array_push($artwork, $style);

            if ($style != '' && $medium != '') {
                $filter[] = ['AND' => [
                    ['artists.name LIKE' => "%{$name}%"],
                    ['artists.phone LIKE' => "%{$phone}%"],
                    ['artists.address LIKE' => "%{$address}%"],
                    ['artists.email LIKE' => "%{$email}%"],
                    ['artists.website LIKE' => "%{$website}%"],
                    ['artists.origin LIKE' => "%{$origin}%"],
                    ['artworks.medium LIKE' => "%$medium%"],
                    ['artworks.style LIKE' => "%{$style}%"]
                ]];

                $filtered_artists = $this->artists->find('all', ['join'=>['artworks' => [
                    'table' => 'artworks',
                    'type' => 'INNER',
                    'conditions' => ['artworks.artist_id = artists.id']
                ]]])->distinct()->where([$filter, 'artists.approved' => 'Yes']);

//                $filtered_artists = $this->paginate($this->Artists->find('all', ['join'=>['Artworks' => [
//                    'table' => 'Artworks',
//                    'type' => 'INNER',
//                    'conditions' => ['Artworks.artist_id = Artists.id']
//                ]]])->distinct()->where($filter),['limit'=>5]);
//
//                $this->set(compact('filtered_artists'));
                $this->getRequest()->session()->write([
                    'filter'=>$filter,
                    'array'=>$array,
                    'artwork'=>$artwork
                ]);
                $this->set(compact('filtered_artists'));
            }

            if($style == '' && $medium != ''){
                $filter[] = ['AND' => [
                    ['artists.name LIKE' => "%{$name}%"],
                    ['artists.phone LIKE' => "%{$phone}%"],
                    ['artists.address LIKE' => "%{$address}%"],
                    ['artists.email LIKE' => "%{$email}%"],
                    ['artists.website LIKE' => "%{$website}%"],
                    ['artists.origin LIKE' => "%{$origin}%"],
                    ['artworks.medium LIKE' => "%{$medium}%"]
                ]];

                $filtered_artists = $this->artists->find('all', ['join'=>['artworks' => [
                    'table' => 'artworks',
                    'type' => 'INNER',
                    'conditions' => ['artworks.artist_id = artists.id']
                ]]])->distinct()->where([$filter, 'artists.approved' => 'Yes']);

                $this->getRequest()->session()->write([
                    'filter'=>$filter,
                    'array'=>$array,
                    'artwork'=>$artwork
                ]);

                $this->set(compact('filtered_artists'));
            }

            if($style != '' && $medium == ''){
                $filter[] = ['AND' => [
                    ['artists.name LIKE' => "%{$name}%"],
                    ['artists.phone LIKE' => "%{$phone}%"],
                    ['artists.address LIKE' => "%{$address}%"],
                    ['artists.email LIKE' => "%{$email}%"],
                    ['artists.website LIKE' => "%{$website}%"],
                    ['artists.origin LIKE' => "%{$origin}%"],
                    ['artworks.style LIKE' => "%{$style}%"]
                ]];


                $filtered_artists = $this->artists->find('all', ['join'=>['artworks' => [
                    'table' => 'artworks',
                    'type' => 'INNER',
                    'conditions' => ['artworks.artist_id = artists.id']
                ]]])->distinct()->where([$filter, 'artists.approved' => 'Yes']);

//                $filtered_artists = $this->paginate($this->Artists->find('all', ['join'=>['Artworks' => [
//                    'table' => 'Artworks',
//                    'type' => 'INNER',
//                    'conditions' => ['Artworks.artist_id = Artists.id']
//                ]]])->distinct()->where($filter),['limit'=>10]);

//                $this->set(compact('filtered_artists'));
                $this->getRequest()->session()->write([
                    'filter'=>$filter,
                    'array'=>$array,
                    'artwork'=>$artwork
                ]);

                $this->set(compact('filtered_artists'));
            }

            if(!empty($array) && $style == '' && $medium == ''){
                $filter[] = ['AND' => [
                    ['artists.name LIKE' => "%{$name}%"],
                    ['artists.phone LIKE' => "%{$phone}%"],
                    ['artists.address LIKE' => "%{$address}%"],
                    ['artists.email LIKE' => "%{$email}%"],
                    ['artists.website LIKE' => "%{$website}%"],
                    ['artists.origin LIKE' => "%{$origin}%"]
                ]];

                $filtered_artists = $this->artists->find()->where([$filter, 'artists.approved' => 'Yes']);

                $this->getRequest()->session()->write([
                    'filter'=>$filter,
                    'array'=>$array,
                    'artwork'=>$artwork
                ]);
                $this->set(compact('filtered_artists'));

//                $filtered_artists = $this->paginate($this->Artists->find()->where($filter),['limit'=>10]);

//                $this->set(compact('filtered_artists'));
//            }else{
//                $filtered_artists = $this->Artists->find()->where(['Artists.approved' => 'Yes']);
//
//                $this->getRequest()->session()->write([
//                    'filter'=>$filter,
//                    'array'=>$array,
//                    'artwork'=>$artwork
//                ]);
//                $this->set(compact('filtered_artists'));
            }

//            $this->getRequest()->session()->write([
//                'filter'=>$filtered_artists,
//            ]);

//            Configure::write('Session', [
//                'filter' => $filtered_artists
//            ]);

//            $this->set(compact('filtered_artists'));

        }
        else {
            $filtered_artists = $this->artists->find()->where(['artists.approved' => 'Yes']);
//            $filtered_artists = $this->paginate($this->Artists->find()->where(),['limit'=>10]);


            $this->set(compact('filtered_artists'));
        }


    }

    /**
     * @param $artists
     * @return \Cake\Http\Response|null
     */

    public function artistinfo($artists)
    {
        $user = $this->Auth->user();


        if ($user['type'] == 'Admin') {
            $this->viewBuilder()->setLayout('default');
        }

        if ($user['type'] != 'Admin') {
            $this->viewBuilder()->setLayout('newartistlayout');

            if($user['type'] != 'Artist'){
                return $this->redirect($this->Auth->logout());
            }

            if($artists != $this->Auth->user('artist_id')){
//                throw new NotFoundException('You do not have access to this profile.');
                return $this->redirect(['controller' => 'Admin', 'action' => 'artistinfo', $this->Auth->user('artist_id')]);
            }
        }

        $this->loadModel('Artists');
        $this->loadModel('Agents');
        $this->loadModel('Resumes');
        $this->loadModel('Schedules');
        $this->loadModel('Projects');
        $this->loadModel('Artists_Galleries');
        $this->loadModel('Galleries');
        $this->loadModel('Artworks');


        $selectedArtist = $this->Artists->find()->where(['id IS' => $artists]);
        $this->set('selected_artists', $selectedArtist);

//        $current_id = $artists;

        //* Find artist's agent

        //        $is_agent_exist = false;
        //
        //        foreach ($selectedArtist as $artists):
        //            $associatedAgent_id = $artists->agent_id;
        //            $current_id = $artists->id;
        //
        //            if ($associatedAgent_id != ""){
        //                $is_agent_exist = true;
        //            }
        //
        //        endforeach;

        foreach ($selectedArtist as $artists):
            $artistAgent = $this->Agents->find()->where(['artist_id IS' => $artists->id]);
            $this->set('associated_agent', $artistAgent);
        endforeach;


        //* Find an artist's galleries

        $artistGallery = $this->Artists_Galleries->find()->where(['artist_id IS' => $artists->id]);
        $this->set('selected_artist_gallery', $artistGallery);

        $selected_gallery_list = [];

        foreach ($artistGallery as $gallery):
            $selectedGallery = $this->Galleries->find()->where(['id IS' => $gallery->gallery_id]);
            foreach ($selectedGallery as $pointer):
                $selected_gallery_list [] = $pointer;
            endforeach;
        endforeach;

        $this->set('associated_gallery', $selected_gallery_list);


        //* Find artist's resume

        $artistResume = $this->Resumes->find()->where(['artist_id IS' => $artists->id]);
        $this->set('artist_resume', $artistResume);

        //* Find projects associated with an artist's resume
        $artistresume_id = "";

        foreach ($artistResume as $resume):
            $artistresume_id = $resume->id;
        endforeach;


        $artistProject = $this->Projects->find()->where(['resume_id IS' => $artistresume_id]);
        $this->set('artist_project', $artistProject);


        //* Find an artist's artworks

        foreach ($selectedArtist as $artists):
            $artistArtwork = $this->Artworks->find()->where(['artist_id IS' => $artists->id]);
            $this->set('artist_artwork', $artistArtwork);
        endforeach;

//        $artistArtwork = $this->Artworks_Artists->find()->where(['artist_id IS' => $artists->id]);
//        $this->set('artist_artwork', $artistArtwork);
//
        $selectedArtwork_information_list = [];

        foreach ($artistArtwork as $artworks_artists):
            $selectedArtwork = $this->Artworks->find()->where(['id IS' => $artworks_artists->artwork_id]);
            foreach ($selectedArtwork as $pointer):
                $selectedArtwork_information_list [] = $pointer;
            endforeach;
        endforeach;
//
//        //* $selectedArtwork = $this->Artworks->find()->where(['id IS' => $artwork_id_list]);
        $this->set('selected_artwork', $selectedArtwork_information_list);
    }


    public function delete($id = null)
    {
        $user = $this->Auth->user();

        if ($user['type'] == 'Admin') {
            $this->viewBuilder()->setLayout('default');
        }

        if ($user['type'] != 'Admin') {
            $this->viewBuilder()->setLayout('newartistlayout');

            if($user['type'] != 'Artist'){
                return $this->redirect($this->Auth->logout());
            }

            if($id != $this->Auth->user('artist_id')){
//                throw new NotFoundException('You do not have access to this profile.');
                return $this->redirect(['controller' => 'Admin', 'action' => 'artistinfo', $this->Auth->user('artist_id')]);
            }
        }

        return $this->redirect(['action' => 'index']);
    }

    public function printartwork($artists)
    {
        $user = $this->Auth->user();

        if ($user['type'] == 'Admin' || $user['type'] == 'Client') {
            $this->viewBuilder()->setLayout('default');
        }

        if ($user['type'] != 'Admin' && $user['type'] != 'Client') {
            $this->viewBuilder()->setLayout('newartistlayout');

            if($user['type'] != 'Artist'){
                return $this->redirect($this->Auth->logout());
            }

            if($artists != $this->Auth->user('artist_id')){
//                throw new NotFoundException('You do not have access to this profile.');
                return $this->redirect(['controller' => 'Admin', 'action' => 'artistinfo', $this->Auth->user('artist_id')]);
            }
        }

        $this->loadModel('Artists');
        $this->loadModel('Artworks');
        $this->loadModel('Artworks_Artists');

        $artistArtwork = $this->Artworks->find()->where(['artist_id IS' => $artists]);
        $this->set('artist_artwork', $artistArtwork);

        $selectedArtwork_information_list = [];

        foreach ($artistArtwork as $artworks_artists):
                $selectedArtwork_information_list [] = $artworks_artists;
        endforeach;

        //* $selectedArtwork = $this->Artworks->find()->where(['id IS' => $artwork_id_list]);
        $this->set('selected_artwork', $selectedArtwork_information_list);
    }

    public function export ()
    {
        $this->loadModel('artists');
        $this->loadModel('artworks');

        $array = $this->getRequest()->getSession()->read('array');
        $artwork = $this->getRequest()->getSession()->read('artwork');
        $filter = $this->getRequest()->getSession()->read('filter');

        if($artwork[0] == '' && $artwork[1] == ''){
            $data = $this->artists->find()->where([$filter, 'artists.approved' => 'Yes'])->toArray();
        }else{
            $data = $this->artists->find('all', ['join'=>['artworks' => [
                'table' => 'artworks',
                'type' => 'INNER',
                'conditions' => ['artworks.artist_id = artists.id']
            ]]])->distinct()->where([$filter, 'artists.approved' => 'Yes']);
        }

        $this->response->download('Artist Export.csv');
        $_serialize = 'data';
        $this->set(compact('data', '_serialize'));
        $this->viewBuilder()->className('CsvView.Csv');
        $_header = ['ID','Name','Phone','Address','Email','Website','Origin','Identify as Aboriginal or Torres Strait Islander?','Mobs Connected To'];
        $this->set(compact('data', '_serialize', '_header'));
        return;
    }


}

