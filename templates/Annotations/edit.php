<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Annotation $annotation
 * @var string[]|\Cake\Collection\CollectionInterface $manifestations
 * @var string[]|\Cake\Collection\CollectionInterface $receivers
 * @var string[]|\Cake\Collection\CollectionInterface $senders
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $annotation->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $annotation->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Annotations'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="annotations form content">
            <?= $this->Form->create($annotation) ?>
            <fieldset>
                <legend><?= __('Edit Annotation') ?></legend>
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
