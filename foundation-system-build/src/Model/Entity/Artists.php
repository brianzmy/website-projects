<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Artists Entity
 *
 * @property int $id
 * @property string $artistName
 * @property int $artistPhone
 * @property int $artistAddress
 * @property int $artistEmail
 * @property int $artistWebsite
 * @property string $artistOrigin
 * @property string $artistBudget
 */
class Artists extends Entity
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
    protected $primaryKey = ['id'];

    protected $_accessible = [
        'artistName' => true,
        'artistPhone' => true,
        'artistAddress' => true,
        'artistEmail' => true,
        'artistWebsite' => true,
        'artistOrigin' => true,
        'artistIndigenous' => true
    ];
//    protected function _getLabel()
//    {
//        return $this->_properties['name'] . ' ' . $this->_properties['website'].''. $this->_properties['origin']
//            . ' / ' . __('Artist ID %s', $this->_properties['artists_id']);
//    }
}
