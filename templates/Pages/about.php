<?php
/**
 * @var Array $this
 * @var Array $letters Letters object
 */
?>

<!-- <div class="index content"> -->


<div class="row headerDiv">
<h3>About DASC<br /><small>Digital Archival System for Correspondence</small></h3>
</div>


<div class="row">
    <div class="col-sm-8">
		<p>The Digital Archival System for Correspondence (DASC) is a software tool that allows to collect metadata from correspondence. It is intended to support researchers and archivists in their archival work. DASC makes it possible to digitally record the holdings of an archive but also allows to store correspondence from specific persons, topics or epochs across archive boundaries.</p>

		<p>Statistical queries can be performed on captured metadata. It is possible to find out between which correspondents a particularly intensive exchange took place and to generate overviews of how many letters were written in which time periods. Correspondence that has not been preserved can also be recorded in order to provide an overview of the correspondence of a person or a group of persons that is as complete as possible.</p>

		<p>DASC allows to generate lists of existing material and to generate inventory lists of documents that are normally not recorded as holdings of a library. Such lists can be used for comparison of archival collections or for archival inventory.</p>

		<br />
		<p>DASC is developed by Thomas Hainscho.</p>

	</div>
    <div class="col-sm-4">
<b>Recently added</b>

<?php
echo '<div class="list-group list-group-checkable gap-2 w-auto">';

foreach($letters as $letter) {

// 	$html = '<div class="d-flex w-100 justify-content-between" style="padding-top:5px; margin-bottom:15px;">
// 	<h6 class="mb-1">Karl Popper to Thomas Hainscho</h6>';
// 	$html .= '<p class="mb-1">Klaegnfurt, 12.3.2012</p></div>';

	
// 	echo $this->Html->link($html, ['controller' => 'letters', 'action' => 'index'], ['class' => 'list-group-item list-group-item-action', 'escape' => false]);

	$html = '<div class="list-group-item list-group-item-action rounded-3 py-3" style="border-top-width:1px">';
	
	$html .= $letter->sendersName;
	$html .= ' to ';
	$html .= $letter->receiversName;
	$html .= '<span class="d-block small opacity-50">';
	if ($letter->sentCity != "") {
		$html .=  $letter->sentCity;
	}
	if ($letter->sentDate != "") {
		if ($letter->sentCity != "") {
			$html .= ', ';
		}
		$html .=  $letter->sentDate;
	}
	
	$html .= '</span>
	</div>';
	
	echo $this->Html->link($html, ['controller' => 'letters', 'action' => 'view', $letter->id], ['class' => 'recent-addition list-group-item-action', 'escape' => false]);
	
}

echo '</div>';

?>

	</div>
</div>
<!-- </div> -->