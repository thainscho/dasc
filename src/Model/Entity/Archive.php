<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Archive Entity
 *
 * @property int $id
 * @property string|null $name
 * @property int|null $address_id
 * @property string|null $website
 *
 * @property \App\Model\Entity\Address $address
 * @property \App\Model\Entity\Manifestation[] $manifestations
 */
class Archive extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array<string, bool>
     */
    protected $_accessible = [
        'name' => true,
        'address_id' => true,
        'website' => true,
        'address' => true,
        'manifestations' => true,
    ];
}
