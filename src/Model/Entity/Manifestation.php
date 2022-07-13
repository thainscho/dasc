<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Manifestation Entity
 *
 * @property int $id
 * @property int $letter_id
 * @property int|null $pages
 * @property int|null $includingEnvelope
 * @property int|null $draft
 * @property int|null $isSent
 * @property string|null $writingstyle
 * @property string|null $writingstyle_other
 * @property int|null $archive_id
 * @property string|null $archive_info
 * @property \Cake\I18n\FrozenTime $created
 *
 * @property \App\Model\Entity\Letter $letter
 * @property \App\Model\Entity\Archive $archive
 * @property \App\Model\Entity\Annotation[] $annotations
 * @property \App\Model\Entity\Signature[] $signatures
 * @property \App\Model\Entity\Language[] $languages
 */
class Manifestation extends Entity
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
        'pages' => true,
        'includingEnvelope' => true,
        'draft' => true,
        'isSent' => true,
        'writingstyle' => true,
        'writingstyle_other' => true,
        'archive_id' => true,
        'archive_info' => true,
        'created' => true,
        'letter' => true,
        'archive' => true,
        'annotations' => true,
        'signatures' => true,
        'languages' => true,
    ];
    
    
    /**
     * Returns the IDs of all receiver records
     *
     * @return mixed[]|number[]
     */
    public function getLanguagesIds() {
    	
    	$returnArray = array();
    	$languages = $this->languages;
    	
    	foreach($languages as $language) {
    		$returnArray[] = $language->id;
    	}
    	return $returnArray;
    	
    }
}
