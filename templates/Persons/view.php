<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Person $person
 */
?>

<h3>
<?php echo $person->fullName; ?><br />
<small>
	<?php echo ucfirst($person->born); ?>
	<?php
	$died = $person->died;
	if ($died != "") {
		echo ", ".$died;
	}
	?>
</small>
</h3>

<dl class="row">
	<dt class="col-sm-2"><?php echo __("First name"); ?></dt>
	<dd class="col-sm-10">
	<?php
	if ($person->firstname != "" && !is_null($person->firstname)) {
		echo '<p>';
		echo $person->firstname;
		echo '</p>';
	} else {
		echo '<p class="text-muted fst-italic">';
		echo __("Unknown");
		echo '</p>';
	}
	?>
	</dd>
	
	<dt class="col-sm-2"><?php echo __("Last name"); ?></dt>
	<dd class="col-sm-10">
	<?php
	if ($person->lastname != "" && !is_null($person->lastname)) {
		echo '<p>';
		echo $person->lastname;
		echo '</p>';
	} else {
		echo '<p class="text-muted fst-italic">';
		echo __("Unknown");
		echo '</p>';
	}
	?>
	</dd>
	
	<dt class="col-sm-2">DBpedia URL</dt>
	<dd class="col-sm-10">
	<?php
	if ($person->dbpedia_url != "" && !is_null($person->dbpedia_url)) {
		echo '<p>';
		echo $person->dbpedia_url;
		echo '</p>';
	} else {
		echo '<p class="text-muted fst-italic">';
		echo __("Unknown");
		echo '</p>';
	}
	?>
	</dd>
	
	<dt class="col-sm-2">Gender</dt>
	<dd class="col-sm-10">
	<p>
	<?php
	echo $this->Dasc->getGender($person->gender);
	?>
	</p>
	</dd>
	
	<dt class="col-sm-2"><?php echo __("Date of birth") ?></dt>
	<dd class="col-sm-10">
	<?php
	if (is_null($person->dayofbirth) && is_null($person->monthofbirth) && (is_null($person->yearofbirth) || $person->yearofbirth == "0000")) {
		echo '<p class="text-muted fst-italic">';
		echo __("Unknown");
		echo '</p>';
	} else {
		echo '<p>';
		echo $person->dateOfBirth;
		echo '</p>';
	}
	?>
	</dd>
	
	<dt class="col-sm-2"><?php echo __("Date of death") ?></dt>
	<dd class="col-sm-10">
	<?php
	if (is_null($person->dayofdeath) && is_null($person->monthofdeath) && (is_null($person->yearofdeath) || $person->yearofdeath == "0000")) {
		echo '<p class="text-muted fst-italic">';
		echo __("Unknown");
		echo '</p>';
	} else {
		echo '<p>';
		echo $person->dateOfDeath;
		echo '</p>';
	}
	?>
	</dd>
	
	
</dl>



<h3>
<small>Sent correspondence</small>
</h3>

<?php

if (isset($person->senders) && count($person->senders) > 0) {

	echo '<ul>';
	foreach($person->senders as $sender) {
		
		echo '<li>';
		echo $this->Html->link($sender->letter->detailed_info, ['controller' => 'letters', 'action' => 'view', $sender->letter_id]);
		echo '</li>';
		
	}
	echo '</ul>';
	
} else {
	
	echo __('No correspondence.');

}
?>

<h3>
<small>Received correspondence</small>
</h3>

<?php

if (isset($person->receivers) && count($person->receivers) > 0) {
	
	echo '<ul>';
	foreach($person->receivers as $receiver) {
		
		echo '<li>';
		echo $this->Html->link($receiver->letter->detailed_info, ['controller' => 'letters', 'action' => 'view', $receiver->letter_id]);
		echo '</li>';
		
	}
	echo '</ul>';
	
} else {
	
	echo __('No correspondence.');
	
}


?>