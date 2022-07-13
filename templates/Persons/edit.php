<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Person $person
 */
?>

<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h3 class="heading"><?= __('Edit Person: '); echo $person->firstname.' '.$person->lastname; echo ' (ID '.$person->id.')' ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $person->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $person->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List persons'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    
    <div class="column-responsive column-80">
        <div class="persons form content">
            <?= $this->Form->create($person) ?>
            
	<?php
	$myTemplates = [
		'inputContainer' => '<div class="col">{{content}}</div>',
	];
	$this->Form->setTemplates($myTemplates);
	?>
            
     <div class="row form-row">
		<?php
			echo $this->Form->control(
				'firstname',
				array(
					'placeholder' => 'First name',
					'label' => 'First name',
					'class' => 'form-control'
				)
			);
			echo $this->Form->control(
				'lastname',
				array(
					'placeholder' => 'Last name',
					'label' => 'Last name',
					'class' => 'form-control'
				)
			);
		?>
		<div class="col">
			<label for="lastname">Gender</label>
			<select name="gender" class="form-select">
				<option selected>unknown</option>
				<?php
					
					$genders = array();
					$genders['f'] = 'female';
					$genders['m'] = 'male';
					$genders['o'] = 'other';
					
					foreach($genders as $key => $data) {
						echo '<option value="'.$key.'"';
						if ($key == $person->gender) {
							echo ' selected="selected"';
						}
						echo '>'.$data.'</option>';
					}
					
				?>
			</select>
		</div>
	 </div>
	 
	 <div class="row form-row">
		<?php
			echo $this->Form->control(
				'dbpedia_url',
				array(
					'placeholder' => 'https://dbpedia.org/resource/',
					'label' => 'DBpedia URL',
					'class' => 'form-control'
				)
			);
			?>
	</div>
		 
	<div class="row form-row">
		<div class="col">
			 Date of birth
		</div>
		<div class="col">
			 
			<select name="dayofbirth" class="form-select">
				<option>Day</option>
				<?php
				
				for($i = 1; $i <= 31; $i++) {
					echo '<option value="'.$i.'"';
					if ($i == (int)$person->dayofbirth) {
						echo ' selected="selected"';
					}
					echo '>'.$i.'</option>';
				}
				
				?>
			</select>
		</div>
		<div class="col">
			<select name="monthofbirth" class="form-select">
				<option selected>Month</option>
				<?php
					
					$months = array();
					$months[] = 'January';
					$months[] = 'February';
					$months[] = 'March';
					$months[] = 'April';
					$months[] = 'May';
					$months[] = 'June';
					$months[] = 'July';
					$months[] = 'August';
					$months[] = 'September';
					$months[] = 'October';
					$months[] = 'November';
					$months[] = 'December';
					
					foreach($months as $key => $data) {
						$monthIndex = $key+1;
						echo '<option value="'.$monthIndex.'"';
						if ($monthIndex == $person->monthofbirth) {
							echo ' selected="selected"';
						}
						echo '>'.$data.'</option>';
					}
					
				?>
			</select>
		</div>
		 <?php
		 	echo $this->Form->control(
					'yearofbirth',
					array(
						'placeholder' => 'Year',
						'label' => false,
						'class' => 'form-control'
					)
				);
		 ?>
			<?php
		 		echo $this->Form->control(
					'yearofbirthUpper',
					array(
						'placeholder' => 'Year (upper range)',
						'label' => false,
						'class' => 'form-control'
					)
				);
		 ?>
	</div>
	
	<div class="row form-row">
		<div class="col">
			 Date of death
		</div>
		<div class="col">
			 
			<select name="dayofdeath" class="form-select">
				<option>Day</option>
				<?php
				
				for($i = 1; $i <= 31; $i++) {
					echo '<option value="'.$i.'"';
					if ($i == (int)$person->dayofdeath) {
						echo ' selected="selected"';
					}
					echo '<option value="'.$i.'">'.$i.'</option>';
				}
				
				?>
			</select>
		</div>
		<div class="col">
			<select name="monthofdeath" class="form-select">
				<option>Month</option>
				<?php
					
					foreach($months as $key => $data) {
						$monthIndex = $key+1;
						echo '<option value="'.$monthIndex.'"';
						if ($monthIndex == $person->monthofdeath) {
							echo ' selected="selected"';
						}
						echo '>'.$data.'</option>';
					}
					
				?>
			</select>
		</div>
			 <?php
		 		echo $this->Form->control(
					'yearofdeath',
					array(
						'placeholder' => 'Year',
						'label' => false,
						'class' => 'form-control'
					)
				);
		 	?>
			<?php
		 		echo $this->Form->control(
					'yearofdeathUpper',
					array(
						'placeholder' => 'Year (upper range)',
						'label' => false,
						'class' => 'form-control'
					)
				);
			?>
	</div>
	
	 
	<hr />
	 
	<div class="form-group">
		<label for="exampleFormControlTextarea1">Note</label>
		<textarea class="form-control" id="exampleFormControlTextarea1" name="note" rows="3"></textarea>
	</div>
  
 	<hr />
  
	<?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>



        </div>
    </div>
</div>
