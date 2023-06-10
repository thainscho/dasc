<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Person $person
 */
?>

<h3>
<?php echo $person->fullName; ?><br />
<small>
	<?php
	
		echo ucfirst($person->born); 
		
		$died = $person->died;
		if ($died != "") {
			echo ", ".$died;
		}
		
	?>
</small>
</h3>


<div class="row">

	<div class="col-sm-5">
	
	<dl style="background:papayawhip; border:solid 1px brown; padding:30px; width:100%;">
	  <dt><?php echo __("First name"); ?></dt>
	  <dd>
	  <?php
	  	if ($person->firstname != "" && !is_null($person->firstname)) {
			echo $person->firstname;
		} else {
			echo '<span class="text-muted fst-italic">';
			echo __("Unknown");
			echo '</span>';
		}
		?>
		</dd>
		<dt><?php echo __("Last name"); ?></dt>
		<dd>
		<?php
			if ($person->lastname != "" && !is_null($person->lastname)) {
				echo $person->lastname;
			} else {
				echo '<span class="text-muted fst-italic">';
				echo __("Unknown");
				echo '</span>';
			}
		?>
		</dd>
		<dt><?php echo __("Date of birth") ?></dt>
		<dd>
		<?php
		if (is_null($person->dayofbirth) && is_null($person->monthofbirth) && (is_null($person->yearofbirth) || $person->yearofbirth == "0000")) {
			echo '<span class="text-muted fst-italic">';
			echo __("Unknown");
			echo '</span>';
		} else {
			echo $person->dateOfBirth;
		}
		?>
		</dd>
		<dt><?php echo __("Date of death") ?></dt>
		<dd>
		<?php
		if (is_null($person->dayofdeath) && is_null($person->monthofdeath) && (is_null($person->yearofdeath) || $person->yearofdeath == "0000")) {
			echo '<span class="text-muted fst-italic">';
			echo __("Unknown");
			echo '</span>';
		} else {
			echo $person->dateOfDeath;
		}
		?>
		</dd>
		<dt>Gender</dt>
		<dd><?php
			echo $this->Dasc->getGender($person->gender);
		?>
		</dd>
		<dt>DBpedia URL</dt>
		<dd>
		<?php
		if ($person->dbpedia_url != "" && !is_null($person->dbpedia_url)) {
				echo $person->dbpedia_url;
			} else {
				echo '<span class="text-muted fst-italic">';
				echo __("Unknown");
				echo '</span>';
			}
		?>
		</dd>
	</dl>
	
	</div>
	
	
	<div class="col-sm-7"">
	
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
			
			echo '<p class="text-muted fst-italic">';
			echo __('No correspondence');
			echo '</p>';
			
		
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
			
			echo '<p class="text-muted fst-italic">';
			echo __('No correspondence');
			echo '</p>';
			
			
		}
		
	?>
	
	</div>
	
</div>

