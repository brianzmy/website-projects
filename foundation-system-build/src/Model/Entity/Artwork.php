<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Artwork Entity
 *
 * @property int $id
 * @property string $title
 * @property int $year
 * @property string $location
 * @property string $medium
 * @property string $style
 * @property int $project_id
 * @property int $gallery_id
 *
 * @property \App\Model\Entity\Project $project
 * @property \App\Model\Entity\Gallery $gallery
 * @property \App\Model\Entity\Artist[] $artists
 */
class Artwork extends Entity
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
        'title' => true,
        'year' => true,
        'location' => true,
        'medium' => true,
        'style' => true,
        'project_id' => true,
        'gallery_id' => true,
        'project' => true,
        'gallery' => true,
        'artists' => true,
        'artwork_img'=>true,
        'artist_id' => true,
        'time'=> true,
    ];
}
