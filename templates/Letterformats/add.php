<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Letterformat $letterformat
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Letterformats'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
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
