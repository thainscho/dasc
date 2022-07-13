<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Institution $institution
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $institution->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $institution->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List institutions'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    
    <div class="column-responsive column-80">
		<?= $this->Form->create($institution) ?>
        <div class="institutions form content form-group">
            
            <div class="row form-row">
            <?php
            echo $this->Form->control(
            	'name',
            	array(
            		'placeholder' => 'Name of the institution',
            		'label' => 'Name of the institution',
            		'class' => 'form-control'
            	)
            );
			?>
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
        </div>
           
			<div class="row form-row">
			<div class="col">
				<?= $this->Form->button(__('Submit')) ?>
				</div>
			</div>
		<?= $this->Form->end() ?>
    
    </div>
</div>
