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
     * Virtual field for displaying the complete name
     *
     * @return \Cake\ORM\Query
     */
    public function _getFullName() {
    	
    	$returnValue = "";
    	if ($this->firstname != "" && !is_null($this->firstname)) {
    		$returnValue .= $this->firstname." ";
    	}
    	if ($this->lastname != "" && !is_null($this->lastname)) {
    		$returnValue .= $this->lastname;
    	}
    	return $returnValue;
    	
    }
    
    /**
     * Virtual field for displaying the date (year) of birth
     *
     * @return \Cake\ORM\Query
     */
    public function _getBorn() {
    	
    	$returnValue = "";
    	if ($this->yearofbirth != "0000" && !is_null($this->yearofbirth)) {
    		$returnValue .= __("born ");
    		$returnValue .= $this->yearofbirth;
    		if ($this->yearofbirthUpper != "0000" && !is_null($this->yearofbirthUpper)) {
    			$returnValue .= " or ".$this->yearofbirthUpper;
    		}
    	}
    	
    	return $returnValue;
    	
    }
    
    /**
     * Virtual field for displaying the date (year) of death
     *
     * @return \Cake\ORM\Query
     */
    public function _getDied() {
    	
    	$returnValue = "";
    	if ($this->yearofdeath != "0000" && !is_null($this->yearofdeath)) {
    		$returnValue .= __("died ");
    		$returnValue .= $this->yearofdeath;
    		if ($this->yearofdeathUpper != "0000" && !is_null($this->yearofdeathUpper)) {
    			$returnValue .= " or ".$this->yearofdeathUpper;
    		}
    	}
    	
    	return $returnValue;
    	
    }
    
    /**
     * Virtual field for displaying the date of birth
     * 
     * @return string|NULL
     */
    public function _getDateOfBirth() {
    	
    	$returnValue = "";
    	if ($this->dayofbirth != "" && !is_null($this->dayofbirth)) {
    		$returnValue .= $this->dayofbirth;
    	} else {
    		$returnValue .= "?";
    	}
    	$returnValue .= ".";
    	if ($this->monthofbirth != "" && !is_null($this->monthofbirth)) {
    		$returnValue .= $this->monthofbirth;
    	} else {
    		$returnValue .= "?";
    	}
    	$returnValue .= ".";
    	if ($this->yearofbirth != "0000" && !is_null($this->yearofbirth)) {
    		$returnValue .= $this->yearofbirth;
    	} else {
    		$returnValue .= "?";
    	}
    	return $returnValue;
    	
    }
    
    /**
     * Virtual field for displaying the date of death
     *
     * @return string|NULL
     */
    public function _getDateOfDeath() {
    	
    	$returnValue = "";
    	if ($this->dayofdeath != "" && !is_null($this->dayofdeath) &&
    		$this->monthofdeath != "" && !is_null($this->monthofdeath) &&
    		$this->yearofdeath != "0000" && !is_null($this->yearofdeath)) {
    			$returnValue = __("Unknown");
    		}
    			
    	$returnValue = "";
    	if ($this->dayofdeath != "" && !is_null($this->dayofdeath)) {
    		$returnValue .= $this->dayofdeath;
    	} else {
    		$returnValue .= "?";
    	}
    	$returnValue .= ".";
    	if ($this->monthofdeath != "" && !is_null($this->monthofdeath)) {
    		$returnValue .= $this->monthofdeath;
    	} else {
    		$returnValue .= "?";
    	}
    	$returnValue .= ".";
    	if ($this->yearofdeath != "0000" && !is_null($this->yearofdeath)) {
    		$returnValue .= $this->yearofdeath;
    	} else {
    		$returnValue .= "?";
    	}
    	return $returnValue;
    	
    }
    
  
    /**
     * Virtual field for displaying the receiver (either a person or an institution)
     *
     * @return \Cake\ORM\Query
     */
    public function getLifeDates() {
    	
    	$returnValue = "";
    	if ($this->yearofbirth != "0000" && !is_null($this->yearofbirth)) {
    		$returnValue .= $this->yearofbirth;
    		if ($this->yearofbirthUpper != "0000" && !is_null($this->yearofbirthUpper)) {
    			$returnValue .= "/".$this->yearofbirthUpper;
    		}
    		$returnValue .= "–";
    	}
    	if ($this->yearofdeath != "0000" && !is_null($this->yearofdeath)) {
    		if ($this->yearofbirth == "0000"|| is_null($this->yearofbirth)) {
    			$returnValue .= "–";
    		}
    		$returnValue .= $this->yearofdeath;
    		if ($this->yearofdeathUpper != "0000" && !is_null($this->yearofdeathUpper)) {
    			$returnValue .= "/".$this->yearofdeathUpper;
    		}
    	}
    	if ($returnValue == "") {
    		$returnValue = __("Unknown");
    	}
    	return $returnValue;
    	
    }
    
}
