<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Letter $letter
 * @var string[]|\Cake\Collection\CollectionInterface $letterformats
 * @var string[]|\Cake\Collection\CollectionInterface $addresses
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $letter->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $letter->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Letters'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="letters form content">
            <?= $this->Form->create($letter) ?>
            <fieldset>
                <legend><?= __('Edit Letter') ?></legend>
                <?php
                    echo $this->Form->control('date', ['empty' => true]);
                    echo $this->Form->control('date_min', ['empty' => true]);
                    echo $this->Form->control('date_max', ['empty' => true]);
                    echo $this->Form->control('letterformat_id', ['options' => $letterformats]);
                    echo $this->Form->control('address_from_id');
                    echo $this->Form->control('address_from_assumed');
                    echo $this->Form->control('address_to_id', ['options' => $addresses, 'empty' => true]);
                    echo $this->Form->control('address_to_assumed');
                    echo $this->Form->control('isSent');
                    echo $this->Form->control('draft');
                    echo $this->Form->control('note');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
