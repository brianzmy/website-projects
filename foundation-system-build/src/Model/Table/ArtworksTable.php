<?php

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Artworks Model
 *
 * @property \App\Model\Table\ProjectsTable|\Cake\ORM\Association\BelongsTo $Projects
 * @property \App\Model\Table\GalleriesTable|\Cake\ORM\Association\BelongsTo $Galleries
 * @property \App\Model\Table\ArtistsTable|\Cake\ORM\Association\BelongsToMany $Artists
 *
 * @method \App\Model\Entity\Artwork get($primaryKey, $options = [])
 * @method \App\Model\Entity\Artwork newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Artwork[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Artwork|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Artwork patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Artwork[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Artwork findOrCreate($search, callable $callback = null, $options = [])
 */
class ArtworksTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('artworks');
        $this->setDisplayField('title');
        $this->setPrimaryKey('id');

        $this->belongsTo('Projects', [
            'foreignKey' => 'project_id'
        ]);
        $this->belongsTo('Galleries', [
            'foreignKey' => 'gallery_id'
        ]);
        $this->belongsTo('Artists', [
            'foreignKey' => 'artist_id'
        ]);
        $this->addBehavior('Josegonzalez/Upload.Upload', [
            'artwork_img' => []
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->scalar('title')
            ->maxLength('title', 50)
            ->requirePresence('title', 'create')
            ->notEmpty('title');

        $validator
            ->integer('year');
//            ->requirePresence('year', 'create')
//            ->notEmpty('year');

        $validator
            ->scalar('location')
            ->maxLength('location', 50)
            ->requirePresence('location', 'create')
            ->notEmpty('location');

        $validator
            ->scalar('medium')
            ->inList('Medium', array(
                'Painting',
                'Drawing',
                'Sculpture',
                'Printmaking',
                'Installation',
                'Performance',
                'Film',
                'Digital',
                'Animation',
                'Projection',
                'Sound',
                'Flooring',
                'Furniture',
                'Public art',
                'Embedded art',
                'Environmental art',
                'Socially Engaged Practice',
                'Other'
            ))
            ->requirePresence('medium', 'create')
            ->notEmpty('medium');

        $validator
            ->scalar('style')
            ->inList('Style', array(
                'Conceptual',
                'Abstract',
                'Figurative',
                'Landscape',
                'Digital',
                'Political',
                'Humour',
                'Other'
            ))
            ->requirePresence('style', 'create')
            ->notEmpty('style');

        $validator
            ->add('title', [
                'maxLength' => [
                    'rule' => ['maxLength', 50],
                    'message' => 'The length is too long.'
                ],
                'validate_name' => [
                    'rule' => ['custom', '/^[a-zA-Z0-9! ]*$/i'],
                    'message' => 'Please input a valid name.'
                ]
            ]);

        $validator
            ->add('location', [
                'maxLength' => [
                    'rule' => ['maxLength', 50]
                ],
                'validate_location' => [
                    'rule' => ['custom', '/^[a-zA-Z ]*$/i'],
                    'message' => 'Please input a valid name.'
                ]
            ]);

        $validator
            ->add('year', [
                'maxLength' => [
                    'rule' => ['maxLength', 4]
                ],
                'validate_year' => [
                    'rule' => ['custom', '/^[0-9]*$/i'],
                    'message' => 'Please input a year value.'
                ]
            ]);

        $validator
            ->requirePresence('artwork_img', 'create')
            ->allowEmpty('artwork_img', 'update');

        $validator
            ->integer('time');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['project_id'], 'Projects'));
        $rules->add($rules->existsIn(['gallery_id'], 'Galleries'));
        $rules->add($rules->existsIn(['artist_id'], 'Artists'));

        return $rules;
    }
}
