<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Letter $letter
 * @var string[]|\Cake\Collection\CollectionInterface $letterformats
 * @var string[]|\Cake\Collection\CollectionInterface $addressFrom
 * @var string[]|\Cake\Collection\CollectionInterface $addressTo
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
                    echo $this->Form->control('letterdate_day');
                    echo $this->Form->control('letterdate_month');
                    echo $this->Form->control('letterdate_year');
                    echo $this->Form->control('datemin_day');
                    echo $this->Form->control('datemin_month');
                    echo $this->Form->control('datemin_year');
                    echo $this->Form->control('letterdatecorrected_day');
                    echo $this->Form->control('letterdatecorrected_month');
                    echo $this->Form->control('letterdatecorrected_year');
                    echo $this->Form->control('datemax_day');
                    echo $this->Form->control('datemax_month');
                    echo $this->Form->control('datemax_year');
                    echo $this->Form->control('letterformat_id', ['options' => $letterformats]);
                    echo $this->Form->control('address_from_id', ['options' => $addressFrom, 'empty' => true]);
                    echo $this->Form->control('address_from_assumed');
                    echo $this->Form->control('address_to_id', ['options' => $addressTo, 'empty' => true]);
                    echo $this->Form->control('address_to_assumed');
                    echo $this->Form->control('note');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
