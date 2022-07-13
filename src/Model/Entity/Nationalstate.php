<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Nationalstate Entity
 *
 * @property int $id
 * @property string $name
 * @property string $abbreviation
 * @property string $dbpedia_url
 * @property \App\Model\Entity\Address[] $addresses
 */
class Nationalstate extends Entity
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
        'abbreviation' => true,
        'addresses' => true,
    ];
    
    public function getAbbreviation() {
    	return $this->abbreviation;
    }
}
