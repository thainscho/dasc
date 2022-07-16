<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Archive $archive
 * @var \Cake\Collection\CollectionInterface|string[] $addresses
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Archives'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="archives form content">
            <?= $this->Form->create($archive) ?>
            
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
						'placeholder' => 'Archive name',
						'label' => ['text' => 'Archive name', 'class' => 'required'],
						'class' => 'form-control'
					)
				);
			?>
			</div>
		    
		    <div class="row form-row form-group">
				<div class="col">
				<?php
					echo $this->Form->control(
						'address_id', array(
							'options' => $addresses,
							'label' => ['text' => 'Archive’s address'],
							'empty' => 'Select Address',
							'class' => 'form-select'
						)
					);
				?>
				</div>
			</div>
            
            <div class="row form-row">
			<?php
				echo $this->Form->control(
					'website',
					array(
						'placeholder' => 'http://',
						'label' => 'Archive website',
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
