<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use function Sodium\add;

/**
 * Artists Model
 *
 * @property |\Cake\ORM\Association\BelongsTo $Agents
 * @property |\Cake\ORM\Association\HasMany $Resumes
 * @property |\Cake\ORM\Association\HasMany $Schedules
 * @property |\Cake\ORM\Association\BelongsToMany $Galleries
 * @property |\Cake\ORM\Association\BelongsToMany $Artworks
 *
 * @method \App\Model\Entity\Artist get($primaryKey, $options = [])
 * @method \App\Model\Entity\Artist newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Artist[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Artist|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Artist patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Artist[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Artist findOrCreate($search, callable $callback = null, $options = [])
 */
class ArtistsTable extends Table
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

        $this->setTable('artists');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->hasMany('Resumes', [
            'foreignKey' => 'artist_id'
        ]);
        $this->hasMany('Schedules', [
            'foreignKey' => 'artist_id'
        ]);
        $this->belongsToMany('Galleries', [
            'foreignKey' => 'artist_id',
            'targetForeignKey' => 'gallery_id',
            'joinTable' => 'artists_galleries'
        ]);
        $this->hasMany('Artworks', [
            'foreignKey' => 'artist_id',
            'targetForeignKey' => 'artwork_id',
//            'joinTable' => 'artworks_artists'
        ]);

        $this->hasOne('Agents', [
            'foreignKey' => 'artist_id',
        ]);

//        $this->setDisplayField('label');

    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */

    public function validationDefault(Validator $validator){
        $validator
            ->requirePresence([
                'name' => [
                    'mode' => 'create',
                    'message' => 'Please input your name.'
                ],
                'phone' => [
                    'mode' => 'create',
                    'message' => 'Please input your phone number.'
                ],
                'address' => [
                    'mode' => 'create',
                    'message' => 'Please input your current address.'
                ],
                'email' => [
                    'mode' => 'create',
                    'message' => 'Please input your email address.'
                ]
            ]);

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
                    'rule' => ['maxLength', 20]
                ],
                'validate_phone' => [
                    'rule' => ['custom', '/^[0-9()+ ]*$/i'],
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
            ->add('website', [
                'validate_website' => [
                    'rule' => ['custom', '/^[a-z0-9.]*$/i'],
                    'message' => 'Please input a valid website.'
                ]
            ]);

        $validator
            ->add('email', [
                'validate_email' => [
                    'rule' => 'email',
                    'allowEmpty' => false,
                    'message' => 'Please input a valid email address.'
                ]
            ]);

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
        $rules->add($rules->isUnique(['email'], 'This email is already in use.'));
//        $rules->add($rules->existsIn(['agent_id'], 'Agents'));

        return $rules;
    }
}
