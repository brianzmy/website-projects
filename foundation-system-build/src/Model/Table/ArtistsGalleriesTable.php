<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ArtistsGalleries Model
 *
 * @property \App\Model\Table\ArtistsTable|\Cake\ORM\Association\BelongsTo $Artists
 * @property \App\Model\Table\GalleriesTable|\Cake\ORM\Association\BelongsTo $Galleries
 *
 * @method \App\Model\Entity\ArtistsGallery get($primaryKey, $options = [])
 * @method \App\Model\Entity\ArtistsGallery newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\ArtistsGallery[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ArtistsGallery|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ArtistsGallery saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ArtistsGallery patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\ArtistsGallery[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\ArtistsGallery findOrCreate($search, callable $callback = null, $options = [])
 */
class ArtistsGalleriesTable extends Table
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

        $this->setTable('artists_galleries');
        $this->setDisplayField('artist_id');
        $this->setPrimaryKey(['artist_id', 'gallery_id']);

        $this->belongsTo('Artists', [
            'foreignKey' => 'artist_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Galleries', [
            'foreignKey' => 'gallery_id',
            'joinType' => 'INNER'
        ]);
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
        $rules->add($rules->existsIn(['gallery_id'], 'Galleries'));

        return $rules;
    }
}
