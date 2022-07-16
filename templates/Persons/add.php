<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Person $person
 */
?>

<h3><?= __('Persons') ?><br />
<small><?php echo __('Create new person'); ?></small>
</h3>

<p>
<?= $this->Html->link(__('Back'), ['action' => 'index']) ?>
</p>


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
							echo '<option value="'.$key.'">'.$data.'</option>';
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
	
		 <?php
				
			$days = array();
			for($i = 1; $i <= 31; $i++) {
				$days[$i] = $i;
			}
			
			$months = array();
			$months[1] = 'January';
			$months[2] = 'February';
			$months[3] = 'March';
			$months[4] = 'April';
			$months[5] = 'May';
			$months[6] = 'June';
			$months[7] = 'July';
			$months[8] = 'August';
			$months[9] = 'September';
			$months[10] = 'October';
			$months[12] = 'November';
			$months[12] = 'December';
				
		?>

		<div class="row form-row">
			<div class="col"><label for="day" class="col-form-label col-form-label-sm">Date of birth (or earliest date possible, if the exact date is unknown)</label></div>
			<div class="col"><?php echo $this->Form->select('dayofbirth', $days, ['empty' => 'Day', 'class' => 'form-select']); ?></div>
			<div class="col"><?php echo $this->Form->select('monthofbirth', $months, ['empty' => 'Month', 'class' => 'form-select']); ?></div>
			<div class="col"><?php echo $this->Form->control('yearofbirth', array('placeholder' => 'Year', 'label' => false, 'class' => 'form-control'));?></div>
		</div>
		
		<div class="row form-row">
			<div class="col"><label for="day" class="col-form-label col-form-label-sm">Latest date possible, if the exact date of birth is unknown</label></div>
			<div class="col"> </div>
			<div class="col"> </div>
			<div class="col"><?php echo $this->Form->control('yearofbirthUpper', array('placeholder' => 'Year', 'label' => false, 'class' => 'form-control'));?></div>
		</div>
		
		<div class="row form-row">
			<div class="col"><label for="day" class="col-form-label col-form-label-sm">Date of death (or earliest date possible, if the exact date is unknown)</label></div>
			<div class="col"><?php echo $this->Form->select('dayofdeath', $days, ['empty' => 'Day', 'class' => 'form-select']); ?></div>
			<div class="col"><?php echo $this->Form->select('monthofdeath', $months, ['empty' => 'Month', 'class' => 'form-select']); ?></div>
			<div class="col"><?php echo $this->Form->control('yearofdeath', array('placeholder' => 'Year', 'label' => false, 'class' => 'form-control'));?></div>
		</div>
		
		<div class="row form-row">
			<div class="col"><label for="day" class="col-form-label col-form-label-sm">Latest date possible, if the exact date of birth is unknown</label></div>
			<div class="col"> </div>
			<div class="col"> </div>
			<div class="col"><?php echo $this->Form->control('yearofdeathUpper', array('placeholder' => 'Year', 'label' => false, 'class' => 'form-control'));?></div>
			</div>
				
			 
		<div class="form-group form-row">
			<label for="exampleFormControlTextarea1">Note</label>
			<textarea class="form-control" id="exampleFormControlTextarea1" name="note" rows="3"></textarea>
		</div>
  
		<div class="form-group">
			<?= $this->Form->button(__('Submit'), ['class' => 'btn btn-primary',]) ?>
		</div>
		
	    <?= $this->Form->end() ?>
           
	</div>
</div>


