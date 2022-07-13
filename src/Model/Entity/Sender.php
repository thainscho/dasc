<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Sender Entity
 *
 * @property int $id
 * @property int $letter_id
 * @property int|null $person_id
 * @property int|null $institution_id
 *
 * @property \App\Model\Entity\Letter $letter
 * @property \App\Model\Entity\Person $person
 * @property \App\Model\Entity\Institution $institution
 */
class Sender extends Entity
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
        'letter_id' => true,
        'person_id' => true,
        'institution_id' => true,
        'letter' => true,
        'person' => true,
        'institution' => true,
    ];
    
    /**
     * Virtual Field for displaying the sender (either a person or an institution)
     *
     * @return \Cake\ORM\Query
     */
    public function _getSenderName() {
    	
    	$name = "";
    	if (is_null($this->person_id)) {
    		$name = $this->institution->name;
    	} else {
    		$name = $this->person->firstname." ".$this->person->lastname;
    	}
    	
    	return $name;
    	
    }
    
    
    /**
     * Virtual Field for displaying the sender (either a person or an institution) with details
     *
     * @return \Cake\ORM\Query
     */
    public function _getSenderNameWithDetail() {
    	
    	$name = "";
    	if (is_null($this->person_id)) {
    		$name = $this->institution->name;
    	} else {
    		$name = $this->person->firstname." ".strtoupper($this->person->lastname);
    		$birthYearGiven = false;
    		if ($this->person->yearofbirth != "" &&
				$this->person->yearofbirth != "0000") {
				$name .= " (".$this->person->yearofbirth;
				$birthYearGiven = true;
    		}
    		if ($this->person->yearofbirthUpper != "" &&
    			$this->person->yearofbirthUpper != "0000") {
				if ($this->person->yearofbirth != "" && $this->person->yearofbirth != "0000") { $name .= "/"; }
    			$name .= $this->person->yearofbirthUpper;
    			$birthYearGiven = true;
    		}
    		if ($birthYearGiven) {
    			$name .= "–";
    		}
    		if ($this->person->yearofdeath != "" &&
    			$this->person->yearofdeath != "0000") {
    			$name .= $this->person->yearofdeath;
    		}
    		if ($this->person->yearofdeathUpper != "" &&
    			$this->person->yearofdeathUpper != "0000") {
    			if ($this->person->yearofdeath != "" && $this->person->yearofdeath != "0000") { $name .= "/"; }
    			$name .= $this->person->yearofdeathUpper;
    		}
    		$name .= ")";
    	}
    	
    	return $name;
    	
    } 
    
}
