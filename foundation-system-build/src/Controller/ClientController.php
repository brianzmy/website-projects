<?php
namespace App\Controller;

use App\Controller\AppController;

class ClientController extends AppController
{
    public function index () {

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

        $this->loadModel('artists');
        $this->loadModel('artworks');
//        $this->loadModel('Artworks_Artists');

        if($this->request->is('post')) {
            $array = array();
            $artwork = array();

            $name = $this->request->getData('search');
            array_push($array, $name);

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
                    ['artists.website LIKE' => "%{$website}%"],
                    ['artists.origin LIKE' => "%{$origin}%"],
                    ['artworks.medium LIKE' => "%{$medium}%"],
                    ['artworks.style LIKE' => "%{$style}%"]
                ]];

                $filtered_artists = $this->artists->find('all', ['join'=>['artworks' => [
                    'table' => 'artworks',
                    'type' => 'INNER',
                    'conditions' => ['artworks.artist_id = artists.id']
                ]]])->distinct()->where($filter);
//
                $this->set(compact('filtered_artists'));
                $this->getRequest()->session()->write([
                    'filter'=>$filter,
                    'artwork'=>$artwork
                ]);
            }

            if($style == '' && $medium != ''){
                $filter[] = ['AND' => [
                    ['artists.name LIKE' => "%{$name}%"],
                    ['artists.website LIKE' => "%{$website}%"],
                    ['artists.origin LIKE' => "%{$origin}%"],
                    ['artworks.medium LIKE' => "%{$medium}%"]
                ]];

                $filtered_artists = $this->artists->find('all', ['join'=>['artworks' => [
                    'table' => 'artworks',
                    'type' => 'INNER',
                    'conditions' => ['artworks.artist_id = artists.id']
                ]]])->distinct()->where($filter);

                $this->set(compact('filtered_artists'));
                $this->getRequest()->session()->write([
                    'filter'=>$filter,
                    'artwork'=>$artwork
                ]);

            }

            if($style != '' && $medium == ''){
                $filter[] = ['AND' => [
                    ['artists.name LIKE' => "%{$name}%"],
                    ['artists.website LIKE' => "%{$website}%"],
                    ['artists.origin LIKE' => "%{$origin}%"],
                    ['artworks.style LIKE' => "%{$style}%"]
                ]];

                $filtered_artists = $this->artists->find('all', ['join'=>['artworks' => [
                    'table' => 'artworks',
                    'type' => 'INNER',
                    'conditions' => ['artworks.artist_id = artists.id']
                ]]])->distinct()->where($filter);

                $this->set(compact('filtered_artists'));
                $this->getRequest()->session()->write([
                    'filter'=>$filter,
                    'artwork'=>$artwork
                ]);
            }

            if(!empty($array) && $style == '' && $medium == ''){
                $filter[] = ['AND' => [
                    ['artists.name LIKE' => "%{$name}%"],
                    ['artists.website LIKE' => "%{$website}%"],
                    ['artists.origin LIKE' => "%{$origin}%"]
                ]];

                $filtered_artists = $this->artists->find()->where($filter);

                $this->set(compact('filtered_artists'));
                $this->getRequest()->session()->write([
                    'filter'=>$filter,
                    'artwork'=>$artwork
                ]);

            }
        } else {
            $filtered_artists = $this->artists->find()->where();
            $this->set(compact('filtered_artists'));
        }
    }

    public function publicinfo ($artists) {
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

        $this->loadModel('Artists');
        $this->loadModel('Agents');
        $this->loadModel('Resumes');
        $this->loadModel('Projects');
        $this->loadModel('Artists_Galleries');
        $this->loadModel('Galleries');
        $this->loadModel('Artworks');

        //* Select artist

        $selectedArtist = $this->Artists->find()->where(['id IS' => $artists]);
        $this->set('selected_artists', $selectedArtist);

        $current_id = "";

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

    public function artists() {
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

        $this->loadModel('Artists');

        $artists = $this->paginate($this->Artists->find()->where(['Artists.approved' => 'Yes']));
        $this->set(compact('artists'));
    }

    public function export ()
    {
        $filter = $this->getRequest()->getSession()->read('filter');
        $artwork = $this->getRequest()->getSession()->read('artwork');
        $this->loadModel('artists');
        $this->response->download('Artist Export.csv');
//        $query = $Artists->find('list');
//        $data = $this->Artists->find()->where($filter)->toArray();

//        debug($artwork);
//        debug($this->getRequest()->getSession()->read('artwork'));

        if($artwork == null){
            $data = $this->artists->find()->select(['name', 'website', 'origin', 'indigenous'])->where($filter)->toArray();
        }
        else{
            $data = $this->artists->find('all', ['join'=>['artworks' => [
                'table' => 'artworks',
                'type' => 'INNER',
                'conditions' => ['artworks.artist_id = artists.id']
            ]]])->distinct()->select(['name', 'website', 'origin', 'indigenous'])->where($filter)->toArray();
        }

        $_serialize = 'data';
        $this->set(compact('data', '_serialize'));
        $this->viewBuilder()->className('CsvView.Csv');
        $_header = ['Name','Website','Which mobs are you connected to?','Identify as Aboriginal or Torres Strait Islander?'];
        $this->set(compact('data', '_serialize', '_header'));
        return;
    }

}
