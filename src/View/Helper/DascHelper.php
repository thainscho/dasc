<?php

namespace App\View\Helper;

use Cake\View\Helper;

class DascHelper extends Helper {

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
    
}
?>