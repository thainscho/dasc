<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Person Entity
 *
 * @property int $id
 * @property string|null $dbpedia_url
 * @property string|null $firstname
 * @property string|null $lastname
 * @property string|null $gender
 * @property int|null $dayofbirth
 * @property int|null $monthofbirth
 * @property string|null $yearofbirth
 * @property string|null $yearofbirthUpper
 * @property int|null $monthofdeath
 * @property int|null $dayofdeath
 * @property string|null $yearofdeath
 * @property string|null $yearofdeathUpper
 * @property string|null $note
 * @property \Cake\I18n\FrozenTime $created
 *
 * @property \App\Model\Entity\Receiver[] $receivers
 * @property \App\Model\Entity\Sender[] $senders
 */
class Person extends Entity
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
        'dbpedia_url' => true,
        'firstname' => true,
        'lastname' => true,
        'gender' => true,
        'dayofbirth' => true,
        'monthofbirth' => true,
        'yearofbirth' => true,
        'yearofbirthUpper' => true,
        'monthofdeath' => true,
        'dayofdeath' => true,
        'yearofdeath' => true,
        'yearofdeathUpper' => true,
        'note' => true,
        'created' => true,
        'receivers' => true,
        'senders' => true,
    ];
    
    
  
    /**
     * Virtual Field for displaying the receiver (either a person or an institution)
     *
     * @return \Cake\ORM\Query
     */
    public function getLifeDates() {
    	
    	return "test";
    	
    }
    
}
