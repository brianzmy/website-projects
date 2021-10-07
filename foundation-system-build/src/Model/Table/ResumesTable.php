<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Resumes Model
 *
 * @property \App\Model\Table\ArtistsTable|\Cake\ORM\Association\BelongsTo $Artists
 * @property \App\Model\Table\ProjectsTable|\Cake\ORM\Association\HasMany $Projects
 *
 * @method \App\Model\Entity\Resumes get($primaryKey, $options = [])
 * @method \App\Model\Entity\Resumes newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Resumes[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Resumes|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Resumes patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Resumes[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Resumes findOrCreate($search, callable $callback = null, $options = [])
 */
class ResumesTable extends Table
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

        $this->setTable('resumes');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Artists', [
            'foreignKey' => 'artist_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('Projects', [
            'foreignKey' => 'resume_id'
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
            ->scalar('description')
            ->requirePresence('description', 'create')
            ->notEmpty('description');

        $validator
            ->scalar('experienceType')
            ->inList('experience', [
                'Architecture – external',
                'Architecture - internal/interiors',
                'Arts & Architecture - embedded façade treatment',
                'Arts & Architecture - glass',
                'Arts & Architecture - graphic application',
                'Arts & Architecture - internal spaces',
                'Arts & Architecture – intervention',
                'Arts & Architecture – lighting',
                'Arts & Architecture - lighting',
                'Public realm – bollards',
                'Public realm – bridges',
                'Public realm - external public spaces',
                'Public realm – plazas',
                'Public realm - railings & fences',
                'Public realm - hardplanting & flooring',
                'Public realm – retail',
                'Public realm - water features',
                'Public realm – textiles',
                'Public Realm - seating',
                'Public art',
                'Embedded art',
                'Environmental art',
                'Community art',
                'Art & Play',
                'Galleries',
                'Environmental / Sustainability / green initiatives',
                'Educational initiatives',
                'Arts in regeneration',
                'Socially Engaged Practice',
                'Regeneration',
                'Wayfinding / text',
                'Signage',
                'Pop-up',
                'Temporary (banners, building wraps, conceptual, hoardings, installations, lighting, projection, screens, signage, sound)',
                'Animation ',
                'Live events',
                'Festivals',
                'Community engagement',
                'Food / culinary',
                'Horticulture',
                'Other'
            ])
            ->requirePresence('experienceType', 'create')
            ->notEmpty('experienceType');
//
//        $validator
//            ->integer('id')
//            ->allowEmpty('id', 'create');

        $validator
            ->add('description', [
                'maxLength' => [
                    'rule' => ['maxLength', 3000]
                ]
            ]);

        $validator
            ->add('experienceType', [
                'maxLength' => [
                    'rule' => ['maxLength', 200]
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
        $rules->add($rules->existsIn(['artist_id'], 'Artists'));

        return $rules;
    }
}
