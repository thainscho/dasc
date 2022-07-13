<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Address $address
 * @var \Cake\Collection\CollectionInterface|string[] $nationalstates
 */
?>

<?php
echo $this->Html->script('dbPediaInput');
?>

<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Addresses'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
    
        <div class="addresses form content">
        
        <p>
        	Addresses are assigned to individuals or institutions. When filling in the form, use the information provided in the correspondence as a reference and do not make any autonomous additions.
        </p>
            <?= $this->Form->create($address) ?>
            
            <?php
			$myTemplates = [
				'inputContainer' => '<div class="col">{{content}}</div>',
			];
			$this->Form->setTemplates($myTemplates);
			?>
			
			
			<div class="row form-row form-group">
			<?php
			echo $this->Form->control(
				'city',
				array(
					'placeholder' => 'City',
					'label' => ['text' => 'City', 'class' => 'required'],
					'id' => 'dbPediaInput',
					'class' => 'form-control'
				)
			);
			echo $this->Form->control(
				'postalcode',
				array(
					'placeholder' => 'Postal Code',
					'label' => 'Postal Code',
					'class' => 'form-control'
				)
			);
			?>
			</div>
			
			<div class="row form-row form-group">
				<?php
					echo $this->Form->control(
						'dbpedia_url',
						array(
							'placeholder' => 'https://dbpedia.org/resource/',
							'label' => ['text' => 'City DBpedia URL', 'class' => 'required'],
							'id' => 'dbpedia_urlInput',
							'class' => 'form-control'
						)
					);
				?>
			</div>

			<div class="row form-row form-group">
			<div class="col">
			
			<?php
				echo $this->Form->control(
					'nationalstate_id', array(
						'options' => $nationalstates,
						'label' => ['text' => 'National state', 'class' => 'required'],
						'empty' => 'Select National state',
						'class' => 'form-select'
					)
				);
			?>

			</div>
			<div class="col">
			</div>
			</div>


			<div class="row form-row form-group">
			<?php
			echo $this->Form->control(
				'street',
				array(
					'placeholder' => 'Street',
					'label' => 'Street',
					'class' => 'form-control'
				)
			);
			echo $this->Form->control(
				'streetnumber',
				array(
					'placeholder' => 'Street number',
					'label' => 'Street number',
					'class' => 'form-control'
				)
			);
			?>
			</div>

			<div class="row form-row form-group">
			<?php
			echo $this->Form->control(
				'addressline',
				array(
					'placeholder' => 'Additional address line',
					'label' => 'Additional address line',
					'class' => 'form-control'
				)
			);
			?>
			<div id="addresslineHelp" class="form-text">Institutional or residential detail (such as “Institute of ...”, “Hotel room ...”)</div>
			</div>
			
            <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-primary']) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
