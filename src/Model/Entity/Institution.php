<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Institution Entity
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $dbpedia_url
 * @property \Cake\I18n\FrozenTime $created
 *
 * @property \App\Model\Entity\Receiver[] $receivers
 * @property \App\Model\Entity\Sender[] $senders
 */
class Institution extends Entity
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
        'dbpedia_url' => true,
        'created' => true,
        'receivers' => true,
        'senders' => true,
    ];
}
