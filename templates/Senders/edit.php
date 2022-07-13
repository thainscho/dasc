<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Sender $sender
 * @var string[]|\Cake\Collection\CollectionInterface $letters
 * @var string[]|\Cake\Collection\CollectionInterface $persons
 * @var string[]|\Cake\Collection\CollectionInterface $institutions
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $sender->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $sender->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Senders'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="senders form content">
            <?= $this->Form->create($sender) ?>
            <fieldset>
                <legend><?= __('Edit Sender') ?></legend>
                <?php
                    echo $this->Form->control('letter_id', ['options' => $letters]);
                    echo $this->Form->control('person_id', ['options' => $persons]);
                    echo $this->Form->control('institution_id', ['options' => $institutions]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
