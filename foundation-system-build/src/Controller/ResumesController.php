<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

/**
 * Resumes Controller
 *
 * @property \App\Model\Table\ResumesTable $Resumes
 *
 * @method \App\Model\Entity\Resumes[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ResumesController extends AppController
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
        $resume = $this->paginate($this->Resumes);

        $this->set(compact('resume'));
    }

    /**
     * View method
     *
     * @param string|null $id Resumes id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $resume = $this->Resumes->get($id, [
            'contain' => ['Artists', 'Projects']
        ]);

        $this->set('resume', $resume);
    }

    /**
     * Add method
     *
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
                return $this->redirect(['controller' => 'Admin', 'action' => 'artistinfo', $this->Auth->user('artist_id')]);
            }
        }

        if($user['type'] == 'Admin'){
            $this->viewBuilder()->setLayout('default');
        }

        $resume = $this->Resumes->newEntity();
        if ($this->request->is('post')) {
            $resume = $this->Resumes->patchEntity($resume, $this->request->getData());
            if ($this->Resumes->save($resume)) {
                return $this->redirect(['controller' => 'Admin', 'action' => 'artistinfo', $artists]);
            }
        }

        $experienceTypes = array(
            'Architecture – external' => 'Architecture – external',
            'Architecture - internal/interiors' => 'Architecture - internal/interiors',
            'Arts & Architecture - embedded façade treatment' => 'Arts & Architecture - embedded façade treatment',
            'Arts & Architecture - glass' => 'Arts & Architecture - glass',
            'Arts & Architecture - graphic application' => 'Arts & Architecture - graphic application',
            'Arts & Architecture - internal spaces' => 'Arts & Architecture - internal spaces',
            'Arts & Architecture – intervention' => 'Arts & Architecture - internal spaces',
            'Arts & Architecture – lighting' => 'Arts & Architecture – lighting',
            'Arts & Architecture - lighting' => 'Arts & Architecture - lighting',
            'Public realm – bollards' => 'Public realm – bollards',
            'Public realm – bridges' => 'Public realm – bridges',
            'Public realm - external public spaces' => 'Public realm - external public spaces',
            'Public realm – plazas' => 'Public realm – plazas',
            'Public realm - railings & fences' => 'Public realm - railings & fences',
            'Public realm - hardplanting & flooring' => 'Public realm - hardplanting & flooring',
            'Public realm – retail' => 'Public realm – retail',
            'Public realm - water features' => 'Public realm - water features',
            'Public realm – textiles' => 'Public realm – textiles',
            'Public Realm - seating' => 'Public Realm - seating',
            'Public art' => 'Public art',
            'Embedded art' => 'Embedded art',
            'Environmental art' => 'Environmental art',
            'Community art' => 'Community art',
            'Art & Play' => 'Art & Play',
            'Galleries' => 'Galleries',
            'Environmental / Sustainability / green initiatives' => 'Environmental / Sustainability / green initiatives',
            'Educational initiatives' => 'Educational initiatives',
            'Arts in regeneration' => 'Arts in regeneration',
            'Socially Engaged Practice' => 'Socially Engaged Practice',
            'Regeneration' => 'Regeneration',
            'Wayfinding / text' => 'Wayfinding / text',
            'Signage' => 'Signage',
            'Pop-up' => 'Pop-up',
            'Temporary (banners, building wraps, conceptual, hoardings, installations, lighting, projection, screens, signage, sound)' => 'Temporary (banners, building wraps, conceptual, hoardings, installations, lighting, projection, screens, signage, sound)',
            'Animation' => 'Animation',
            'Live events' => 'Live events',
            'Festivals' => 'Festivals',
            'Community engagement' => 'Community engagement',
            'Food / culinary' => 'Food / culinary',
            'Horticulture' => 'Horticulture',
            'Other' => 'Other'
        );

        $artists = $this->Resumes->Artists->find('list', ['limit' => 200]);
        $this->set(compact('resume', 'artists', 'experienceTypes'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Resumes id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($resume, $artists)
    {
        $user = $this->Auth->user();

        $resume_table = TableRegistry::get("resumes");

        $resume = $resume_table->get($resume, [
            'contain' => []
        ]);

        // **** Change the set layout to the artist portal
        if($user['type'] != 'Admin'){
            $this->viewBuilder()->setLayout('newartistlayout');

            if ($user['type'] == 'Client' || $user['type'] == 'Gallery') {
                return $this->redirect($this->Auth->logout());
            }

            if($resume->artist_id != $this->Auth->user('artist_id')){
                return $this->redirect(['controller' => 'Admin', 'action' => 'artistinfo', $this->Auth->user('artist_id')]);
            }

            if($artists != $this->Auth->user('artist_id')){
                return $this->redirect(['controller' => 'Admin', 'action' => 'artistinfo', $this->Auth->user('artist_id')]);
            }
        }

        if($user['type'] == 'Admin'){
            $this->viewBuilder()->setLayout('default');
        }

        if ($this->request->is(['patch', 'post', 'put'])) {
            $resume = $this->Resumes->patchEntity($resume, $this->request->getData());
            if ($this->Resumes->save($resume)) {
                return $this->redirect(['controller' => 'Admin', 'action' => 'artistinfo', $artists]);
            }
        }


        $experienceTypes = array(
            'Architecture – external' => 'Architecture – external',
            'Architecture - internal/interiors' => 'Architecture - internal/interiors',
            'Arts & Architecture - embedded façade treatment' => 'Arts & Architecture - embedded façade treatment',
            'Arts & Architecture - glass' => 'Arts & Architecture - glass',
            'Arts & Architecture - graphic application' => 'Arts & Architecture - graphic application',
            'Arts & Architecture - internal spaces' => 'Arts & Architecture - internal spaces',
            'Arts & Architecture – intervention' => 'Arts & Architecture - internal spaces',
            'Arts & Architecture – lighting' => 'Arts & Architecture – lighting',
            'Arts & Architecture - lighting' => 'Arts & Architecture - lighting',
            'Public realm – bollards' => 'Public realm – bollards',
            'Public realm – bridges' => 'Public realm – bridges',
            'Public realm - external public spaces' => 'Public realm - external public spaces',
            'Public realm – plazas' => 'Public realm – plazas',
            'Public realm - railings & fences' => 'Public realm - railings & fences',
            'Public realm - hardplanting & flooring' => 'Public realm - hardplanting & flooring',
            'Public realm – retail' => 'Public realm – retail',
            'Public realm - water features' => 'Public realm - water features',
            'Public realm – textiles' => 'Public realm – textiles',
            'Public Realm - seating' => 'Public Realm - seating',
            'Public art' => 'Public art',
            'Embedded art' => 'Embedded art',
            'Environmental art' => 'Environmental art',
            'Community art' => 'Community art',
            'Art & Play' => 'Art & Play',
            'Galleries' => 'Galleries',
            'Environmental / Sustainability / green initiatives' => 'Environmental / Sustainability / green initiatives',
            'Educational initiatives' => 'Educational initiatives',
            'Arts in regeneration' => 'Arts in regeneration',
            'Socially Engaged Practice' => 'Socially Engaged Practice',
            'Regeneration' => 'Regeneration',
            'Wayfinding / text' => 'Wayfinding / text',
            'Signage' => 'Signage',
            'Pop-up' => 'Pop-up',
            'Temporary (banners, building wraps, conceptual, hoardings, installations, lighting, projection, screens, signage, sound)' => 'Temporary (banners, building wraps, conceptual, hoardings, installations, lighting, projection, screens, signage, sound)',
            'Animation' => 'Animation',
            'Live events' => 'Live events',
            'Festivals' => 'Festivals',
            'Community engagement' => 'Community engagement',
            'Food / culinary' => 'Food / culinary',
            'Horticulture' => 'Horticulture',
            'Other' => 'Other'
        );

        $artists = $this->Resumes->Artists->find('list', ['limit' => 200]);
        $this->set(compact('resume', 'artists', 'experienceTypes'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Resumes id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
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

        $this->request->allowMethod(['post', 'delete']);
        $resume = $this->Resumes->get($id);
        if ($this->Resumes->delete($resume)) {
            return $this->redirect(['action' => 'index']);
        }



    }
}
