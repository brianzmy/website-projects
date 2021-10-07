<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\ORM\Rule\isUnique;

/**
 * Users Model
 *
 * @property \App\Model\Table\ArtistsTable|\Cake\ORM\Association\BelongsTo $Artists
 *
 * @method \App\Model\Entity\User get($primaryKey, $options = [])
 * @method \App\Model\Entity\User newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\User[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\User|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\User patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\User[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\User findOrCreate($search, callable $callback = null, $options = [])
 */
class UsersTable extends Table
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

        $this->setTable('users');
        $this->setDisplayField('user_ID');
        $this->setPrimaryKey('user_ID');

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
        $validator
            ->integer('user_ID')
            ->allowEmpty('user_ID', 'create');

        $validator
            ->scalar('username')
//            ->maxLength('username', 30)
            ->requirePresence('username', 'create')
            ->notEmpty('username', 'This field cannot be left empty.');

        $validator
            ->scalar('password')
            ->requirePresence('password', 'create')
            ->notEmpty('password', 'This field cannot be left empty.');

        $validator
            ->scalar('Email')
            ->requirePresence('Email', 'create')
            ->notEmpty('Email', 'This field cannot be left empty.');

        $validator
            ->scalar('type')
            ->inList('role', ['Admin','Artist','Gallery','Client'])
            ->requirePresence('type', 'create')
            ->notEmpty('type');

        $validator
            ->scalar('archived')
            ->inList('archived', ['No','Yes'])
            ->requirePresence('archived', 'create')
            ->notEmpty('archived');

        $validator
            ->add('Email', [
                'validate_email' => [
                    'rule' => 'email',
                    'message' => 'Please input a valid email address.'
                ],
                'maxLength' => [
                    'rule' => ['maxLength', 50],
                    'message' => 'The email is too long.'
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
        $rules->add($rules->isUnique(
            ['username'], 'This username is already in use.'
        ));
        $rules->add($rules->isUnique(['user_ID']));
        $rules->add($rules->isUnique(
            ['Email'],'This email is already in use.'
        ));
        $rules->add($rules->existsIn(['artist_id'], 'Artists'));

        return $rules;
    }
}
