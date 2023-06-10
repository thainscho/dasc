<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;
use Cake\ORM\Locator\LocatorAwareTrait;

/**
 * Letter Entity
 *
 * @property int $id
 * @property int|null $letterdate_day
 * @property int|null $letterdate_month
 * @property string|null $letterdate_year
 * @property int|null $datemin_day
 * @property int|null $datemin_month
 * @property string|null $datemin_year
 * @property int|null $letterdatecorrected_day
 * @property int|null $letterdatecorrected_month
 * @property string|null $letterdatecorrected_year
 * @property int|null $datemax_day
 * @property int|null $datemax_month
 * @property string|null $datemax_year
 * @property int $letterformat_id
 * @property int|null $address_from_id
 * @property int|null $address_from_assumed
 * @property int|null $address_to_id
 * @property int|null $address_to_assumed
 * @property string|null $note
 * @property \Cake\I18n\FrozenTime $created
 *
 * @property \App\Model\Entity\Letterformat $letterformat
 * @property \App\Model\Entity\Address $address
 * @property \App\Model\Entity\Attachment[] $attachments
 * @property \App\Model\Entity\Manifestation[] $manifestations
 * @property \App\Model\Entity\Receiver[] $receivers
 * @property \App\Model\Entity\Sender[] $senders
 */
