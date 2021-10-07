<?php
/**
 * Created by PhpStorm.
 * User: Dylan
 * Date: 14/05/2019
 * Time: 4:20 PM
 */

namespace App\Model\Entity;


use Cake\ORM\Entity;

/**
 * ArtistsGallery Entity
 *
 * @property int $artist_id
 * @property int $artwork_id
 *
 * @property \App\Model\Entity\Artists $artists
 * @property \App\Model\Entity\Artwork $artwork
 */
class ArtworksArtists extends Entity
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
        'artist' => true,
        'artwork' => true
    ];
}