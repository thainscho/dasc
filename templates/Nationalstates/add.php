<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Nationalstate $nationalstate
 */
?>

<?php
echo $this->Html->script('dbPediaInput');
?>

<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Nationalstates'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="nationalstates form content">
            <?= $this->Form->create($nationalstate) ?>
            
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
						'id' => 'dbPediaInput',
						'class' => 'form-control'
					)
				);
				echo $this->Form->control(
					'abbreviation',
					array(
						'placeholder' => 'Abbreviation',
						'label' => ['text' => 'Abbreviation', 'class' => 'required'],
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
						'label' => ['text' => 'DBpedia URL', 'class' => 'required'],
						'id' => 'dbpedia_urlInput',
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
