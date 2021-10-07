<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Agents Model
 *
 * @property \App\Model\Table\ArtistsTable|\Cake\ORM\Association\HasMany $Artists
 *
 * @method \App\Model\Entity\Agent get($primaryKey, $options = [])
 * @method \App\Model\Entity\Agent newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Agent[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Agent|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Agent patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Agent[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Agent findOrCreate($search, callable $callback = null, $options = [])
 */
class AgentsTable extends Table
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

        $this->setTable('agents');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->belongsTo('Artists', [
            'foreignKey' => 'artist_id'
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
//        $validator
//            ->integer('id')
//            ->allowEmpty('id', 'create');
//
//        $validator
//            ->scalar('name')
//            ->maxLength('name', 50)
//            ->requirePresence('name', 'create')
//            ->notEmpty('name');
//
//        $validator
//            ->email('email')
//            ->requirePresence('email', 'create')
//            ->notEmpty('email');
//
//        $validator
//            ->scalar('phone')
//            ->maxLength('phone', 50)
//            ->requirePresence('phone', 'create')
//            ->notEmpty('phone');
//
//        $validator
//            ->scalar('website')
//            ->maxLength('website', 70)
//            ->allowEmpty('website');



        $validator
            ->requirePresence([
                'name' => [
                    'mode' => 'create',
                    'message' => "Please input your agent's name."
                ],
                'email' => [
                    'mode' => 'create',
                    'message' => "Please input your agent's email address."
                ],
                'phone' => [
                    'mode' => 'create',
                    'message' => "Please input your agent's current phone number."
                ],
                'website' => [
                    'mode' => 'create',
                    'message' => "Please input your agent's website."
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
            ->add('email', [
                'validate_email' => [
                    'rule' => 'email',
                    'message' => 'Please input a valid email address.'
                ]
            ]);
            
        $validator
            ->add('website', [
                'validate_website' => [
                    'rule' => ['custom', '/^[a-z0-9.]*$/i'],
                    'message' => 'Please input a valid website.'
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
        $rules->add($rules->isUnique(['email']));

        return $rules;
    }
}