class Letter extends Entity
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
        'letterdate_day' => true,
        'letterdate_month' => true,
        'letterdate_year' => true,
        'datemin_day' => true,
        'datemin_month' => true,
        'datemin_year' => true,
        'letterdatecorrected_day' => true,
        'letterdatecorrected_month' => true,
        'letterdatecorrected_year' => true,
        'datemax_day' => true,
        'datemax_month' => true,
        'datemax_year' => true,
        'letterformat_id' => true,
        'address_from_id' => true,
        'address_from_assumed' => true,
        'address_to_id' => true,
        'address_to_assumed' => true,
        'note' => true,
        'created' => true,
        'letterformat' => true,
        'address' => true,
        'attachments' => true,
        'manifestations' => true,
        'receivers' => true,
        'senders' => true,
    ];
    
    /**
     * Virtual Field for letter display
     *
     * @return \Cake\ORM\Query
     */
    public function _getDetailedInfo() {
    	
    	//Letter from Karl Popper to David Miller. Klagenfurt, 20.3.2013 [stated as 12.2.201]
    	
    	$value = "Letter from Karl Popper to David Miller. Klagenfurt, 20.3.2013 [stated as 12.2.2012]";
    	
    	
    	$value = $this->letterformat->name." from ";
    	$value .= $this->_getSendersName();
    	$value .= " to ";
    	$receivers = $this->receivers;
    	$value .= $receivers[0]->receiver_name;
    	if (count($receivers) > 1) {
    		$value .= " et al.";
    	} else {
    		$value .= ".";
    	}
    	$value .= " ";
    	
    	$city = $this->_getSentCity();
    	if ($city != "") {
	    	$value .= $city.", ";
    	}
    	
    	$value .= $this->_getSentDate();
    	
    	return $value;
    	
    }
    
    /**
     * Return the name of the sender(s)
     *
     * @return string
     */
    public function _getSendersName() {
    	
    	$value = "";
    	$senders = $this->senders;
    	$value .= $senders[0]->sender_name;
    	if (count($senders) > 1) {
    		$value .= " et al.";
    	}
    	return $value;
    	
    }
    
    public function _getSentDate() {
    	
    	
    	$value = "";
    	
    	if (!is_null($this->letterdate_day) || !is_null($this->letterdate_month) || !is_null($this->letterdate_year)) {
    		$value .=  $this->letterdate_day.'.'.$this->letterdate_month.'.'.$this->letterdate_year;
    	}
    	if (!is_null($this->letterdatecorrected_day ) || !is_null($this->letterdatecorrected_month) || !is_null($this->letterdatecorrected_year)) {
    		$value .=  ' [correct: '.$this->letterdatecorrected_day.'.'.$this->letterdatecorrected_month.'.'.$this->letterdatecorrected_year.']';
    	}
    	
    	if ((!is_null($this->datemin_day) || !is_null($this->datemin_month) || !is_null($this->datemin_year)) &&
    			(!is_null($this->datemax_day) || !is_null($this->datemax_month) || !is_null($this->datemax_year))) {
    				$value .=  'between '.$this->datemin_day.'.'.$this->datemin_month.'.'.$this->datemin_year;
    				$value .=  ' and '.$this->datemax_day.'.'.$this->datemax_month.'.'.$this->datemax_year;
    			}
    	
    	/*$value = "";
    	if (!is_null($this->letterdate_day) && !is_null($this->letterdate_month) && !is_null($this->letterdate_year)) {
    		if (is_null($this->letterdate_day)) {
    			$value .= "?.";
    		} else {
    			$value .= $this->letterdate_day.".";
    		}
    		if (is_null($this->letterdate_month)) {
    			$value .= "?.";
    		} else {
    			$value .= $this->letterdate_month.".";
    		}
    		if (is_null($this->letterdate_year)) {
    			$value .= "?";
    		} else {
    			$value .= $this->letterdate_year;
    		}
    	}
    	
    	if (!is_null($this->letterdatecorrected_day) && !is_null($this->letterdatecorrected_month) && !is_null($this->letterdatecorrected_year)) {
    		$value .= " [correct: ";
    		if (is_null($this->letterdatecorrected_day)) {
    			$value .= "?.";
    		} else {
    			$value .= $this->letterdatecorrected_day.".";
    		}
    		if (is_null($this->letterdatecorrected_month)) {
    			$value .= "?.";
    		} else {
    			$value .= $this->letterdatecorrected_month.".";
    		}
    		if (is_null($this->letterdatecorrected_year)) {
    			$value .= "?";
    		} else {
    			$value .= $this->letterdatecorrected_year;
    		}
    		$value .= "]";
    	}
    	*/
    	return $value;
    	
    }
    
    /**
     * Returns the name of the city where the letter was sent from
     * 
     * @return string
     */
    public function _getSentCity() {
    	
    	$returnValue = "";
    	
    	if (!is_null($this->address_from)) {
    		$returnValue = $this->address_from->city;
    	}
    	
    	return $returnValue;
    	
    }
    
    /**
     * Returns the full address from where the letter was sent
     *
     * @return string
     */
    public function _getFromAddressFull() {
    	
    	return $this->getFullAddress("from");
    	
    }
    
    
    /**
     * Returns the full address to where the letter was sent to
     *
     * @return string
     */
    public function _getToAddressFull() {
    	
    	return $this->getFullAddress("to");
    	
    }
    
    /**
     * Private function that returns a full address.
     * This function is only called from the App\Model\Entity\Letter
     * 
     * @param string $mode "from" or "two"
     * @return string
     */
    private function getFullAddress($mode = "from") {
    	
    	$var = NULL;
    	if ($mode == "from") {
    		$var = $this->address_from;
    	} else {
    		$var = $this->address_to;
    	}
    	
    	$returnValue = "";
    	
    	if (!is_null($var) && $var->street != "") {
    		$returnValue .= $var->street;
    		if ( $var->streetnumber != "") {
    			$returnValue .= " ".$var->streetnumber;
    		}
    	}
    	if (!is_null($var) && $var->postalcode != "") {
    		if ($var->street != "" ) {
    			$returnValue .= ", ";
    		}
    		$returnValue .= $var->postalcode;
    	}
    	if (!is_null($var) && $var->city != "") {
    		if ( $var->postalcode != "") {
    			$returnValue .= " ";
    		}
    		$returnValue .= $var->city;
    	}

    	if (isset($var->nationalstate) && $var->nationalstate->abbreviation != "") {
	    	$returnValue .= ' ('.$var->nationalstate->abbreviation.')';
    	}
    	
    	return $returnValue;
    	
    }
    
    
    /**
     * Returns the name of the receiver(s)
     *
     * @return string
     */
    public function _getReceiversName() {
    	
    	$value = "";
    	$receivers = $this->receivers;
    	$value .= $receivers[0]->receiver_name;
    	if (count($receivers) > 1) {
    		$value .= " et al.";
    	}
    	return $value;
    	
    }
    
    /**
     * Returns the IDs of all sender records
     *
     * @return mixed[]|number[]
     */
    public function getSenderIds() {
    	
    	$returnArray = array();
    	$senders = $this->senders;
    	
    	foreach($senders as $sender) {
    		$returnArray[] = $sender->id;
    	}
    	return $returnArray;
    	
    }
    
    /**
     * Returns the IDs of all receiver records
     *
     * @return mixed[]|number[]
     */
    public function getReceiverIds() {
    	
    	$returnArray = array();
    	$receivers = $this->receivers;
    	
    	foreach($receivers as $receiver) {
    		$returnArray[] = $receiver->id;
    	}
    	return $returnArray;
    	
    }
    
}
