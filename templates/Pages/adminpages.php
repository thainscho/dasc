<?php
/**
 * @var \App\View\AppView $this
 * @var int $archivesTotal Total number of archives
 * @var int $letterformatsTotal Total number of letterformats
 * @var int $languagesTotal Total number of languages
 * @var int $nationalstatesTotal Total number of nationalstates
 */
?>

<div class="letters index content">

<h3>Basic Content Data Administration</h3>
<p>On this page you find the forms  to configure the basic content data of your DASC instance.</p>


<?php

$linksArray = array();
$linksArray[] = array(
	'title' => 'Addresses',
	'controller' => 'addresses',
	'helptext' => 'All postal addresses assigned to different locations.',
	'additionalInformation' => 'Input: National state, street, city (incl. DBpedia URL).',
	'number' => $addressesTotal
);
$linksArray[] = array(
	'title' => 'Archives and other Locations of Correspondence',
	'controller' => 'archives',
	'helptext' => 'All archives and other places where correspondence is kept.',
	'additionalInformation' => 'Input: Name and address.',
	'number' => $archivesTotal
);
$linksArray[] = array(
	'title' => 'Correspondence Formats',
	'controller' => 'letterformats',
	'helptext' => 'All document types in which correspondence exists (letter, postcard, ...).',
	'additionalInformation' => 'Name and description',
	'number' => $letterformatsTotal
);
$linksArray[] = array(
	'title' => 'Languages',
	'controller' => 'languages',
	'helptext' => 'All languages in which the correspondence is written.',
	'additionalInformation' => 'Language name and ISO 639-1 code',
	'number' => $languagesTotal
);
$linksArray[] = array(
	'title' => 'National States',
	'controller' => 'nationalstates',
	'helptext' => 'All national states that are used in postal addresses.',
	'additionalInformation' => 'Name, abbreviation and DBpedia URL',
	'number' => $nationalstatesTotal
);


echo '<div class="list-group">';

foreach($linksArray as $data) {

	$html = '<div class="d-flex w-100 justify-content-between" style="padding-top:5px">
	<h6 class="mb-1">'.$data['title'].'</h6>
	<small>';
	if ($data['number'] == 1) {
		$html .= '1 entry';
	} else {
		$html .= $data['number'].' entries';
	}
	
	$html .= '</small></div>
	<p class="mb-1">'.$data['helptext'].'</p>';
	if ($data['additionalInformation'] != '') {
		$html .= "<small>".$data['additionalInformation']."</small>";
	}
	
	echo $this->Html->link($html, ['controller' => $data['controller'], 'action' => 'index'], ['class' => 'list-group-item list-group-item-action', 'escape' => false]);
	
}

echo '</div>';

?>

</div>