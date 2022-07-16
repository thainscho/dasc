<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Institution $institution
 */
?>

<h3><?= __('Edit institution') ?><br />
<small><?php echo $institution->name; ?></small>
</h3>

<p>
<?= $this->Html->link(__('Back'), ['action' => 'index']) ?>
</p>


<div class="row">
    <div class="column-responsive column-80">
    	<div class="institutions form content form-group">
	    <?php
		$myTemplates = [
			'inputContainer' => '<div class="col">{{content}}</div>',
		];
		$this->Form->setTemplates($myTemplates);
		?>
		
		<?= $this->Form->create($institution) ?>
            
		<div class="row form-row">
		<?php
			echo $this->Form->control(
			'name',
            array(
            	'placeholder' => 'Name of the institution',
            	'label' => ['text' => 'Name of the institution', 'class' => 'required'],
            	'id' => 'dbPediaInput',
            	'class' => 'form-control'
            ));
		?>
		</div>
            
		<div class="row form-row">
			<?php
				echo $this->Form->control(
					'dbpedia_url',
					array(
						'placeholder' => 'https://dbpedia.org/resource/',
						'id' => 'dbpedia_urlInput',
						'label' => 'DBpedia URL',
						'class' => 'form-control'
					)
				);
			?>
		</div>
        
        <div class="form-group">
			<?= $this->Form->button(__('Save changes'), ['class' => 'btn btn-primary',]) ?>
		</div>
		
		<?= $this->Form->end() ?>
		
		</div>
    </div>
</div>