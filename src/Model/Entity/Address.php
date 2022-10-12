<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Address Entity
 *
 * @property int $id
 * @property string|null $dbpedia_url
 * @property string|null $addressline
 * @property string|null $street
 * @property string|null $streetnumber
 * @property string|null $postalcode
 * @property string $city
 * @property int $nationalstate_id
 * @property \Cake\I18n\FrozenTime $created
 *
 * @property \App\Model\Entity\Nationalstate $nationalstate
 * @property \App\Model\Entity\Archive[] $archives
 * @property \App\Model\Entity\Letter[] $letter_from
 * @property \App\Model\Entity\Letter[] $letter_to
 */
class Address extends Entity {
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
        'addressline' => true,
        'street' => true,
        'streetnumber' => true,
        'postalcode' => true,
        'city' => true,
        'nationalstate_id' => true,
        'created' => true,
        'nationalstate' => true,
        'archives' => true,
        //'letter_from' => true,
     	//'letter_to' => true,
    ];
    
    /**
     * Virtual Field for display in select
     *
     * @return \Cake\ORM\Query
     */
    public function _getFullAddress() {
    	
    	$value = $this->city;
    	$value .= " (".$this->nationalstate->abbreviation.")";
    	if ($this->street != "") {
    		$value .= ", ".$this->street;
    	}
    	if ($this->streetnumber != "") {
    		if ($this->street == "") {
    			$value .= ",";
    		}
    		$value .= " ".$this->streetnumber;
    	}
    	if ($this->addressline != "") {
    		$value .= ", ".$this->addressline;
    	}
    	
    	return $value;
    	
    }
    
}
