<?php

namespace App\View\Helper;

use Cake\View\Helper;

class DascHelper extends Helper {

	/**
	 * Returns the extended string for the writing style of a correspondence document.
	 * 
	 * @param string $writingStyle	options from the ENUM field in the database
	 * @return string
	 */
    public function getWritingStyle($writingStyle) {
    	
    	$writingStyles = array();
    	$writingStyles['EDIT'] = __("Edited text");
    	$writingStyles['MS'] = __("Manuscript");
    	$writingStyles['TS'] = __("Typescript");
    	$writingStyles['other'] = __("Other");
    	
    	if(array_key_exists($writingStyle, $writingStyles)) {
    		return $writingStyles[$writingStyle];
    	} else {
    		return "Unknown Writing Style";
    	}

    }
    
    /**
     * Returns the extended string for a person's gender
     * 
     * @param string $gender	options from the ENUM field in the database
     * @return string
     */
    public function getGender($gender) {
    	
    	$genders = array();
    	$genders['m'] = __("Male");
    	$genders['f'] = __("Female");
    	$genders['o'] = __("Other");
    	
    	if(array_key_exists($gender, $genders)) {
    		return $genders[$gender];
    	} else {
    		return __("Unknown");
    	}
    	
    }
    
}
?>