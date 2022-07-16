<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Letterformat $letterformat
 */
?>

<h3><?= __('Formats of correspondence') ?><br />
<small><?php echo __('Create a new record of a correspondence format'); ?></small>
</h3>

<p>
<?= $this->Html->link(__('Back'), ['action' => 'index']) ?>
</p>

<div class="row">
    <div class="column-responsive column-80">
        <div class="letterformats form content">
            <?= $this->Form->create($letterformat) ?>
            
            <?php
			$myTemplates = [
				'inputContainer' => '<div class="col">{{content}}</div>',
			];
			$this->Form->setTemplates($myTemplates);
			?>
			
			<div class="row form-row">
			<?php
				echo $this->Form->control(
					'name',
					array(
						'placeholder' => 'Name',
						'label' => ['text' => 'Name', 'class' => 'required'],
						'class' => 'form-control'
					)
				);
			?>
			</div>
			
			<div class="row form-row">
			<?php
				echo $this->Form->control(
					'description',
					array(
						'rows' => '4',
						'label' => ['text' => 'Description', 'class' => 'required'],
						'class' => 'form-control'
					)
				);
			?>
			</div>
			
            <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-primary']) ?>
            
            <?= $this->Form->end() ?>
            
        </div>
    </div>
</div>
