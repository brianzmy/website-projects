<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Project Entity
 *
 * @property string $type
 * @property string $name
 * @property string $description
 * @property int $id
 * @property int $resume_id
 *
 * @property \App\Model\Entity\Resumes $resume
 * @property \App\Model\Entity\Artwork[] $artworks
 */
class Project extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'type' => true,
        'name' => true,
        'description' => true,
        'location' => true,
        'budget' => true,
        'client' => true,
        'resume_id' => true,
        'resume' => true,
        'artworks' => true
    ];
}
