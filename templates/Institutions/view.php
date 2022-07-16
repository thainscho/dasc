<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Institution $institution
 */
?>

<h3>
<?php echo $institution->name; ?><br />
</h3>

<dl class="row">

	<dt class="col-sm-2"><?php echo __("Name"); ?></dt>
	<dd class="col-sm-10">
	<?php
	if ($institution->name != "" && !is_null($institution->name)) {
		echo '<p>';
		echo $institution->name;
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
	if ($institution->dbpedia_url != "" && !is_null($institution->dbpedia_url)) {
		echo '<p>';
		echo $institution->dbpedia_url;
		echo '</p>';
	} else {
		echo '<p class="text-muted fst-italic">';
		echo __("Unknown");
		echo '</p>';
	}
	?>
	</dd>

</dl>


<h3>
<small>Sent correspondence</small>
</h3>

<?php

if (isset($institution->senders) && count($institution->senders) > 0) {

	echo '<ul>';
	foreach($institution->senders as $sender) {
		
		echo '<li>';
		echo $this->Html->link($sender->letter->detailed_info, ['controller' => 'letters', 'action' => 'view', $sender->letter_id]);
		echo '</li>';
		
	}
	echo '</ul>';
	
} else {
	
	echo '<p class="text-muted fst-italic">';
	echo __('No correspondence.');
	echo '</p>';

}
?>

<h3>
<small>Received correspondence</small>
</h3>

<?php

if (isset($institution->receivers) && count($institution->receivers) > 0) {
	
	echo '<ul>';
	foreach($institution->receivers as $receiver) {
		
		echo '<li>';
		echo $this->Html->link($receiver->letter->detailed_info, ['controller' => 'letters', 'action' => 'view', $receiver->letter_id]);
		echo '</li>';
		
	}
	echo '</ul>';
	
} else {
	
	echo '<p class="text-muted fst-italic">';
	echo __('No correspondence.');
	echo '</p>';
	
	
}

?>
