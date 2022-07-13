<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Annotation $annotation
 * @var \Cake\Collection\CollectionInterface|string[] $manifestations
 * @var \Cake\Collection\CollectionInterface|string[] $receivers
 * @var \Cake\Collection\CollectionInterface|string[] $senders
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Annotations'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="annotations form content">
            <?= $this->Form->create($annotation) ?>
            <fieldset>
                <legend><?= __('Add Annotation') ?></legend>
                <?php
                    echo $this->Form->control('manifestation_id', ['options' => $manifestations]);
                    echo $this->Form->control('receiver_id', ['options' => $receivers, 'empty' => true]);
                    echo $this->Form->control('sender_id', ['options' => $senders, 'empty' => true]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
