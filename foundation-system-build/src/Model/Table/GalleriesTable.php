<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Galleries Model
 *
 * @property \App\Model\Table\ArtworksTable|\Cake\ORM\Association\HasMany $Artworks
 * @property \App\Model\Table\ArtistsTable|\Cake\ORM\Association\BelongsToMany $Artists
 *
 * @method \App\Model\Entity\Gallery get($primaryKey, $options = [])
 * @method \App\Model\Entity\Gallery newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Gallery[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Gallery|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Gallery patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Gallery[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Gallery findOrCreate($search, callable $callback = null, $options = [])
 */
class GalleriesTable extends Table
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

        $this->setTable('galleries');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->hasMany('Artworks', [
            'foreignKey' => 'gallery_id'
        ]);
        $this->belongsToMany('Artists', [
            'foreignKey' => 'gallery_id',
            'targetForeignKey' => 'artist_id',
            'joinTable' => 'artists_galleries'
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
            ->scalar('name')
            ->requirePresence('name', 'create')
            ->notEmpty('name');

        $validator
            ->email('email')
            ->requirePresence('email', 'create')
            ->notEmpty('email');

        $validator
            ->scalar('phone')
            ->requirePresence('phone', 'create')
            ->notEmpty('phone');

        $validator
            ->scalar('website')
            ->maxLength('website', 70)
            ->allowEmpty('website');

        $validator
            ->scalar('contact_person')
            ->maxLength('contact_person', 50);
//            ->requirePresence('contact_person', 'create')
//            ->notEmpty('contact_person');

        $validator
            ->scalar('address')
            ->requirePresence('address', 'create')
            ->notEmpty('address');

        $validator
            ->scalar('second_address')
            ->maxLength('second_address', 100)
            ->allowEmpty('second_address');

        $validator
            ->add('name', [
                'validate_name' => [
                    'rule' => ['custom', '/^[a-zA-Z ]*$/i'],
                    'message' => 'Please input a valid name.'
                ]
            ]);

        $validator
            ->add('phone', [
                'maxLength' => [
                    'rule' => ['maxLength', 10]
                ],
                'validate_phone' => [
                    'rule' => ['custom', '/^[0-9]*$/i'],
                    'message' => 'Please input a valid phone number.'
                ]
            ]);

        $validator
            ->add('address', [
                'validate_address' => [
                    'rule' => ['custom', '/^[a-z0-9, ]*$/i'],
                    'message' => 'Please input a valid address.'
                ],
                'maxLength' => [
                    'rule' => ['maxLength', 100]
                ]
            ]);

        $validator
            ->add('second_address', [
                'validate_second_address' => [
                    'rule' => ['custom', '/^[a-z0-9, ]*$/i'],
                    'message' => 'Please input a valid address.'
                ],
                'maxLength' => [
                    'rule' => ['maxLength', 100]
                ]
            ]);

        $validator
            ->add('email', [
                'validate_email' => [
                    'rule' => 'email',
                    'message' => 'Please input a valid email address.'
                ]
            ]);
            
        // $validator
        //     ->add('website', [
        //         'validate_website' => [
        //             'rule' => ['custom', '/^[a-z0-9./\:]*$/i'],
        //             'message' => 'Please input a valid website.'
        //         ]
        //     ]);
            
//        $validator
//            ->add('contact_person', [
//                'maxLength' => [
//                    'maxLength' => ['maxLength', 50]
//                ],
//                'validate_contact_person' => [
//                    'rule' => ['custom', '/^[a-zA-Z ]*$/i'],
//                    'message' => 'Please input a valid name.'
//                ]
//            ]);

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
        $rules->add($rules->isUnique(['email']));

        return $rules;
    }
}
