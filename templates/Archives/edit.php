<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Archive $archive
 * @var string[]|\Cake\Collection\CollectionInterface $addresses
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $archive->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $archive->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Archives'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="archives form content">
            <?= $this->Form->create($archive) ?>
            <fieldset>
                <legend><?= __('Edit Archive') ?></legend>
                <?php
                    echo $this->Form->control('name');
                    echo $this->Form->control('address_id', ['options' => $addresses]);
                    echo $this->Form->control('website');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
