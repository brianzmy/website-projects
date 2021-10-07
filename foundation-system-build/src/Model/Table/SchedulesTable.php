<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Schedules Model
 *
 * @property \App\Model\Table\ArtistsTable|\Cake\ORM\Association\BelongsTo $Artists
 *
 * @method \App\Model\Entity\Schedules get($primaryKey, $options = [])
 * @method \App\Model\Entity\Schedules newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Schedules[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Schedules|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Schedules patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Schedules[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Schedules findOrCreate($search, callable $callback = null, $options = [])
 */
class SchedulesTable extends Table
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

        $this->setTable('Schedules');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Artists', [
            'foreignKey' => 'artist_id',
            'joinType' => 'INNER'
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
            ->date('startDate')
            ->requirePresence('startDate', 'create')
            ->notEmpty('startDate');

        $validator
            ->date('endDate')
            ->requirePresence('endDate', 'create')
            ->notEmpty('endDate');

        $validator
            ->scalar('location')
            ->maxLength('location', 50)
            ->requirePresence('location', 'create')
            ->notEmpty('location');

        $validator
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->add('location', [
                    'maxLength' => [
                        'rule' => ['maxLength', 50]
                    ],
                    'validate_location' => [
                        'rule' => ['custom', '/^[a-zA-Z0-9 ]*$/i'],
                        'message' => 'Please input a valid name.'
                    ]
                ]
            );

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
        $rules->add($rules->existsIn(['artist_id'], 'Artists'));

        return $rules;
    }
}
